<?php
/**
 * Construction Elementor manage the Customizer options of general panel.
 *
 * @subpackage construction-elementor
 * @since 1.0 
 */
Kirki::add_field(
	'construction_elementor_config', array(
		'type'        => 'checkbox',
		'settings'    => 'construction_elementor_home_posts',
		'label'       => esc_attr__( 'Checked to hide latest posts in homepage.', 'construction-elementor' ),
		'section'     => 'static_front_page',
		'default'     => true,
	)
);
