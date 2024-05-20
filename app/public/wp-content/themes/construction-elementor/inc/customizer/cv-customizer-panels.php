<?php
/**
 * Construction Elementor manage the Customizer panels.
 *
 * @subpackage construction-elementor
 * @since 1.0 
 */

/**
 * General Settings Panel
 */
Kirki::add_panel( 'construction_elementor_general_panel', array(
	'priority' => 10,
	'title'    => __( 'General Settings', 'construction-elementor' ),
) );

/**
 * Construction Elementor Options
 */
Kirki::add_panel( 'construction_elementor_options_panel', array(
	'priority' => 20,
	'title'    => __( 'Construction Elementor Theme Options', 'construction-elementor' ),
) );