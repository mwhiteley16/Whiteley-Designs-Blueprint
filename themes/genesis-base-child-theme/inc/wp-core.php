<?php
/**
 * WordPress Stuff
 *
 * @author       WhiteleyDesigns
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
* Ensure jQuery loads
*/
add_action( 'init', 'wd_load_scripts', 0 );
function wd_load_scripts() {
     wp_enqueue_script( 'jquery' );
}


/**
 * Customize login page
 *
 * - Change logo URL to home page instead of WordPress.
 * - Remove "Powered by WordPress" text
 * - Customize login logo
 */

add_filter( 'login_headerurl', 'wd_login_header_url' );
function wd_login_header_url( $url ) {
     return esc_url( home_url() );
}

add_filter( 'login_headertext', '__return_empty_string' );

add_action( 'login_head', 'wd_login_logo' );
function wd_login_logo() {

     // logo variables
     $logo_path   = '';
     $logo_width  = 367;
     $logo_height = 194;

     // if custom logo isn't set, return
     if ( ! file_exists( get_stylesheet_directory() . $logo_path ) ) {
          return;
     }

     // set logo URL as variable and calculate height
     $logo   = get_stylesheet_directory_uri() . $logo_path;
     $height = floor( $logo_height / $logo_width * 312 );
     ?>

     <style type="text/css">
          .login h1 a {
               background-image: url(<?php echo esc_url( $logo ); ?>);
               background-size: contain;
               background-repeat: no-repeat;
               background-position: center center;
               display: block;
               overflow: hidden;
               text-indent: -9999em;
               width: 312px;
               height: <?php echo esc_attr( $height ); ?>px;
          }
     </style>
     <?php
}


/**
* Remove comment form allowed tags
*/
add_filter( 'comment_form_defaults', 'wd_remove_comments_allowed_tags' );
function wd_remove_comments_allowed_tags( $defaults ) {

     $defaults['comment_notes_after'] = '';
     return $defaults;
}


/**
* Clean up menu classes
*/
function wd_clean_nav_menu_classes( $classes ) {

     if ( ! is_array( $classes ) ) {
          return $classes;
     }

     foreach ( $classes as $i => $class ) {

          // Remove class with menu item id
          $id = strtok( $class, 'menu-item-' );
          if ( 0 < intval( $id ) ) {
               unset( $classes[ $i ] );
          }

          // Remove menu-item-type-*
          if ( false !== strpos( $class, 'menu-item-type-' ) ) {
               unset( $classes[ $i ] );
          }

          // Remove menu-item-object-*
          if ( false !== strpos( $class, 'menu-item-object-' ) ) {
               unset( $classes[ $i ] );
          }

          // Change page ancestor to menu ancestor
          if ( 'current-page-ancestor' == $class ) {
               $classes[] = 'current-menu-ancestor';
               unset( $classes[ $i ] );
          }
     }

     // Remove submenu class if depth is limited
     if ( isset( $args->depth ) && 1 === $args->depth ) {
          $classes = array_diff( $classes, array( 'menu-item-has-children' ) );
     }

     return $classes;
}
add_filter( 'nav_menu_css_class', 'wd_clean_nav_menu_classes', 5 );


/**
 * Add a dropdown icon to top-level menu items.
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 * @return string Nav menu item start element.
 * Add a dropdown icon to top-level menu items
 */
function wd_nav_add_dropdown_icons( $output, $item, $depth, $args ) {

     // only use on primary navigation menu
     if ( ! isset( $args->theme_location ) || 'primary' !== $args->theme_location ) {
          return $output;
     }

     // only use if menu depth is greater than 1
     if ( 1 === $args->depth ) {
          return $output;
     }

     // add submenu dropdown to elements that have children
     if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
          $output .= '<button aria-label="Submenu Dropdown">';
               $output .= '<img src="' . get_stylesheet_directory_uri() . '/assets/images/icons/angle-down.svg" alt="Submenu Down Arrow">';
          $output .= '</button>';
     }

     return $output;
}
add_filter( 'walker_nav_menu_start_el', 'wd_nav_add_dropdown_icons', 10, 4 );


/**
* Clean up post classes
*/
function wd_clean_post_classes( $classes ) {

     if ( ! is_array( $classes ) ) {
          return $classes;
     }

     $allowed_classes = [
          'hentry',
          'type-' . get_post_type(),
     ];

     return array_intersect( $classes, $allowed_classes );
}
add_filter( 'post_class', 'wd_clean_post_classes', 5 );


/**
 * Remove un-neccessary site health checks
 *
 * Tutorial - https://wearnhardt.com/2019/05/how-to-disable-tests-in-the-wordpress-site-health-check-tool/
 * Core File - https://github.com/WordPress/WordPress/blob/5.2/wp-admin/includes/class-wp-site-health.php#L1726-L1846
 *
 */
