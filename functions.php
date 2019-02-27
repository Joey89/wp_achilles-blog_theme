<?php

//Includes
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/walker.php';
//require get_template_directory() . '/inc/achilles-shortcodes.php';
//require get_template_directory() . '/inc/achilles-tinymce-button.php';

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar1',
		'before_widget' => '<div class="sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="r_s_h2">',
		'after_title'   => '</h2>'
	) );
	//top sidebar
	register_sidebar( array(
		'name'          => 'Top Sidebar',
		'id'            => 'top-sidebar1',
		'before_widget' => '<div class="top-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="r_s_h2">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Top Sidebar 2',
		'id'            => 'top-sidebar2',
		'before_widget' => '<div class="top-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="r_s_h2">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Top Sidebar 3',
		'id'            => 'top-sidebar3',
		'before_widget' => '<div class="top-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="r_s_h2">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Top Sidebar 4',
		'id'            => 'top-sidebar4',
		'before_widget' => '<div class="top-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="r_s_h2">',
		'after_title'   => '</h2>',
	) );
	//footer sidebar
	register_sidebar( array(
		'name'          => 'Footer Area 1',
		'id'            => 'footer_area_1',
		'before_widget' => '<div class="footer-widget-area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="r_s_h2">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Area 2',
		'id'            => 'footer_area_2',
		'before_widget' => '<div class="footer-widget-area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="r_s_h2">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Area 3',
		'id'            => 'footer_area_3',
		'before_widget' => '<div class="footer-widget-area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="r_s_h2">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Area 4',
		'id'            => 'footer_area_4',
		'before_widget' => '<div class="footer-widget-area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="r_s_h2">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/* shortcodes */

add_filter('widget_text', 'do_shortcode');

// Customize Appearance Options 
function colorCustomizer( $wp_customize ){
	///
	//Icon social links
	$wp_customize->add_setting('social_top_color', array(
		'default' 	=> '#222',
		'transport' => 'refresh',
	),'link_hover_sanitize_callback');
	//Icon social links control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_control' ,array(
			'label'		=> __('Top Social Links Color', 'achilles'),
			'section' 	=> 'standard_colors',
			'settings'	=> 'social_top_color'
	)));
	//Icon social links =- hover

	$wp_customize->add_setting('link_color_hover_control', array(
		'default' 	=> '#333',
		'transport' => 'refresh',
	),'link_hover_sanitize_callback');
	//Icon social links control =- hover
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_hover_control' ,array(
			'label'		=> __('Top Social Links Hover Color', 'achilles'),
			'section' 	=> 'standard_colors',
			'settings'	=> 'link_color_hover_control'
	)));

	//stadnartize
	$wp_customize->add_section('standard_colors', array(
		'title' 	=> __('Social Link Colors', 'achilles'),
		'priority' 	=> 50,
	));
}

function link_hover_sanitize_callback(){
	return;
}
add_action('customize_register', 'colorCustomizer');


// Output Customize CSS
function outputCss(){?>
	
	<style type="text/css">
		.page-social-links .icon{
			color: <?php echo get_theme_mod(social_top_color); ?>;
		}
		.page-social-links .icon:hover{
			color: <?php echo get_theme_mod(link_color_hover_control); ?>;
		}
	</style>
	<?php
}
add_action('wp_head', 'outputCss');

	
?>