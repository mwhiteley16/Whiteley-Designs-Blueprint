<?php
/**
* register options page
* @link https://www.advancedcustomfields.com/resources/options-page/
*/
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page(
          [
               'page_title' 	=> 'Theme Options',
               'menu_title'	=> 'Theme Options',
               'menu_slug' 	=> 'theme-options',
               'capability'	=> 'edit_posts',
               'position'     => '310',
               'icon_url'     => 'dashicons-image-filter',
               'redirect'	=> false,
          ]
     );
}


/**
* restrict access to ACF from dashboard based on specific users
*/
add_filter( 'acf/settings/show_admin', 'wd_acf_show_admin' );
function wd_acf_show_admin( $show ) {

     // get current users
     $current_user = wp_get_current_user();

     // create array of approved users
     $approved_users = [
          'matt@whiteleydesigns.com',
     ];

     // allow access to acf if current user is in approved users list
     $access_result = in_array( $current_user->user_email, $approved_users ) ? true : false;
     return $access_result;
}