function wd_remove_site_health_checks( $tests ) {

     unset( $tests['direct']['wordpress_version'] );
     unset( $tests['direct']['theme_version'] );
     unset( $tests['direct']['php_version'] );
     unset( $tests['direct']['php_extensions'] );
     unset( $tests['direct']['scheduled_events'] );
     unset( $tests['async']['background_updates'] );
     return $tests;
}
add_filter( 'site_status_tests', 'wd_remove_site_health_checks' );


/**
* Cleanup WordPress dashboard widgets
*/
add_action( 'wp_dashboard_setup', 'wd_cleanup_dashboard_widgets' );
function wd_cleanup_dashboard_widgets() {

     remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
     remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
     remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
     remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'side' ); // gravity forms dashboard widget
}


/**
* Add separator above custom WP admin menu items
*/
add_action( 'admin_menu', function () {

     $position = 278;
     global $menu;

     $separator = [
          0 => '',
          1 => 'read',
          2 => 'separator' . $position,
          3 => '',
          4 => 'wp-menu-separator',
     ];

     if ( isset( $menu[ $position ] ) ) {
          $menu = array_splice( $menu, $position, 0, $separator );
     } else {
          $menu[ $position ] = $separator;
     }
});


/**
 * Editor layout class
 *
 * @param string $classes Admin classes.
 * @return string
 */
function wd_editor_layout_class( $classes ) {

     // check if current page uses the block editor
     $screen = get_current_screen();
     if ( ! method_exists( $screen, 'is_block_editor' ) || ! $screen->is_block_editor() ) {
          return $classes;
     }

     // get the current post ID
     $post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : false;

     // check if we're on the block area CPT
     if ( ! empty( $post_id ) && 'block_area' === get_post_type( $post_id ) ) {
          // if yes add block area slug to body classes
          $classes .= ' wd-block-area-' . get_post( $post_id )->post_name . ' ';
     } else {
          // add genesis page layout to body classes
          $layout = genesis_get_custom_field( '_genesis_layout', $post_id );
          $classes .= ' ' . $layout;
     }

     // add page template slug to body classes
     $template_slug = get_page_template_slug( $post_id );
     if ( $template_slug ) {
          $template_slug_trimmed = str_replace( '.php', '', $template_slug );
          $classes .= ' page-template-' . $template_slug_trimmed;
     }

     return $classes;
}
add_filter( 'admin_body_class', 'wd_editor_layout_class' );


/**
* Disable self pingbacks
*/
function wd_disable_self_pingbacks( &$links ) {

     foreach ( $links as $l => $link ) {
          if ( 0 === strpos( $link, get_option( 'home' ) ) ) {
               unset($links[$l]);
          }
     }
}
add_action( 'pre_ping', 'wd_disable_self_pingbacks' );


/**
* Remove unused admin menu items
*
* @link https://whiteleydesigns.com/editing-wordpress-admin-menus/
*/
function wd_admin_menu_cleanup() {
     remove_menu_page( 'edit-comments.php' );
}
// add_action( 'admin_menu', 'wd_admin_menu_cleanup' );


/**
* Add custom image sizes
*/
// add_image_size( 'size-name', 000, 000, true );


/**
* Output social media icons
*/
function wd_social_media( $size, $class ) {

     if ( have_rows( 'wd_options_social_media_links', 'option' ) ) {

          // SVG icons codes from Font Awesome
          // Strip out Font Awesome related classes/comments and add in $size attributes
          $facebook = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="' . $size . '" height="' . $size . '"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>';
          $instagram = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="' . $size . '" height="' . $size . '"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>';
          $linkedin = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="' . $size . '" height="' . $size . '"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>';
          $pinterest = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="' . $size . '" height="' . $size . '"><path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"/></svg>';
          $twitter ='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="' . $size . '" height="' . $size . '"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>';
          $youtube = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="' . $size . '" height="' . $size . '"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>';

          echo '<div class="social-media ' . $class . '">';
          	while ( have_rows( 'wd_options_social_media_links', 'option' ) ) : the_row();

                    // icon variables
                    $wd_icon_selected_option = get_sub_field( 'wd_icon' );
                    $wd_icon_label = $wd_icon_selected_option['label'];
                    $wd_icon_slug = $wd_icon_selected_option['value'];
                    $wd_link = get_sub_field( 'wd_link' );

                    // set proper SVG icon
                    switch( $wd_icon_slug ) {
                         case "facebook":
                              $wd_icon_svg = $facebook;
                              break;
                         case "instagram":
                              $wd_icon_svg = $instagram;
                              break;
                         case "linkedin":
                              $wd_icon_svg = $linkedin;
                              break;
                         case "pinterest":
                              $wd_icon_svg = $pinterest;
                              break;
                         case "twitter":
                              $wd_icon_svg = $twitter;
                              break;
                         case "youtube":
                              $wd_icon_svg = $youtube;
                              break;
                    }

                    echo '<a class="social-media__link" href="' . esc_url( $wd_link ) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_html( $wd_icon_selected_option['label'] ) . '">';
                         echo $wd_icon_svg;
                    echo '</a>';

          	endwhile;
          echo '</div>';
     }

}
