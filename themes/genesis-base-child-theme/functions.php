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
 Please read the instructions here: https://github.com/mwhiteley16/Whiteley-Designs-Blueprint/wiki/Base-Starter-Theme-Wiki
 For access contact matt@whiteleydesigns.com
 */

define( 'WD_CHILD_THEME_NAME', 'Base Genesis Child Theme' );
define( 'WD_CHILD_THEME_SLUG', 'base-genesis-child' );
define( 'WD_CHILD_THEME_VERSION', '1.0.0' );


/**
* Setup local fonts
*/
function wd_get_local_font_families() {

	return "
     @font-face {
          font-family: 'Roboto';
          font-style: normal;
          font-stretch: normal;
          font-display: swap;
          font-weight: 400;
          src: url('" . get_stylesheet_directory_uri() . "/assets/fonts/roboto-v29-latin-regular.woff2') format('woff2');
     }
     @font-face {
          font-family: 'Roboto';
          font-style: italic;
          font-stretch: normal;
          font-display: swap;
          font-weight: 400;
          src: url('" . get_stylesheet_directory_uri() . "/assets/fonts/roboto-v29-latin-italic.woff2') format('woff2');
     }
     @font-face {
          font-family: 'Roboto';
          font-style: normal;
          font-stretch: normal;
          font-display: swap;
          font-weight: 700;
          src: url('" . get_stylesheet_directory_uri() . "/assets/fonts/roboto-v29-latin-700.woff2') format('woff2');
     }
     @font-face {
          font-family: 'Roboto';
          font-style: italic;
          font-stretch: normal;
          font-display: swap;
          font-weight: 700;
          src: url('" . get_stylesheet_directory_uri() . "/assets/fonts/roboto-v29-latin-700italic.woff2') format('woff2');
     }
     ";
}



/**
* Frontend scripts & styles
*/
function wd_global_enqueues() {

     // fonts
     wp_register_style( 'wd-local-fonts', false );
     wp_add_inline_style( 'wd-local-fonts', wd_get_local_font_families() );
     wp_enqueue_style( 'wd-local-fonts' );

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
     //      'https://kit.fontawesome.com/03bdb67d4c.js',
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
     wp_register_style( 'wd-local-fonts', false );
     wp_add_inline_style( 'wd-local-fonts', wd_get_local_font_families() );
     wp_enqueue_style( 'wd-local-fonts' );

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
     //      'https://kit.fontawesome.com/03bdb67d4c.js',
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
* Add additional script attributes
*/
function wd_script_attributes( $tag, $handle ) {

     // add crossorigin to fontawesome
     if ( 'wd-fontawesome' == $handle ) {
          return str_replace( ' src', ' crossorigin="anonymous" src', $tag );
     }

     return $tag;
}
// add_filter( 'script_loader_tag', 'wd_script_attributes', 10, 2 );


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
     // include_once( get_stylesheet_directory() . '/inc/plugin-facetwp.php' );
     include_once( get_stylesheet_directory() . '/inc/plugin-gravityforms.php' );
     include_once( get_stylesheet_directory() . '/inc/wp-block-editor.php' );
     include_once( get_stylesheet_directory() . '/inc/wp-core.php' );
}
add_action( 'genesis_setup', 'wd_base_setup', 15 );
