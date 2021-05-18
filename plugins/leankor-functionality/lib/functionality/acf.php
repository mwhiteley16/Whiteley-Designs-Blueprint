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
               'position'     => '58.997', // Adds under Genesis options page
               'icon_url'     => 'dashicons-image-filter',
               'redirect'	=> false
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


/**
 * ACF Radio Color Palette
 * @link https://www.advancedcustomfields.com/resources/acf-load_field/
 * @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 * @link https://whiteleydesigns.com/create-a-gutenberg-like-color-picker-with-advanced-custom-fields
 *
 * Dynamically populates any ACF field with wd_text_color Field Name with custom color palette
 *
*/
add_filter( 'acf/load_field/name=wd_text_color', 'wd_acf_dynamic_colors_load' );
add_filter( 'acf/load_field/name=wd_background_color', 'wd_acf_dynamic_colors_load' );
function wd_acf_dynamic_colors_load( $field ) {

     $colors = get_theme_support( 'editor-color-palette' );

     if ( ! empty( $colors ) ) {

          foreach ( $colors[0] as $color ) {
               $field['choices'][ $color['slug'] ] = $color['name'];
          }

     }

     return $field;
     
}
