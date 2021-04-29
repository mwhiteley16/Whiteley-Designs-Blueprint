<?php
/**
 * Genesis Changes
 *
 * @author       Matt Whiteley
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Remove default stylesheet
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );


// Theme Support
add_theme_support( 'html5' );
add_theme_support( 'genesis-responsive-viewport' );
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );
add_theme_support( 'genesis-footer-widgets', 3 );
add_theme_support( 'genesis-structural-wraps', array( 'footer', 'footer-widgets', 'header', 'nav', 'site-inner', 'site-tagline' ) );


// Custom logo
add_theme_support( 'custom-logo', array(
     'width'       => 244,
     'height'      => 315,
     'flex-width'  => true,
     'flex-height' => true,
     'header-text' => array( '.site-title', '.site-description' ),
));


// remove secondary menu
add_theme_support( 'genesis-menus', array(
     'primary' => __( 'Primary Navigation Menu', CHILD_THEME_SLUG ),
));


// Don't load default data into empty sidebar
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
add_action( 'genesis_sidebar', function() { dynamic_sidebar( 'sidebar' ); } );


// Remove unused page layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_register_layout( 'thin-layout', [ 'label' => __( 'Thin Layout', CHILD_THEME_SLUG ) ] );


// Remove unused widget areas
unregister_sidebar( 'header-right' );
unregister_sidebar( 'sidebar-alt' );


// Reposition navigation within header
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );


// Remove edit link from front end
add_filter ( 'genesis_edit_post_link' , '__return_false' );


// Remove sub navigation
remove_action( 'genesis_after_header', 'genesis_do_subnav' );


// Remove content-sidebar div
add_filter( 'genesis_markup_content-sidebar-wrap_open', '__return_false' );
add_filter( 'genesis_markup_content-sidebar-wrap_close', '__return_false' );


// Replace header with custom header
remove_action( 'genesis_header', 'genesis_do_header' );
add_action( 'genesis_header', 'wd_header' );
function wd_header() {
     get_template_part( 'sections/header' );
}


// Replace footer with custom footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'wd_footer' );
function wd_footer() {
     get_template_part( 'sections/footer' );
}


// custom loop
function wd_custom_loop() {

     if ( have_posts() ) {

          do_action( 'genesis_before_while' );
          echo '<div class="loop-wrapper">';

               while ( have_posts() ) {

                    the_post();

                    do_action( 'genesis_before_entry' );
                         if( is_search() ) {
                              get_template_part( 'sections/search-loop-item' );
                         } else {
                              get_template_part( 'sections/loop-item' );
                         }
     			do_action( 'genesis_after_entry' );

               }

          echo '</div>';
          do_action( 'genesis_after_endwhile' );

     } else {
     	do_action( 'genesis_loop_else' );
     }
}
