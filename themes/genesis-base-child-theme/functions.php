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

     $font_families = apply_filters(
          'wd_theme_fonts',
          [
               'Roboto:300,300i,400,400i,500,500i,700,700i,900,900i'
          ]
     );

     $query_args = [
		'family' => implode( '|', $font_families ),
		'subset' => 'latin,latin-ext',
	];

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
     $fonts_url = $fonts_url . '&display=swap';
	return esc_url_raw( $fonts_url );
}


/**
* Frontend scripts & styles
*/
function wd_global_enqueues() {

     // fonts
     wp_enqueue_style(
          'wd-fonts',
          wd_theme_fonts()
     );

     // javascript
     wp_enqueue_script(
          'wd-scripts',
          get_stylesheet_directory_uri() . '/assets/js/main-js-min.js'
     );

     // font awesome
     // wp_enqueue_script(
     //      'wd-fontawesome',
     //      'https://kit.fontawesome.com/7bb1dd36e7.js'
     // );

     // enqueue custom stylesheet
     wp_enqueue_style(
          'wd-style',
          get_stylesheet_directory_uri() . '/assets/css/main.css',
          array(),
          filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) // append timestamp for cache busting
     );

}
add_action( 'wp_enqueue_scripts', 'wd_global_enqueues' );


/**
* Block editor scripts
*/
function wd_admin_enqueues() {

     // custom fonts
     wp_enqueue_style(
          'wd-fonts',
          wd_theme_fonts()
     );

     // flickity
     wp_enqueue_script(
          'wd-flickity-admin',
          get_stylesheet_directory_uri() . '/assets/js/src/flickity.pkgd.min.js'
     );

     // font awesome
     wp_enqueue_script(
          'wd-fontawesome',
          'https://kit.fontawesome.com/7bb1dd36e7.js'
     );

     // custom block styles
     wp_enqueue_script(
          'wd-editor',
          get_stylesheet_directory_uri() . '/assets/js/editor-min.js',
          array( 'wp-blocks', 'wp-dom' ),
          filemtime( get_stylesheet_directory() . '/assets/js/editor-min.js' ),
          true
     );
}
add_action( 'enqueue_block_editor_assets', 'wd_admin_enqueues' );


// Admin Scripts (outside block editor)
function wd_admin_style() {

     wp_enqueue_style(
          'admin-styles',
          get_stylesheet_directory_uri().'/assets/css/admin.css',
          array(),
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
     include_once( get_stylesheet_directory() . '/inc/genesis.php' );
     include_once( get_stylesheet_directory() . '/inc/gravityforms.php' );
     include_once( get_stylesheet_directory() . '/inc/gutenberg.php' );
     include_once( get_stylesheet_directory() . '/inc/wordpress.php' );
}
add_action( 'genesis_setup', 'wd_base_setup', 15 );
