<?php

namespace WPSpeedo_Team;

use Error;
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
class API {
    use AJAX_Handler;
    public $ajax_key = 'wpspeedo_team';

    public $ajax_scope = '_ajax_handler';

    public function __construct() {
        $this->set_ajax_scope_hooks();
    }

    public function ajax_get_settings() {
        $settings = Utils::get_settings();
        wp_send_json_success( $settings );
    }

    public function sanitize_settings( $settings ) {
        if ( !empty( $settings['post_type_slug'] ) ) {
            $settings['post_type_slug'] = sanitize_title( $settings['post_type_slug'] );
        }
        if ( !empty( $settings['group_slug'] ) ) {
            $settings['group_slug'] = sanitize_title( $settings['group_slug'] );
        }
        $base_settings = new Settings_Editor();
        $settings = $base_settings->get_stack_formed_values( $settings );
        $settings = $base_settings->values_to_settings( $settings );
        $settings_editor = new Settings_Editor([
            'id'       => 'fake',
            'settings' => $settings,
        ]);
        // This class will handle the Sanitization & Validation.
        return $settings_editor->get_display_formated_values();
    }

    public function ajax_update_settings() {
        $settings = $this->sanitize_settings( $_REQUEST['settings'] );
        // Sanitization & Validation done manually.
        update_option( Utils::get_option_name(), $settings );
        do_action( 'wps_preference_update' );
        Utils::flush_rewrite_rules();
        wp_send_json_success( [
            'message' => _x( 'Settings saved successfully', 'Settings', 'wpspeedo-team' ),
            'data'    => $settings,
        ] );
    }

    public function ajax_get_shortcodes() {
        global $wpdb;
        $shortcodes = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wps_team ORDER BY created_at DESC", ARRAY_A );
        foreach ( $shortcodes as &$shortcode ) {
            $shortcode['settings'] = maybe_unserialize( $shortcode['settings'] );
            $shortcode['settings'] = $this->validate_shortcode( $shortcode )->get_settings_value();
            // Settings will be Sanitized & Validated by Shortcode_Editor class.
        }
        if ( !wp_doing_ajax() ) {
            return $shortcodes;
        }
        wp_send_json_success( $shortcodes );
    }

