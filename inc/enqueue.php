<?php
/*
	
@package achillestheme
	
	========================
		ADMIN ENQUEUE FUNCTIONS
	========================
*/

function enqueue_achilles_admin_scripts( $hook ){
	wp_register_script( 'achilles-admin-script', get_template_directory_uri() . '/js/achilles.admin.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'achilles-admin-script' );


	wp_enqueue_style( 'achilles-admin-css', get_template_directory_uri() . '/css/achilles.admin.css', array(), '1.0.3', 'all' );
	
	//Load Bootstrap css and js
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	
	 wp_enqueue_media();

	if ( 'appearance_page_achilles_css_options' == $hook ){
		wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/achilles.ace.css', array(), '1.0.0', 'all' );
		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
		wp_enqueue_script( 'achilles-custom-css-script', get_template_directory_uri() . '/js/achilles.custom_css.js', array('jquery'), '1.0.0', true );
	} else {
		return;
	}
}

add_action( 'admin_enqueue_scripts', 'enqueue_achilles_admin_scripts' );


/*	
	========================
		Front end ENQUEUE FUNCTIONS
	========================
*/

function enqueue_default_style(){
	//Load jquery into the footer
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.12.1.min.js', false, '1.12.1', true );
	wp_enqueue_script( 'jquery' );

	//Load Bootstrap css and js
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );

	//My files
	wp_enqueue_style( 'achilles', get_template_directory_uri() . '/css/achilles.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'shortcodesjs', get_template_directory_uri() . '/js/achilles-shortcodes.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'achillesjs', get_template_directory_uri() . '/js/achilles.js', array('jquery'), '1.0.0', true );
	//Load google font style
	wp_enqueue_style( 'raleway', "https://fonts.googleapis.com/css?family=Raleway:400,200,300,500");
	
	//Color for schmene picker
	$color_scheme = esc_attr(get_option('preset_colors'));
	$location = get_template_directory_uri() . '/css/' . $color_scheme . '.css';
	
	wp_register_style( 'achilles_scheme', $location, array(), '1.0.0', 'all' );
	wp_enqueue_style( 'achilles_scheme' );
}

add_action('wp_enqueue_scripts', 'enqueue_default_style');

?>