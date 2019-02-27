<?php
/*
	
@package achillestheme
	
	========================
		ADMIN PAGE
	========================
*/

function achilles_add_admin_page(){
	//Generate Achilles Admin Page
	
	add_theme_page( 'Achilles Admin', 'Achilles Options', 'manage_options', 'achilles_admin', 'achilles_theme_create_page', get_template_directory_uri() .'/img/achilles-logo.png', 110);

	//Generate Admin Sub Pages
	//add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );
	add_theme_page( 'achilles_admin', 'Theme Options', 'Options', 'manage_options', 'achilles_admin', 'achilles_theme_create_page' );

	add_theme_page( 'achilles_css', 'Custom CSS', 'manage_options', 'achilles_css_options', 'achilles_theme_css_page' );

	add_theme_page( 'Achilles ads', 'Manage Ads', 'manage_options', 'achilles_ads_options', 'achilles_theme_ads_page' );

	add_theme_page( 'Achilles Support', 'Support', 'manage_options', 'achilles_support_options', 'achilles_theme_support_page' );
}

add_action( 'admin_menu', 'achilles_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'achilles_custom_settings' );

function achilles_custom_settings(){

	//Custom Logo
	register_setting( 'achilles-settings-group', 'achilles_logo' );
	add_settings_field( 'custom-logo', 'Upload Your Sites Logo.', 'custom_logo_callback', 'achilles_admin', 'achilles-options-group-header');
	//Logo in menu bar
	register_setting( 'achilles-settings-group', 'achilles_menu_logo' );
	add_settings_field( 'logo-navbar', 'Place Logo in Menu bar', 'logo_menu_callback', 'achilles_admin', 'achilles-options-group-header');
	//////
	//Search bar in menu
	register_setting( 'achilles-settings-group', 'achilles_menu_search' );
	add_settings_field( 'search-navbar', 'Place Search Icon in Menu bar', 'search_menu_callback', 'achilles_admin', 'achilles-options-group-header');
	//theme supports
	//////
	//register settings
	register_setting( 'achilles-settings-group', 'header_image' );
	register_setting( 'achilles-settings-group', 'background_image' );

	//social
	register_setting( 'achilles-settings-group', 'facebook_share' );
	register_setting( 'achilles-settings-group', 'twitter_share' );
	register_setting( 'achilles-settings-group', 'reddit_share' );
	register_setting( 'achilles-settings-group', 'google_share' );
	register_setting( 'achilles-settings-group', 'pinterest_share' );

	register_setting( 'achilles-settings-group', 'facebook_link' );
	register_setting( 'achilles-settings-group', 'twitter_link' );
	register_setting( 'achilles-settings-group', 'instagram_link' );
	register_setting( 'achilles-settings-group', 'pinterest_link' );
	register_setting( 'achilles-settings-group', 'youtube_link' );
	register_setting( 'achilles-settings-group', 'googleplus_link' );
	register_setting( 'achilles-settings-group', 'rss_link' );
	register_setting( 'achilles-settings-group', 'show_media' );


	register_setting( 'achilles-settings-group', 'post_formats' );
	register_setting( 'achilles-settings-group', 'preset_colors' );

	//Page up and Secondary menu
	register_setting( 'achilles-settings-group', 'page_up' );
	register_setting( 'achilles-settings-group', 'secondary_menu' );

	//add_settings_section( 'achilles-options-group', 'Manage page options', 'achilles_admin_options', 'achilles_admin');
	add_settings_section( 'achilles-options-group-header', 'Header options', 'achilles_header_options', 'achilles_admin');
	add_settings_section( 'achilles-options-group-social', 'Social options', 'achilles_social_options', 'achilles_admin');
	add_settings_section( 'achilles-options-group-post', 'Post options', 'achilles_post_options', 'achilles_admin');
	add_settings_section( 'achilles-options-group-custom', 'Customize options', 'achilles_custom_options', 'achilles_admin');
	add_settings_section( 'achilles-options-group-more', 'More options', 'achilles_more_options', 'achilles_admin');


	//header
	add_settings_field( 'achilles-bg-header', 'Header Image', 'achilles_header_support', 'achilles_admin', 'achilles-options-group-header');
	add_settings_field( 'achilles-bg-image', 'Page Background Image', 'achilles_background_support', 'achilles_admin', 'achilles-options-group-header');
	//social achilles_twitter_share
	add_settings_field( 'achilles-twitter-share', 'Share Posts Twitter', 'achilles_twitter_share', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-facebook-share', 'Share Posts Facebook', 'achilles_facebook_share', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-reddit-share', 'Share Posts Reddit', 'achilles_reddit_share', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-google-share', 'Share Posts Google+', 'achilles_google_share', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-pinterest-share', 'Share Posts Pinterest', 'achilles_pinterest_share', 'achilles_admin', 'achilles-options-group-social');

	add_settings_field( 'achilles-show-media', 'Show Social Networks', 'achilles_show_media', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-social-fb', 'Facebook Url', 'achilles_social_facebook', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-social-twitter', 'Twitter Url', 'achilles_social_twitter', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-social-instagram', 'Instagram Url', 'achilles_social_instagram', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-social-pinterest', 'Pinterest Url', 'achilles_social_pinterest', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-social-youtube', 'Youtube Url', 'achilles_social_youtube', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-social-googleplus', 'Google Plus Url', 'achilles_social_googleplus', 'achilles_admin', 'achilles-options-group-social');
	add_settings_field( 'achilles-social-rss', 'RSS Url', 'achilles_social_rss', 'achilles_admin', 'achilles-options-group-social');


	add_settings_field( 'achilles-post-formats', 'Post Formats', 'achilles_posts_support', 'achilles_admin', 'achilles-options-group-post');
	add_settings_field( 'achilles-preset-colors', 'Color Scheme', 'achilles_preset_colors', 'achilles_admin', 'achilles-options-group-custom');




	//Custom CSS
	register_setting( 'achilles-custom-css', 'achilles_css' );

	add_settings_section( 'achilles-custom-css-section', 'Custom CSS', 'achilles_custom_css_section_callback', 'achilles_css_options');
	
	add_settings_field( 'custom-css', 'Insert your custom css.', 'achilles_custom_css_callback', 'achilles_css_options', 'achilles-custom-css-section');

	/* Support page */
	add_settings_section( 'achilles-support-section', 'Support', 'achilles_support_section_callback', 'achilles_support_options');

	/* Admin Ads Page*/
	add_settings_section( 'achilles-admin-ads-section', 'Ad Options', 'achilles_ads_options_callback', 'achilles_ads_options');

	//head ad
	register_setting( 'achilles-ads-group', 'header_ad' );
	add_settings_field( 'achilles-ads-options-header', 'Header Ads', 'achilles_header_ads', 'achilles_ads_options', 'achilles-admin-ads-section');
	//head mobile achilles_mobile_header_ads
	register_setting( 'achilles-ads-group', 'header_mobile_ad' );
	add_settings_field( 'achilles-ads-options-header-mobile', 'Header Mobile Ad', 'achilles_mobile_header_ads', 'achilles_ads_options', 'achilles-admin-ads-section');
	//below content ad
	register_setting( 'achilles-ads-group', 'below_content_ad' );
	add_settings_field( 'achilles-ads-options-below', 'Under Content Ad', 'achilles_below_content_ads', 'achilles_ads_options', 'achilles-admin-ads-section');
	//achilles_below_side_widgets_ads
	register_setting( 'achilles-ads-group', 'below_widgets_ad' );
	add_settings_field( 'achilles-ads-options-below-widgets', 'Under Sidebar Widgets Ad', 'achilles_below_side_widgets_ads', 'achilles_ads_options', 'achilles-admin-ads-section');

	//Layouts
	register_setting( 'achilles-settings-group', 'achilles_layout' );
	
	add_settings_field( 'custom-layout', 'Select one of our layout options.', 'achilles_custom_layout_callback', 'achilles_admin', 'achilles-options-group-custom');
	//container layouts
	register_setting( 'achilles-settings-group', 'achilles_container' );
	add_settings_field( 'custom-container', 'Select one of our container options.', 'achilles_custom_container_callback', 'achilles_admin', 'achilles-options-group-custom');

	//Page up and Secondary menu
	add_settings_field( 'page-up', 'Enable Page up button.', 'achilles_custom_pageup_callback', 'achilles_admin', 'achilles-options-group-custom');
	add_settings_field( 'secondary-menu', 'Enable Secondary Menu', 'achilles_custom_secondary_menu_callback', 'achilles_admin', 'achilles-options-group-custom');

	//Site footer text
	register_setting( 'achilles-settings-group', 'footer_text' );
	//footer text
	add_settings_field( 'achilles-footer-text', 'Footer Text', 'achilles_footer_text', 'achilles_admin', 'achilles-options-group-more');
	//Site meta text
	register_setting( 'achilles-settings-group', 'meta_text_posts' );
	//enable meta text
	add_settings_field( 'achilles-meta-text-posts', 'Enable Posts Meta', 'achilles_meta_text_posts', 'achilles_admin', 'achilles-options-group-more');
	//enable only on home feed page
	register_setting( 'achilles-settings-group', 'meta_text_posts_home' );
	//enable meta text
	add_settings_field( 'achilles-meta-text-posts-home', 'Enable Home Posts Meta', 'achilles_home_meta_text_posts', 'achilles_admin', 'achilles-options-group-more');
	//Support
	//Email for Support
	register_setting( 'achilles-support', 'email_support_text' );
	add_settings_field( 'achilles-support-email', 'Theme Support', 'achilles_email_support', 'achilles_support_options', 'achilles-support-section');

	//Email Sign up
	//register_setting( 'achilles-support', 'email_signup_text' );
	//add_settings_field( 'achilles-update-email', 'Recieve Theme Updates', 'achilles_email_signup', 'achilles_support_options', 'achilles-support-section');

	//link to main site
	register_setting( 'achilles-support', 'achilles_site_home' );
	add_settings_field( 'achilles-site-home', 'View More Info', 'achilles_site_home_callback', 'achilles_support_options', 'achilles-support-section');


	//#support
	//link to main site
	register_setting( 'achilles-settings-group', 'achilles_site_home' );
	add_settings_field( 'achilles-site-home', 'View More Info', 'achilles_site_home_callback', 'achilles_admin', 'achilles-options-group-more');

}
/*
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
		Callback functions
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
*/



function achilles_home_meta_text_posts(){
	$opt = esc_attr( get_option( 'meta_text_posts_home') );
	$checked = (@$opt == '1' ? 'checked' : '');
	echo '<label><input type="checkbox" name="meta_text_posts_home" id="meta_text_posts_home" '.$checked.' value="1"/> Enabled</label>';
	echo '<p class="description">Enable this to only show the posts meta on post listings page.</p>';
}
function achilles_meta_text_posts(){
	$opt = esc_attr( get_option( 'meta_text_posts') );
	$checked = (@$opt == '1' ? 'checked' : '');
	echo '<label><input type="checkbox" name="meta_text_posts" id="meta_text_posts" '.$checked.' value="1"/> Enabled</label>';
	echo '<p class="description">This is for the author name and post info right below the header.</p>';
}

function achilles_email_support(){
	$support_email = 'achillesTheme@outlook.com';
	echo 'Send us and email at <a href="mailto:'.$support_email.'">'.$support_email.'</a>';
	echo '<p class="description">I will try to respond as soon as possible but please allow a couple of days.</p>';
}

function achilles_header_ads(){
	$opt_head_ad = esc_attr( get_option('header_ad') );
	
	echo '<textarea id="header_ad_textarea" name="header_ad" id="header_ad" value="'.$opt_head_ad.'" cols="55" rows="15"></textarea>';
	echo '<input type="hidden" id="header_ad_text" value="'.$opt_head_ad.'"/>';
	echo '<p class="description">Place your ad code in here. This is designed for an ad with a height of 90px.</p>';
}
function achilles_mobile_header_ads(){
	$opt_head_ad = esc_attr( get_option('header_mobile_ad') );
	
	echo '<textarea id="header_mobile_ad" name="header_mobile_ad" id="header_mobile_ad" value="'.$opt_head_ad.'" cols="55" rows="15"></textarea>';
	echo '<input type="hidden" id="header_mobile_ad_text" value="'.$opt_head_ad.'"/>';
	echo '<p class="description">This ad will be used for when your page is smaller than 770px. If not set the ads wont display on mobile. Try to find a responsive ad or one with smaller width.</p>';
}

function achilles_below_content_ads(){
	$opt_ad = esc_attr( get_option('below_content_ad') );
	
	echo '<textarea id="below_content_ad" name="below_content_ad" id="below_content_ad" value="'.$opt_ad.'" cols="55" rows="15"></textarea>';
	echo '<input type="hidden" id="below_content_ad_text" value="'.$opt_ad.'"/>';
	echo '<p class="description">Place your ad code in here. This is for a responsive ad, width is set to 100% and height set to 320px.</p>';
}
function achilles_below_side_widgets_ads(){
	$opt_ad = esc_attr( get_option('below_widgets_ad') );
	
	echo '<textarea id="below_widgets_ad" name="below_widgets_ad" id="below_widgets_ad" value="'.$opt_ad.'" cols="55" rows="15"></textarea>';
	echo '<input type="hidden" id="below_widget_ad_text" value="'.$opt_ad.'"/>';
	echo '<p class="description">Place your ad code in here. </p>';
}


function achilles_site_home_callback(){
	$website_name = 'http://www.achillestheme.com';
	echo '<a href="'.$website_name.'" >Visit our page for more info.</a>';
}
function achilles_custom_container_callback(){
	$opts = esc_attr( get_option('achilles_container') );

	$Schecked = ( @$opts == 'standard-layout' ? 'checked' : '' );
	$Fchecked = ( @$opts == 'full-width-layout' ? 'checked' : '' );
	$Bchecked = ( @$opts == 'boxed-layout' ? 'checked' : '' );

	echo '<label><input type="radio" name="achilles_container" id="standard-layout" value="standard-layout" '.$Schecked.'> Standard</label>';
	echo '<p class="description">Header and footer will be full width, content will have a container.</p><br>';

	echo '<label><input type="radio" name="achilles_container" id="full-width-layout" value="full-width-layout" '.$Fchecked.'> Full Width</label>';
	echo '<p class="description">Everything is full width.</p><br>';

	echo '<label><input type="radio" name="achilles_container" id="boxed-layout" value="boxed-layout" '.$Bchecked.'> Boxed</label>';
	echo '<p class="description">Everything is inside container.</p><br>';
}
function achilles_custom_pageup_callback(){
	$opt = esc_attr(get_option('page_up'));
	$checked = (@$opt == '1'? 'checked' : '');
	echo '<label><input type="checkbox" name="page_up" id="page_up" value="1" '.$checked.'/> Enabled</label>';
	echo '<p class="description">Page up button will show up when you scroll far enough down on your page.</p>';
}
function achilles_custom_secondary_menu_callback(){
	$opt = esc_attr(get_option('secondary_menu'));
	$checked = (@$opt == '1'? 'checked' : '');
	echo '<label><input type="checkbox" name="secondary_menu" id="secondary_menu" value="1" '.$checked.'/> Enabled</label>';
	echo '<p class="description">Secondary menu below content.</p>';
}
//EMAIL SIGNUP
/*function achilles_email_signup(){
	$opt = esc_attr(get_option('email_signup_text'));
	echo '<div class="input-group" style="max-width: 60%;"><input type="email" name="email_signup_text" id="email_signup_text" value="'.$opt.'" placeholder="example@example.com" class="form-control"/>';
	echo '<div class="input-group-btn"><button type="submit" class="btn btn-default" id="send_email">Send</button></div></div>';
	echo '<p class="description">Enter your email to recieve theme updates.</p>';
}*/
//Theme support options
//seearch menu in navbar
function search_menu_callback(){
	$opt = esc_attr(get_option('achilles_menu_search'));
	$checked = (@$opt == 1? 'checked' : '');
	echo '<label><input type="checkbox" name="achilles_menu_search" id="achilles_menu_search" value="1" '.$checked.'/> Menu Search</label>';
	echo '<p class="description">Place Search icon in menu.</p>';
}
//Logo in navbar
function logo_menu_callback(){
	$opt = esc_attr(get_option('achilles_menu_logo'));
	$checked = (@$opt == 1? 'checked' : '');
	echo '<label><input type="checkbox" name="achilles_menu_logo" id="achilles_menu_logo" value="1" '.$checked.'/> Menu Logo</label>';
	echo '<p class="description">Place logo in menu instead of main position.</p>';
}
//Header image supprt
function achilles_header_support(){
	$options = get_option( 'header_image' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="header_image" name="header_image" value="1" '.$checked.' /> Activate the Custom Header</label>';
	echo '<p class="description">Enable Header Image.</p>';
}
//bg image supprt
function achilles_background_support(){
	$options = get_option( 'background_image' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="background_image" name="background_image" value="1" '.$checked.' /> Activate the Custom Background</label>';
	echo '<p class="description">Enable Background Image.</p>';
}
//Post formats
function achilles_posts_support(){
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' );
	foreach($formats as $format){
		$checked = ( @$options[$format] == '1' ? 'checked' : '' );
		echo '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'> ' . $format .  '</label><br>';
	}
}
//Color supports
function achilles_preset_colors(){
	$options = get_option( 'preset_colors' );
	
	$Schecked = ( @$options == 'standard' ? 'checked' : '' );
	$Lchecked = ( @$options == 'light' ? 'checked' : '' );
	$Dchecked = ( @$options == 'dark' ? 'checked' : '' );
	echo '<input type="radio" name="preset_colors" id="standard" value="standard" '.$Schecked.'> Standard <br>';
	echo '<input type="radio" name="preset_colors" id="light" value="light" '.$Lchecked.'> Light <br>';
	echo '<input type="radio" name="preset_colors" id="dark" value="dark" '.$Dchecked.'> Dark <br>';
}

//custom css
function achilles_custom_css_callback() {
	$css = get_option( 'achilles_css' );
	$css = ( empty($css) ? '/* Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="achilles_css" name="achilles_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}

//custom logo
function custom_logo_callback(){
	$logo = esc_attr(get_option( 'achilles_logo' ) ) ;
	
	if(empty($logo)){
		echo '<input type="button" class="button button-secondary" value="Upload Logo" id="upload-button"><input type="hidden" id="achilles-logo" name="achilles_logo" value="" />';
	} else {

		echo '<input type="button" class="button button-secondary" value="Replace Logo" id="upload-button"><input type="hidden" id="achilles-logo" name="achilles_logo" value="'.$logo.'" /><input type="button" class="button button-secondary" value="Remove" id="remove-logo">';
	}
}

//LAyout

function achilles_custom_layout_callback(){
	$layout = esc_attr( get_option('achilles_layout') );

	$Lchecked = ( @$layout == 'left' ? 'checked' : '');
	$Rchecked = ( @$layout == 'right' ? 'checked' : '');
	$Fchecked = ( @$layout == 'full' ? 'checked' : '');
	echo '<input type="radio" value="left" name="achilles_layout" id="left-sidebar" '.$Lchecked.'> <img src="'.get_template_directory_uri() . '/img/layouts/left.png" alt="Left-Sidebar"/> ';
	echo '<input type="radio" value="right" name="achilles_layout" id="right-sidebar" '.$Rchecked.'> <img src="'.get_template_directory_uri() . '/img/layouts/right.png" alt="Right-Sidebar"/> ';
	echo '<input type="radio" value="full" name="achilles_layout" id="full-width" '.$Fchecked.'> <img src="'.get_template_directory_uri() . '/img/layouts/full.png" alt="Full-Width"/> ';
	
}


//Social media
//share
function achilles_facebook_share(){
	$opt = esc_attr(get_option('facebook_share'));
	$checked = ($opt == '1' ? 'checked' : '');
	echo '<label><input type="checkbox" name="facebook_share" id="facebook_share" value="1"'.$checked.'/> Enable Facebook Sharing</label>';
	echo '<p class="description">Enable Facebook Sharing option for each post.</p>';
}
function achilles_twitter_share(){
	$opt = esc_attr(get_option('twitter_share'));
	$checked = ($opt == '1' ? 'checked' : '');
	echo '<label><input type="checkbox" name="twitter_share" id="twitter_share"  value="1"'.$checked.'/> Enable Twitter Sharing</label>';
	echo '<p class="description">Enable Twitter Sharing option for each post.</p>';
}

function achilles_google_share(){
	$opt = esc_attr(get_option('google_share'));
	$checked = ($opt == '1' ? 'checked' : '');
	echo '<label><input type="checkbox" name="google_share" id="google_share"  value="1"'.$checked.'/> Enable Google Plus Sharing</label>';
	echo '<p class="description">Enable Google Plus Sharing option for each post.</p>';
}
function achilles_reddit_share(){
	$opt = esc_attr(get_option('reddit_share'));
	$checked = ($opt == '1' ? 'checked' : '');
	echo '<label><input type="checkbox" name="reddit_share" id="reddit_share"  value="1"'.$checked.'/> Enable Reddit Sharing</label>';
	echo '<p class="description">Enable Reddit Sharing option for each post.</p>';
}
function achilles_pinterest_share(){
	$opt = esc_attr(get_option('pinterest_share'));
	$checked = ($opt == '1' ? 'checked' : '');
	echo '<label><input type="checkbox" name="pinterest_share" id="pinterest_share"  value="1"'.$checked.'/> Enable Pinterest Sharing</label>';
	echo '<p class="description">Enable Pinterest Sharing option for each post.</p>';
}

//
function achilles_show_media(){
	$opt = esc_attr(get_option('show_media'));
	$checked = ( @$opt == '1' ? 'checked' : '' );
	echo '<input type="checkbox" name="show_media" id="show_media" value="1" '.$checked.' ><span class="description">Check to show social links on your site.</span>';
}
function achilles_social_facebook(){
	$fb = esc_attr(get_option('facebook_link'));
	echo '<input type="text" name="facebook_link" id="facebook_link" value="'.$fb.'" placeholder="fb.username">';
	echo '<p class="description">Your name on facebook. The last part of the url.</p>';
}
function achilles_social_twitter(){
	$twitter = esc_attr(get_option('twitter_link'));
	echo '<input type="text" name="twitter_link" id="twitter_link" value="'.$twitter.'" placeholder="twitter username">';
	echo '<p class="description">Your twitter username without the @.</p>';
}
function achilles_social_instagram(){
	$ig = esc_attr(get_option('instagram_link'));
	echo '<input type="text" name="instagram_link" id="instagram_link" value="'.$ig.'" placeholder="instagram username">';
	echo '<p class="description">Your instagram username without the @.</p>';
}
function achilles_social_pinterest(){
	$opt = esc_attr(get_option('pinterest_link'));
	echo '<input type="text" name="pinterest_link" id="pinterest_link" value="'.$opt.'" placeholder="pinterest username">';
	echo '<p class="description">Your pinterest username.</p>';
}
function achilles_social_youtube(){
	$opt = esc_attr(get_option('youtube_link'));
	echo '<input type="text" name="youtube_link" id="youtube_link" value="'.$opt.'" placeholder="youtube username">';
	echo '<p class="description">Your youtube channel end url.</p>';
}
function achilles_social_googleplus(){
	$opt = esc_attr(get_option('googleplus_link'));
	echo '<input type="text" name="googleplus_link" id="googleplus_link" value="'.$opt.'" placeholder="google+ username">';
	echo '<p class="description">Your google plus end url, just the numbers.</p>';
}
function achilles_social_rss(){
	$opt = esc_attr(get_option('rss_link'));
	echo '<input type="text" name="rss_link" id="rss_link" value="'.$opt.'" placeholder="rss username">';
	echo '<p class="description">Your full RSS Feed.</p>';
}
//function achilles_footer_text
function achilles_footer_text(){
	$opt = esc_attr( get_option('footer_text') );
	if(!empty($opt)){
		add_filter('option_blogdescription', 'custom_option_description', 10, 1);
	}
	echo '<input type="text" name="footer_text" id="footer_text" value="'. $opt .'"/><br>';
	echo '<span class="description">Edit the footer text, at the bottom of your page.</span>';

	//filters for footer_text
	function custom_option_description($opt){
		echo $opt;
		return $opt;
	}
}


/* Achilles Ad Page */


/*
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
		Admin options Text
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
*/
function achilles_admin_options(){
	//echo 'Activate or Deactivate Options';
}
function achilles_header_options(){
	//echo 'Header Options';
}
function achilles_social_options(){
	//echo 'Social Network Options';
}
function achilles_post_options(){
	//echo 'Post Options';
}
function achilles_custom_options(){
	//echo 'Site Options';
}
function achilles_more_options(){
	//echo 'More Options';
}

function achilles_custom_css_section_callback() {
	echo 'Customize your Theme with your own CSS';
}

function achilles_ads_options_callback(){
	echo 'Customize ad below your heading, and customize ad below your content.';
}
function achilles_support_section_callback(){

}


/*
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
		Templates
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
*/
function achilles_theme_create_page(){
	require_once get_template_directory() . '/inc/templates/achilles-admin.php';
}

function achilles_theme_css_page(){
	require_once get_template_directory() . '/inc/templates/achilles-custom-css.php';
}

function achilles_theme_ads_page(){
	require_once get_template_directory() . '/inc/templates/achilles-admin-ads.php';
}

function achilles_theme_support_page(){
	require_once get_template_directory() . '/inc/templates/achilles-support.php';
}