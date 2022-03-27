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


/**
 * ACF Radio Color Palette
 * @link https://www.advancedcustomfields.com/resources/acf-load_field/
 * @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 * @link https://whiteleydesigns.com/create-a-gutenberg-like-color-picker-with-advanced-custom-fields-using-theme-json/
 *
 * Dynamically populates any ACF field with wd_editor_color_picker Field Name with custom theme.json palettes
 *
*/
add_filter('acf/load_field/name=wd_editor_color_picker', 'wd_acf_radio_color_palette');
function wd_acf_radio_color_palette( $field ) {

     // create color palette array
     $color_palette = [];

     // check if theme.json is being used and if so, grab the settings
     if ( class_exists( 'WP_Theme_JSON_Resolver' ) ) {
          $settings = WP_Theme_JSON_Resolver::get_theme_data()->get_settings();

          // full theme color palette
          if ( isset( $settings['color']['palette']['theme'] ) ) {
               $color_palette = $settings['color']['palette']['theme'];
          }

          // custom block color palette
          // if ( isset( $settings['blocks']['core/button']['color']['palette'] ) ) {
          //      $color_palette = $settings['blocks']['acf/acf-separator']['color']['palette'];
          // }
     }

     // if there are colors in the $color_palette array
     if( ! empty( $color_palette ) ) {

          // loop over each color and create option
          foreach( $color_palette as $color ) {
               $field['choices'][ $color['slug'] ] = $color['name'];
          }
     }

     return $field;
}
