<?php 

get_template_part( 'inc/admin-function');

//custom-style
get_template_part( 'inc/construction-elementor-custom-style');

// theme-option
get_template_part( 'lib/texture-option/texture-option');

// customizer
get_template_part('customizer/models/class-construction-elementor-singleton');
get_template_part('customizer/models/class-construction-elementor-defaults-models');
get_template_part('customizer/repeater/class-construction-elementor-repeater');

/*customizer*/

get_template_part('customizer/extend-customizer/class-construction-elementor-wp-customize-panel');
get_template_part('customizer/extend-customizer/class-construction-elementor-wp-customize-section');
get_template_part('customizer/customizer-radio-image/class/class-construction-elementor-customize-control-radio-image');
get_template_part('customizer/customizer-range-value/class/class-construction-elementor-customizer-range-value-control');

get_template_part('customizer/color/class-control-color');
get_template_part('customizer/customize-buttonset/class-control-buttonset');

get_template_part('customizer/background/class-construction-elementor-background-image-control');

get_template_part('customizer/customizer-toggle/class-construction-elementor-toggle-control');

get_template_part('customizer/custom-customizer');
get_template_part('customizer/customizer');

/******************************/
// woocommerce
/******************************/
get_template_part( 'inc/woocommerce/woo-core');
get_template_part( 'inc/woocommerce/woo-function');
get_template_part('inc/woocommerce/woocommerce-ajax');