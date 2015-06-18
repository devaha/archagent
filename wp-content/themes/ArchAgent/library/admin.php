<?php
/*
Admin functionality changes
*/

/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter( 'login_headerurl', 'bones_login_url' );
add_filter( 'login_headertitle', 'bones_login_title' );


/************* CUSTOMIZE ADMIN *******************/

// loads admin dashboard stylesheet
function gs_admin_scripts_styles() {
  	/*
	 * Loads admin.css
	 */
	wp_enqueue_style( 'gs-admin-styles', get_template_directory_uri() . '/library/css/admin.css', array(), '1', 'all' );
}
add_action('admin_enqueue_scripts','gs_admin_scripts_styles');

?>
