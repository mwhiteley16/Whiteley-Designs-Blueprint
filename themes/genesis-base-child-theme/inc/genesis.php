<?php
/**
 * Genesis Changes
 *
 * @author       WhiteleyDesigns
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
* Remove default stylesheet
*/
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );


/**
* Theme support
*/
add_theme_support( 'html5' );
add_theme_support( 'genesis-responsive-viewport' );
add_theme_support( 'genesis-accessibility',
     [
          '404-page',
          'drop-down-menu',
          'headings',
          'rems',
          'search-form',
          'skip-links'
     ]
);
add_theme_support( 'genesis-structural-wraps',
     [
          'footer',
          'footer-widgets',
          'header',
          'nav',
          'site-inner',
          'site-tagline'
     ]
);
add_theme_support( 'genesis-footer-widgets', 3 );


/**
* Custom logo
*/
add_theme_support( 'custom-logo',
     [
          'width'       => 244,
          'height'      => 315,
          'flex-width'  => true,
          'flex-height' => true,
          'header-text' => [
               '.site-title',
               '.site-description'
          ]
     ]
);


/**
* Remove secondary menu
*/
add_theme_support( 'genesis-menus',
     [
          'primary' => __( 'Primary Navigation Menu', WD_CHILD_THEME_SLUG ),
     ]
);


/**
* Don't load default data into empty sidebar
*/
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
add_action( 'genesis_sidebar',
     function() {
          dynamic_sidebar( 'sidebar' );
     }
);


/**
* Remove unused page layouts
*/
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_register_layout(
     'thin-layout',
          [
               'label' => __( 'Thin Layout', WD_CHILD_THEME_SLUG )
          ]
);


/**
* Remove unused widget areas
*/
unregister_sidebar( 'header-right' );
unregister_sidebar( 'sidebar-alt' );


/**
* Reposition navigation within header
*/
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );


/**
* Remove edit link from front end
*/
add_filter( 'genesis_edit_post_link' , '__return_false' );


/**
* Remove sub navigation
*/
remove_action( 'genesis_after_header', 'genesis_do_subnav' );


/**
* Remove content-sidebar div
*/
add_filter( 'genesis_markup_content-sidebar-wrap_open', '__return_false' );
add_filter( 'genesis_markup_content-sidebar-wrap_close', '__return_false' );


/**
* Replace header with custom header
*/
remove_action( 'genesis_header', 'genesis_do_header' );
add_action( 'genesis_header', 'wd_header' );
function wd_header() {
     get_template_part( 'partials/header' );
}


/**
* Replace footer with custom footer
*/
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'wd_footer' );
function wd_footer() {
     get_template_part( 'partials/footer' );
}


/**
* Modify superfish scripts
*/
add_action( 'wp_enqueue_scripts', 'wd_disable_superfish' );
function wd_disable_superfish() {

     // remove superfish completely
	wp_deregister_script( 'superfish' );

     // remove superfish args (replaced with args in /assets/js/src/main-js.js)
	wp_deregister_script( 'superfish-args' );
}


/**
* Custom loop
*/
function wd_custom_loop() {

     if ( have_posts() ) {

          do_action( 'genesis_before_while' );

          echo '<div class="loop-wrapper">';

               while ( have_posts() ) {

                    the_post();

                    do_action( 'genesis_before_entry' );

                         if ( is_search() ) {
                              get_template_part( 'partials/search-loop-item' );
                         } else {
                              get_template_part( 'partials/loop-item' );
                         }

                    do_action( 'genesis_after_entry' );

               }

          echo '</div>';

          do_action( 'genesis_after_endwhile' );

     } else {

     	do_action( 'genesis_loop_else' );
     }
}
