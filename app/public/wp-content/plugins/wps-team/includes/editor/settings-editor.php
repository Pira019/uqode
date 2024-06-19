<?php

namespace WPSpeedo_Team;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
class Settings_Editor extends Editor_Controls {
    public function __construct( array $data = [], array $args = null ) {
        parent::__construct( $data, $args );
        do_action( 'wpspeedo_team/settings_editor/init', $this );
    }

    public function get_name() {
        return 'meta_box_editor';
    }

    protected function _register_controls() {
        // General Settings
        $this->general_settings();
        // Admin Text Settings
        $this->translation_settings();
        // Advance Settings
        $this->advance_settings();
        // Single Page Settings
        $this->single_page_settings();
    }

    protected function general_settings() {
        $enable_location_taxonomy = _x( 'Enable Location Taxonomy', 'Settings: General', 'wpspeedo-team' );
        $enable_language_taxonomy = _x( 'Enable Language Taxonomy', 'Settings: General', 'wpspeedo-team' );
        $enable_specialty_taxonomy = _x( 'Enable Specialty Taxonomy', 'Settings: General', 'wpspeedo-team' );
        $enable_gender_taxonomy = _x( 'Enable Gender Taxonomy', 'Settings: General', 'wpspeedo-team' );
        $enable_extra_one_taxonomy = _x( 'Enable Extra One Taxonomy', 'Settings: General', 'wpspeedo-team' );
        $enable_extra_two_taxonomy = _x( 'Enable Extra Two Taxonomy', 'Settings: General', 'wpspeedo-team' );
        $enable_extra_three_taxonomy = _x( 'Enable Extra Three Taxonomy', 'Settings: General', 'wpspeedo-team' );
        $enable_extra_four_taxonomy = _x( 'Enable Extra Four Taxonomy', 'Settings: General', 'wpspeedo-team' );
        $enable_extra_five_taxonomy = _x( 'Enable Extra Five Taxonomy', 'Settings: General', 'wpspeedo-team' );
        $enable_location_archive = _x( 'Enable Location Archive', 'Settings: General', 'wpspeedo-team' );
        $enable_language_archive = _x( 'Enable Language Archive', 'Settings: General', 'wpspeedo-team' );
        $enable_specialty_archive = _x( 'Enable Specialty Archive', 'Settings: General', 'wpspeedo-team' );
        $enable_gender_archive = _x( 'Enable Gender Archive', 'Settings: General', 'wpspeedo-team' );
        $enable_extra_one_archive = _x( 'Enable Extra One Archive', 'Settings: General', 'wpspeedo-team' );
        $enable_extra_two_archive = _x( 'Enable Extra Two Archive', 'Settings: General', 'wpspeedo-team' );
        $enable_extra_three_archive = _x( 'Enable Extra Three Archive', 'Settings: General', 'wpspeedo-team' );
        $enable_extra_four_archive = _x( 'Enable Extra Four Archive', 'Settings: General', 'wpspeedo-team' );
        $enable_extra_five_archive = _x( 'Enable Extra Five Archive', 'Settings: General', 'wpspeedo-team' );
        $location_archive_slug = _x( 'Location Archive Slug', 'Settings: General', 'wpspeedo-team' );
        $language_archive_slug = _x( 'Language Archive Slug', 'Settings: General', 'wpspeedo-team' );
        $specialty_archive_slug = _x( 'Specialty Archive Slug', 'Settings: General', 'wpspeedo-team' );
        $gender_archive_slug = _x( 'Gender Archive Slug', 'Settings: General', 'wpspeedo-team' );
        $extra_one_archive_slug = _x( 'Extra One Archive Slug', 'Settings: General', 'wpspeedo-team' );
        $extra_two_archive_slug = _x( 'Extra Two Archive Slug', 'Settings: General', 'wpspeedo-team' );
        $extra_three_archive_slug = _x( 'Extra Three Archive Slug', 'Settings: General', 'wpspeedo-team' );
        $extra_four_archive_slug = _x( 'Extra Four Archive Slug', 'Settings: General', 'wpspeedo-team' );
        $extra_five_archive_slug = _x( 'Extra Five Archive Slug', 'Settings: General', 'wpspeedo-team' );
        $member_single_name = _x( 'Member Single Name', 'Settings: General', 'wpspeedo-team' );
        $group_single_name = _x( 'Group Single Name', 'Settings: General', 'wpspeedo-team' );
        $location_single_name = _x( 'Location Single Name', 'Settings: General', 'wpspeedo-team' );
        $language_single_name = _x( 'Language Single Name', 'Settings: General', 'wpspeedo-team' );
        $specialty_single_name = _x( 'Specialty Single Name', 'Settings: General', 'wpspeedo-team' );
        $gender_single_name = _x( 'Gender Single Name', 'Settings: General', 'wpspeedo-team' );
        $extra_one_single_name = _x( 'Extra One Single Name', 'Settings: General', 'wpspeedo-team' );
        $extra_two_single_name = _x( 'Extra Two Single Name', 'Settings: General', 'wpspeedo-team' );
        $extra_three_single_name = _x( 'Extra Three Single Name', 'Settings: General', 'wpspeedo-team' );
        $extra_four_single_name = _x( 'Extra Four Single Name', 'Settings: General', 'wpspeedo-team' );
        $extra_five_single_name = _x( 'Extra Five Single Name', 'Settings: General', 'wpspeedo-team' );
        $member_plural_name = _x( 'Member Plural Name', 'Settings: General', 'wpspeedo-team' );
        $group_plural_name = _x( 'Group Plural Name', 'Settings: General', 'wpspeedo-team' );
        $location_plural_name = _x( 'Location Plural Name', 'Settings: General', 'wpspeedo-team' );
        $language_plural_name = _x( 'Language Plural Name', 'Settings: General', 'wpspeedo-team' );
        $specialty_plural_name = _x( 'Specialty Plural Name', 'Settings: General', 'wpspeedo-team' );
        $gender_plural_name = _x( 'Gender Plural Name', 'Settings: General', 'wpspeedo-team' );
        $extra_one_plural_name = _x( 'Extra One Plural Name', 'Settings: General', 'wpspeedo-team' );
        $extra_two_plural_name = _x( 'Extra Two Plural Name', 'Settings: General', 'wpspeedo-team' );
        $extra_three_plural_name = _x( 'Extra Three Plural Name', 'Settings: General', 'wpspeedo-team' );
        $extra_four_plural_name = _x( 'Extra Four Plural Name', 'Settings: General', 'wpspeedo-team' );
        $extra_five_plural_name = _x( 'Extra Five Plural Name', 'Settings: General', 'wpspeedo-team' );
        $this->start_controls_section( 'general_settings_section', [
            'label'      => _x( 'General Settings', 'Settings: General', 'wpspeedo-team' ),
            'menu_label' => _x( 'General', 'Settings: General', 'wpspeedo-team' ),
            'icon'       => 'fas fa-tools',
            'path'       => 'general',
        ] );
        $this->add_control( 'member_single_name', [
            'label'       => $member_single_name,
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'member_single_name' ),
            'default'     => Utils::get_default( 'member_single_name' ),
        ] );
        $this->add_control( 'member_plural_name', [
            'label'       => $member_plural_name,
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'member_plural_name' ),
            'default'     => Utils::get_default( 'member_plural_name' ),
        ] );
        $this->add_control( 'enable_archive', [
            'label'       => _x( 'Enable Single/Archive Page', 'Settings: General', 'wpspeedo-team' ),
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::SWITCHER,
            'default'     => Utils::get_default( 'enable_archive' ),
        ] );
        $this->add_control( 'post_type_slug', [
            'label'       => _x( 'Archive Slug', 'Settings: General', 'wpspeedo-team' ),
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'default'     => Utils::get_archive_slug(),
            'condition'   => [
                'enable_archive' => true,
            ],
        ] );
        // Group Taxonomy Settings
        $this->add_control( 'enable_group_taxonomy', [
            'label'       => _x( 'Enable Group Taxonomy', 'Settings: General', 'wpspeedo-team' ),
            'label_block' => false,
            'separator'   => 'before',
            'type'        => Controls_Manager::SWITCHER,
            'default'     => Utils::get_default( 'enable_group_taxonomy' ),
        ] );
        $this->add_control( 'group_single_name', [
            'label'       => $group_single_name,
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'group_single_name' ),
            'default'     => Utils::get_default( 'group_single_name' ),
            'condition'   => [
                'enable_group_taxonomy' => true,
            ],
        ] );
        $this->add_control( 'group_plural_name', [
            'label'       => $group_plural_name,
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'group_plural_name' ),
            'default'     => Utils::get_default( 'group_plural_name' ),
            'condition'   => [
                'enable_group_taxonomy' => true,
            ],
        ] );
        $this->add_control( 'enable_group_archive', [
            'label'       => _x( 'Enable Group Archive', 'Settings: General', 'wpspeedo-team' ),
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::SWITCHER,
            'default'     => Utils::get_default( 'enable_group_archive' ),
            'condition'   => [
                'enable_archive'        => true,
                'enable_group_taxonomy' => true,
            ],
        ] );
        $this->add_control( 'group_slug', [
            'label'       => _x( 'Group Archive Slug', 'Settings: General', 'wpspeedo-team' ),
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'default'     => Utils::get_archive_slug( 'group' ),
            'condition'   => [
                'enable_archive'        => true,
                'enable_group_taxonomy' => true,
                'enable_group_archive'  => true,
            ],
        ] );
        // Location Taxonomy Settings
        $this->add_control( 'enable_location_taxonomy', [
            'label'       => $enable_location_taxonomy,
            'label_block' => true,
            'separator'   => 'before',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_archive' => true,
            ],
        ] );
        // Language Taxonomy Settings
        $this->add_control( 'enable_language_taxonomy', [
            'label'       => $enable_language_taxonomy,
            'label_block' => true,
            'separator'   => 'before',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_archive' => true,
            ],
        ] );
        // Specialty Taxonomy Settings
        $this->add_control( 'enable_specialty_taxonomy', [
            'label'       => $enable_specialty_taxonomy,
            'label_block' => true,
            'separator'   => 'before',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_archive' => true,
            ],
        ] );
        // Gender Taxonomy Settings
        $this->add_control( 'enable_gender_taxonomy', [
            'label'       => $enable_gender_taxonomy,
            'label_block' => true,
            'separator'   => 'before',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_archive' => true,
            ],
        ] );
        // Extra One Taxonomy Settings
        $this->add_control( 'enable_extra_one_taxonomy', [
            'label'       => $enable_extra_one_taxonomy,
            'label_block' => true,
            'separator'   => 'before',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_archive' => true,
            ],
        ] );
        // Extra Two Taxonomy Settings
        $this->add_control( 'enable_extra_two_taxonomy', [
            'label'       => $enable_extra_two_taxonomy,
            'label_block' => true,
            'separator'   => 'before',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_archive' => true,
            ],
        ] );
        // Extra Three Taxonomy Settings
        $this->add_control( 'enable_extra_three_taxonomy', [
            'label'       => $enable_extra_three_taxonomy,
            'label_block' => true,
            'separator'   => 'before',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_archive' => true,
            ],
        ] );
        // Extra Four Taxonomy Settings
        $this->add_control( 'enable_extra_four_taxonomy', [
            'label'       => $enable_extra_four_taxonomy,
            'label_block' => true,
            'separator'   => 'before',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_archive' => true,
            ],
        ] );
        // Extra Five Taxonomy Settings
        $this->add_control( 'enable_extra_five_taxonomy', [
            'label'       => $enable_extra_five_taxonomy,
            'label_block' => true,
            'separator'   => 'before',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_archive' => true,
            ],
        ] );
        $this->end_controls_section();
    }

    protected function translation_settings() {
        $group_filter_all_text = 'Group Filter All Text';
        $location_filter_all_text = 'Location Filter All Text';
        $language_filter_all_text = 'Language Filter All Text';
        $specialty_filter_all_text = 'Specialty Filter All Text';
        $gender_filter_all_text = 'Gender Filter All Text';
        $this->start_controls_section( 'admin_texts_settings_section', [
            'label'      => _x( 'Translation Settings', 'Settings: Translation', 'wpspeedo-team' ),
            'menu_label' => _x( 'Translation', 'Settings: Translation', 'wpspeedo-team' ),
            'icon'       => 'fas fa-file-word',
            'path'       => 'translations',
        ] );
        $this->add_control( 'enable_multilingual', [
            'label'       => _x( 'Enable Multilingual', 'Settings: Translation', 'wpspeedo-team' ),
            'description' => _x( 'For simple uses, text changes are ok, but if you want to translate with multiple languages, enable this option and use a multilingual plugin to create translations for multiple languages.', 'Settings: Translation', 'wpspeedo-team' ),
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::SWITCHER,
            'default'     => Utils::get_default( 'enable_multilingual' ),
        ] );
        $this->add_control( 'admin_fields_labels_title', [
            'label'       => 'Admin: Meta Field Titles',
            'label_block' => false,
            'separator'   => 'before',
            'type'        => Controls_Manager::HEADING,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'desig_label', [
            'label'       => 'Designation',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'email_label', [
            'label'       => 'Email Address',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'mobile_label', [
            'label'       => 'Mobile (Personal',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'telephone_label', [
            'label'       => 'Telephone (Office',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'experience_label', [
            'label'       => 'Years of Experience',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'website_label', [
            'label'       => 'Website',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'company_label', [
            'label'       => 'Company',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'ribbon_label', [
            'label'       => 'Ribbon / Tag',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'link_1_label', [
            'label'       => 'Resume Link Label',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'link_2_label', [
            'label'       => 'Hire Link Label',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'color_label', [
            'label'       => 'Color',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'public_filters_labels_title', [
            'label'       => 'Public: Filters (All) Texts',
            'label_block' => false,
            'separator'   => 'before',
            'type'        => Controls_Manager::HEADING,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'filter_all_text', [
            'label'       => $group_filter_all_text,
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'filter_all_location_text', [
            'label'       => $location_filter_all_text,
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'filter_all_language_text', [
            'label'       => $language_filter_all_text,
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'filter_all_specialty_text', [
            'label'       => $specialty_filter_all_text,
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'filter_all_gender_text', [
            'label'       => $gender_filter_all_text,
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'custom_fields_labels_title', [
            'label'       => 'Public: Custom Field Labels',
            'label_block' => false,
            'separator'   => 'before',
            'type'        => Controls_Manager::HEADING,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'link_1_btn_text', [
            'label'       => 'Resume Button Text',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'link_2_btn_text', [
            'label'       => 'Hire Button Text',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'social_links_title', [
            'label'       => 'Social links title:',
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'social_links_title' ),
            'default'     => Utils::get_default( 'social_links_title' ),
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'mobile_meta_label', [
            'label'       => 'Mobile: Text',
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'mobile_meta_label' ),
            'default'     => Utils::get_default( 'mobile_meta_label' ),
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'phone_meta_label', [
            'label'       => 'Phone: Text',
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'phone_meta_label' ),
            'default'     => Utils::get_default( 'phone_meta_label' ),
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'email_meta_label', [
            'label'       => 'Email: Text',
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'email_meta_label' ),
            'default'     => Utils::get_default( 'email_meta_label' ),
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'website_meta_label', [
            'label'       => 'Website: Text',
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'website_meta_label' ),
            'default'     => Utils::get_default( 'website_meta_label' ),
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'experience_meta_label', [
            'label'       => 'Experience: Text',
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'experience_meta_label' ),
            'default'     => Utils::get_default( 'experience_meta_label' ),
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'company_meta_label', [
            'label'       => 'Company: Text',
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'company_meta_label' ),
            'default'     => Utils::get_default( 'company_meta_label' ),
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'taxonomy_fields_labels_title', [
            'label'       => 'Public: Taxonomy Field Labels',
            'label_block' => false,
            'separator'   => 'before',
            'type'        => Controls_Manager::HEADING,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'group_meta_label', [
            'label'       => 'Group Label',
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::TEXT,
            'placeholder' => Utils::get_default( 'group_meta_label' ),
            'default'     => Utils::get_default( 'group_meta_label' ),
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'location_meta_label', [
            'label'       => 'Location Label',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'language_meta_label', [
            'label'       => 'Language Label',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'specialty_meta_label', [
            'label'       => 'Specialty Label',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'gender_meta_label', [
            'label'       => 'Gender Label',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'other_translations', [
            'label'       => 'Public: Others',
            'label_block' => false,
            'separator'   => 'before',
            'type'        => Controls_Manager::HEADING,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'load_more_text', [
            'label'       => 'Load More Text',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->add_control( 'reached_the_end', [
            'label'       => 'Reached the end Text',
            'label_block' => true,
            'separator'   => 'none',
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'enable_multilingual' => false,
            ],
        ] );
        $this->end_controls_section();
    }

    protected function advance_settings() {
        $set_custom_size_label = _x( 'Set Custom Size', 'Settings: Advance', 'wpspeedo-team' );
        $set_custom_size_desc = _x( 'Set custom size for image, enable the Crop Option to crop the image to exact dimensions (normally proportional will be applied)', 'Settings: Advance', 'wpspeedo-team' );
        $this->start_controls_section( 'advance_settings_section', [
            'label'      => _x( 'Advance Settings', 'Settings: Advance', 'wpspeedo-team' ),
            'menu_label' => _x( 'Advance', 'Settings: Advance', 'wpspeedo-team' ),
            'icon'       => 'fas fa-user-ninja',
            'path'       => 'advance',
        ] );
        $this->add_control( 'disable_google_fonts_loading', [
            'label'       => _x( 'Disable Google Fonts Loading', 'Settings: Advance', 'wpspeedo-team' ),
            'label_block' => false,
            'type'        => Controls_Manager::SWITCHER,
            'default'     => Utils::get_default( 'disable_google_fonts_loading' ),
        ] );
        $this->add_control( 'thumbnail_size', [
            'label'       => _x( 'Member Image Size', 'Settings: Advance', 'wpspeedo-team' ),
            'description' => _x( 'This image size is used for general layout globally for all shortcodes, unless it is overridden from the specific shortcode.', 'Settings: Advance', 'wpspeedo-team' ),
            'label_block' => true,
            'type'        => Controls_Manager::SELECT,
            'separator'   => 'before',
            'default'     => Utils::get_default( 'thumbnail_size' ),
            'options'     => Utils::get_registered_image_sizes(),
            'placeholder' => _x( 'Select Size', 'Settings: Advance', 'wpspeedo-team' ),
        ] );
        $this->add_control( 'thumbnail_size_custom', [
            'label'       => $set_custom_size_label,
            'label_block' => true,
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'thumbnail_size' => 'custom',
            ],
        ] );
        $this->add_control( 'detail_thumbnail_size', [
            'label'       => _x( 'Member Detail\'s Image Size', 'Settings: Advance', 'wpspeedo-team' ),
            'description' => _x( 'This image size is used for modal, expand, panel & single layouts globally for all shortcodes, unless it is overridden from the specific shortcode', 'Settings: Advance', 'wpspeedo-team' ),
            'label_block' => true,
            'type'        => Controls_Manager::SELECT,
            'separator'   => 'before',
            'default'     => Utils::get_default( 'detail_thumbnail_size' ),
            'options'     => Utils::get_registered_image_sizes(),
            'placeholder' => _x( 'Select Size', 'Settings: Advance', 'wpspeedo-team' ),
        ] );
        $this->add_control( 'detail_thumbnail_size_custom', [
            'label'       => $set_custom_size_label,
            'label_block' => true,
            'type'        => Controls_Manager::UPGRADE_NOTICE,
            'condition'   => [
                'detail_thumbnail_size' => 'custom',
            ],
        ] );
        $this->end_controls_section();
    }

    protected function single_page_settings() {
        $this->start_controls_section( 'single_page_settings_section', [
            'label'      => _x( 'Single Page Settings', 'Settings: Single Page', 'wpspeedo-team' ),
            'menu_label' => _x( 'Single Page', 'Settings: Single Page', 'wpspeedo-team' ),
            'icon'       => 'fas fa-file-image',
            'path'       => 'single-page',
        ] );
        // Thumbs & Carousel
        $this->elements_visibility_controls();
        // Thumbs & Carousel
        $this->thumbs_carousel_controls();
        // Text & Icons
        $this->style_text_icon_controls();
        // Social Icons
        $this->social_icons_controls();
        $this->end_controls_section();
    }

    // Action Links
    protected function elements_visibility_controls() {
        $this->add_control( 'elements_visibility', [
            'label'       => _x( 'Elements', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'separator'   => 'before',
            'type'        => Controls_Manager::HEADING,
        ] );
        $elements = Utils::allowed_elements_display_order();
        foreach ( Utils::elements_display_order() as $element_key => $element_title ) {
            if ( !in_array( $element_key, ['link_1', 'link_2'] ) ) {
                continue;
            }
            // @todo remove this once added all fields supports
            if ( in_array( $element_key, $elements ) ) {
                $element_key = 'single_' . $element_key;
                $this->add_control( $element_key, [
                    'label'       => $element_title,
                    'label_block' => false,
                    'type'        => Controls_Manager::SWITCHER,
                    'render_type' => 'template',
                ] );
            } else {
                $element_key = 'single_' . $element_key;
                $this->add_control( $element_key, [
                    'label'       => $element_title,
                    'label_block' => false,
                    'type'        => Controls_Manager::UPGRADE_NOTICE,
                ] );
            }
        }
    }

    // Thumbs & Carousel
    protected function thumbs_carousel_controls() {
        $this->add_control( 'thumbs_and_carousel_title', [
            'label'       => _x( 'Thumbs & Carousel', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'separator'   => 'before',
            'type'        => Controls_Manager::HEADING,
        ] );
        $this->add_control( 'detail_thumbnail_type', [
            'label'       => _x( 'Thumbnail Type', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'separator'   => 'none',
            'type'        => Controls_Manager::SELECT,
            'default'     => Utils::get_default( 'detail_thumbnail_type' ),
            'options'     => Utils::get_control_options( 'thumbnail_type' ),
            'placeholder' => _x( 'Thumbnail Type', 'Settings: Single Page', 'wpspeedo-team' ),
        ] );
    }

    // Text & Icons
    protected function style_text_icon_controls() {
        $this->add_control( 'text_and_icons_title', [
            'label'       => _x( 'Text & Icon Colors', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'separator'   => 'before',
            'type'        => Controls_Manager::HEADING,
        ] );
        $this->add_control( 'title_color', [
            'label'       => _x( 'Title Color', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
            'separator'   => 'after',
        ] );
        $this->add_control( 'designation_color', [
            'label'       => _x( 'Designation Color', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
        ] );
        $this->add_control( 'desc_color', [
            'label'       => _x( 'Description Color', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
        ] );
        $this->add_control( 'divider_color', [
            'label'       => _x( 'Divider Color', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
        ] );
        $this->add_control( 'info_icon_color', [
            'label'       => _x( 'Info Icon Color', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
        ] );
        $this->add_control( 'info_text_color', [
            'label'       => _x( 'Info Text Color', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
        ] );
        $this->add_control( 'info_link_color', [
            'label'       => _x( 'Info Link Color', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
        ] );
        $this->add_control( 'info_link_hover_color', [
            'label'       => _x( 'Info Link Hover Color', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
        ] );
    }

    // Social Icons
    protected function social_icons_controls() {
        $this->add_control( 'social_icons_title', [
            'label'       => 'Social Icons',
            'label_block' => false,
            'separator'   => 'before',
            'type'        => Controls_Manager::HEADING,
        ] );
        $this->add_control( 'heading_social_styling', [
            'label'       => _x( 'Social Links Styling', 'Settings: Single Page', 'wpspeedo-team' ),
            'label_block' => true,
            'type'        => Controls_Manager::UPGRADE_NOTICE,
        ] );
    }

}
