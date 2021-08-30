<?php
/**
 * Functions
 *
 * @package      base-genesis-child
 * @since        1.0.0
 * @author       Matt Whiteley <matt@whiteleydesigns.com>
 * @copyright    Copyright (c) 2021, Matt Whiteley
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
 */

 /*
 BEFORE MODIFYING THIS THEME:
 Please read the instructions here:  https://github.com/mwhiteley16/genesis-base-child-theme/wiki
 For access contact matt@whiteleydesigns.com
 */

define( 'WD_CHILD_THEME_NAME', 'Base Genesis Child Theme' );
define( 'WD_CHILD_THEME_SLUG', 'base-genesis-child' );
define( 'WD_CHILD_THEME_VERSION', '1.0.0' );


/**
* Setup theme fonts
*/
function wd_theme_fonts() {

     // array of Google Fonts
     $font_families_array = [
          'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
          'Open+Sans:ital,wght@0,300;0,400;1,300'
     ];

     // create URL string from array of font families
     $font_families_string = implode( '&family=', $font_families_array );

     // create proper Google Font URL string
     $fonts_url = 'https://fonts.googleapis.com/css2?family=' . $font_families_string . '&display=swap';

	return esc_url_raw( $fonts_url );
}


/**
* Frontend scripts & styles
*/
function wd_global_enqueues() {

     // fonts
     wp_enqueue_style(
          'wd-fonts',
          wd_theme_fonts(),
          [],
          null, // remove version parameter to allow multiple fonts in string
          // 'print' // optionally defer font loading to print (performance)
     );

     // javascript
     wp_enqueue_script(
          'wd-scripts',
          get_stylesheet_directory_uri() . '/assets/js/main-js-min.js'
     );

     // enqueue custom stylesheet
     wp_enqueue_style(
          'wd-style',
          get_stylesheet_directory_uri() . '/assets/css/main.css',
          [],
          filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) // append timestamp for cache busting
     );

     // font awesome
     // wp_enqueue_script(
     //      'wd-fontawesome',
     //      'https://kit.fontawesome.com/7bb1dd36e7.js',
     //      [],
     //      null
     // );

}
add_action( 'wp_enqueue_scripts', 'wd_global_enqueues' );


/**
* Block editor scripts
*/
function wd_admin_enqueues() {

     // fonts
     wp_enqueue_style(
          'wd-fonts',
          wd_theme_fonts(),
          [],
          null
     );

     // custom block styles
     wp_enqueue_script(
          'wd-editor',
          get_stylesheet_directory_uri() . '/assets/js/editor-min.js',
          [ 'wp-blocks', 'wp-dom' ],
          filemtime( get_stylesheet_directory() . '/assets/js/editor-min.js' ),
          true
     );

     // flickity - only needed if using flickity outside of custom ACF blocks
     // wp_enqueue_script(
     //      'wd-flickity-admin',
     //      get_stylesheet_directory_uri() . '/assets/js/src/flickity.pkgd.min.js',
     //      [],
     //      null
     // );

     // font awesome
     // wp_enqueue_script(
     //      'wd-fontawesome',
     //      'https://kit.fontawesome.com/7bb1dd36e7.js',
     //      [],
     //      null
     // );
}
add_action( 'enqueue_block_editor_assets', 'wd_admin_enqueues' );


// Admin Scripts (outside block editor)
function wd_admin_style() {

     wp_enqueue_style(
          'admin-styles',
          get_stylesheet_directory_uri().'/assets/css/admin.css',
          [],
          filemtime( get_stylesheet_directory() . '/assets/css/admin.css' ) // append timestamp for cache busting
     );
}
add_action( 'admin_enqueue_scripts', 'wd_admin_style' );


/**
 * Theme Setup
 *
 * Replace default "Start Engine" functionality
 * Setup site functions to correct hooks and filters
 *
 */
function wd_base_setup() {
     include_once( get_stylesheet_directory() . '/blocks/blocks-acf.php' );
     include_once( get_stylesheet_directory() . '/inc/theme-genesis.php' );
     include_once( get_stylesheet_directory() . '/inc/plugin-acf.php' );
     include_once( get_stylesheet_directory() . '/inc/plugin-gravityforms.php' );
     include_once( get_stylesheet_directory() . '/inc/wp-block-editor.php' );
     include_once( get_stylesheet_directory() . '/inc/wp-core.php' );
}
add_action( 'genesis_setup', 'wd_base_setup', 15 );
