<?php
/**
 * Welcome Screen Class
 */
class construction_elementor_screen {

	/**
	 * Constructor for the Notice
	 */
	public function __construct() {

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'construction_elementor_activation_admin_notice' ) );

	}
	
	public function construction_elementor_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) ) {
			add_action( 'admin_notices', array( $this, 'construction_elementor_admin_notice' ), 99 );
		}
	}

	
	public function construction_elementor_admin_notice() {
		?>			
		<div class="updated notice is-dismissible bizzmo-note">
			<h1><?php
			$theme_info = wp_get_theme();
			printf( esc_html__('Thanks for installing  %1$s ', 'construction-elementor'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo  esc_html__("Welcome! Thank you for choosing construction elementor WordPress theme. To take full advantage of the features this theme Please Install Our Demo", "construction-elementor"); ?></p>
			<p class="note1"><a href="https://testerwp.com/docs/construction-elementor/how-to-install-construction-elementor-theme/" class="button button-blue-secondary button_info" style="text-decoration: none;" target="_blank"><?php echo esc_html__('Read Documentation','construction-elementor'); ?></a> <a href="themes.php?page=texture_started" target="_blank" class="button button-blue-secondary button_info" style="text-decoration: none;"><?php echo esc_html__('View Details','construction-elementor'); ?></a></p>
		</div>
		<?php
	}
	
}

$GLOBALS['construction_elementor_screen'] = new construction_elementor_screen();

function construction_elementor_scripts_fn() {

    global $construction_elementor_theme_version;

 
    wp_enqueue_script('custm-script', get_template_directory_uri() . '/assets/js/custm-script.js', array(), '', true);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'admin_enqueue_scripts', 'construction_elementor_scripts_fn' );


?>