    public function fetch_shortcode( $shortcode_id ) {
        global $wpdb;
        $shortcode_id = abs( $shortcode_id );
        $shortcode = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}wps_team WHERE id = %d LIMIT 1", $shortcode_id ), ARRAY_A );
        if ( empty( $shortcode ) ) {
            return;
        }
        if ( $wpdb->last_error !== '' ) {
            return false;
        }
        $shortcode['settings'] = maybe_unserialize( $shortcode['settings'] );
        $shortcode['settings'] = $this->validate_shortcode( $shortcode )->get_settings_value();
        // Settings will be Sanitized & Validated by Shortcode_Editor class.
        return $shortcode;
    }

    public function ajax_update_shortcode() {
        global $wpdb;
        if ( empty( $_REQUEST['id'] ) ) {
            new Error();
        }
        $data = [];
        $shortcode_id = abs( $_REQUEST['id'] );
        $shortcode = $this->fetch_shortcode( $shortcode_id );
        if ( !empty( $_REQUEST['name'] ) ) {
            $shortcode['name'] = sanitize_text_field( $_REQUEST['name'] );
            $data['name'] = $shortcode['name'];
        }
        $return_data = $shortcode;
        if ( !empty( $_REQUEST['settings'] ) ) {
            $shortcode['settings'] = $_REQUEST['settings'];
            // Settings will be Sanitized & Validated by Shortcode_Editor class.
            $shortcode = $this->validate_shortcode( $shortcode );
            $data['settings'] = maybe_serialize( $shortcode->get_settings_value() );
            $return_data = $shortcode->get_data();
        }
        $data["updated_at"] = current_time( 'mysql' );
        $wpdb->update(
            "{$wpdb->prefix}wps_team",
            $data,
            array(
                'id' => $shortcode_id,
            ),
            $this->db_columns_format()
        );
        if ( $wpdb->last_error !== '' ) {
            wp_send_json_error( sprintf( _x( 'Database Error: %s', 'Dashboard', 'wpspeedo-team' ), $wpdb->last_error ), 500 );
        }
        do_action( 'wps_shortcode_updated', $shortcode_id );
        wp_send_json_success( [
            'message' => sprintf( '<strong>%s</strong> %s', _x( 'Congrats!', 'Dashboard', 'wpspeedo-team' ), _x( 'Shortcode updated successfully', 'Dashboard', 'wpspeedo-team' ) ),
            'data'    => $return_data,
        ] );
    }

    public function validate_shortcode( $shortcode ) {
        $shortcode['settings'] = maybe_unserialize( $shortcode['settings'] );
        $setting_columns = array_column( $shortcode['settings'], 'name' );
        if ( empty( $setting_columns ) ) {
            $base_settings = new Shortcode_Editor();
            $shortcode['settings'] = $base_settings->values_to_settings( $shortcode['settings'] );
        }
        $shortcode = new Shortcode_Editor($shortcode);
        // This class will handle the Sanitization & Validation.
        return $shortcode;
    }

    public function ajax_create_shortcode() {
        global $wpdb;
        if ( empty( $_REQUEST['settings'] ) ) {
            new Error();
        }
        $shortcode_name = ( empty( $_REQUEST['name'] ) ? 'Undefined' : sanitize_text_field( $_REQUEST['name'] ) );
        $shortcode = $this->validate_shortcode( [
            'id'       => uniqid(),
            'name'     => $shortcode_name,
            'settings' => $_REQUEST['settings'],
        ] );
        $data = array(
            "name"       => $shortcode->get_data( 'name' ),
            "settings"   => maybe_serialize( $shortcode->get_settings_value() ),
            "created_at" => current_time( 'mysql' ),
            "updated_at" => current_time( 'mysql' ),
        );
        $wpdb->insert( "{$wpdb->prefix}wps_team", $data, $this->db_columns_format() );
        if ( $wpdb->last_error !== '' ) {
            wp_send_json_error( sprintf( _x( 'Database Error: %s', 'Dashboard', 'wpspeedo-team' ), $wpdb->last_error ), 500 );
        }
        do_action( 'wps_shortcode_created', $wpdb->insert_id );
        wp_send_json_success( [
            'message' => sprintf( '<strong>%s</strong> %s', _x( 'Congrats!', 'Dashboard', 'wpspeedo-team' ), _x( 'Shortcode created successfully', 'Dashboard', 'wpspeedo-team' ) ),
            'data'    => $this->fetch_shortcode( $wpdb->insert_id ),
        ] );
    }

    public function ajax_delete_shortcode() {
        global $wpdb;
        if ( empty( $_REQUEST['id'] ) ) {
            new Error();
        }
        $data = array(
            "id" => abs( $_REQUEST['id'] ),
        );
        $wpdb->delete( "{$wpdb->prefix}wps_team", $data, ['%d'] );
        if ( $wpdb->last_error !== '' ) {
            wp_send_json_error( sprintf( _x( 'Database Error: %s', 'Dashboard', 'wpspeedo-team' ), $wpdb->last_error ), 500 );
        }
        do_action( 'wps_shortcode_deleted', $data['id'] );
        wp_send_json_success( [
            'message' => sprintf( '<strong>%s</strong> %s', _x( 'Done!', 'Dashboard', 'wpspeedo-team' ), _x( 'Shortcode deleted successfully', 'Dashboard', 'wpspeedo-team' ) ),
            'data'    => $data,
        ] );
    }

    public function ajax_clone_shortcode() {
        global $wpdb;
        if ( empty( $_REQUEST['clone_id'] ) ) {
            wp_send_json_error( _x( 'Clone Id not provided', 'Dashboard', 'wpspeedo-team' ), 400 );
        }
        $clone_id = abs( $_REQUEST['clone_id'] );
        $clone_shortcode = $this->fetch_shortcode( $clone_id );
        if ( empty( $clone_shortcode ) ) {
            wp_send_json_error( _x( 'Clone shortcode not found', 'Dashboard', 'wpspeedo-team' ), 404 );
        }
        $shortcode = $this->validate_shortcode( [
            'id'       => uniqid(),
            'name'     => $clone_shortcode['name'] . ' ' . _x( '- Cloned', 'Editor', 'wpspeedo-team' ),
            'settings' => $clone_shortcode['settings'],
        ] );
        $settings_data = $shortcode->get_settings_value();
        $data = array(
            "name"       => $shortcode->get_data( 'name' ),
            "settings"   => maybe_serialize( $settings_data ),
            "created_at" => current_time( 'mysql' ),
            "updated_at" => current_time( 'mysql' ),
        );
        $wpdb->insert( "{$wpdb->prefix}wps_team", $data, $this->db_columns_format() );
        if ( $wpdb->last_error !== '' ) {
            wp_send_json_error( sprintf( _x( 'Database Error: %s', 'Dashboard', 'wpspeedo-team' ), $wpdb->last_error ), 500 );
        }
        do_action( 'wps_shortcode_cloned', $wpdb->insert_id );
        wp_send_json_success( [
            'message' => sprintf( '<strong>%s</strong> %s', _x( 'Congrats!', 'Dashboard', 'wpspeedo-team' ), _x( 'Shortcode cloned successfully', 'Dashboard', 'wpspeedo-team' ) ),
            'data'    => $this->fetch_shortcode( $wpdb->insert_id ),
        ] );
    }

    public function ajax_temp_save_settings() {
        if ( empty( $temp_key = sanitize_key( $_REQUEST['temp_key'] ) ) ) {
            wp_send_json_error( _x( 'No temp key provide', 'Editor', 'wpspeedo-team' ), 400 );
        }
        if ( empty( $settings = $_REQUEST['settings'] ) ) {
            wp_send_json_error( _x( 'No temp settings provided', 'Editor', 'wpspeedo-team' ), 400 );
        }
        $shortcode = $this->validate_shortcode( [
            'id'       => $temp_key,
            'name'     => 'Fake Name',
            'settings' => $settings,
        ] );
        delete_transient( $temp_key );
        $settings_value = $shortcode->get_settings_value();
        set_transient( $temp_key, $settings_value, HOUR_IN_SECONDS * 6 );
        wp_send_json_success();
    }

    public function ajax_get_sort_data() {
        $data = [
            'posts'             => [],
            'group_terms'       => [],
            'location_terms'    => [],
            'language_terms'    => [],
            'specialty_terms'   => [],
            'gender_terms'      => [],
            'extra_one_terms'   => [],
            'extra_two_terms'   => [],
            'extra_three_terms' => [],
            'extra_four_terms'  => [],
            'extra_five_terms'  => [],
        ];
        foreach ( Utils::get_posts()->posts as $post ) {
            $data['posts'][] = [
                'ID'         => $post->ID,
                'post_title' => $post->post_title,
                'thumbnail'  => get_the_post_thumbnail_url( $post->ID, 'thumbnail' ),
            ];
        }
        if ( !empty( $groups = Utils::get_group_terms() ) ) {
            $data['group_terms'] = array_map( [$this, 'map_term_for_sort'], $groups );
        }
        wp_reset_query();
        wp_send_json_success( $data );
    }

    public function map_term_for_sort( $term ) {
        return [
            'term_id' => $term->term_id,
            'name'    => $term->name,
        ];
    }

    public function db_columns_format() {
        return array(
            'name'       => '%s',
            'settings'   => '%s',
            'created_at' => '%s',
            'updated_at' => '%s',
        );
    }

}
