<?php
/**
 * WordPress Stuff
 *
 * @author       Matt Whiteley
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Ensure jQuery loads
add_action( 'init', 'wd_load_scripts', 0 );
function wd_load_scripts() {
	wp_enqueue_script( 'jquery' );
}


// Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'wd_remove_comments_allowed_tags' );
function wd_remove_comments_allowed_tags( $defaults ) {
     $defaults['comment_notes_after'] = '';
     return $defaults;
}


// Clean up menu classes
function wd_clean_nav_menu_classes( $classes ) {
	if( ! is_array( $classes ) )
		return $classes;
	foreach( $classes as $i => $class ) {
		// Remove class with menu item id
		$id = strtok( $class, 'menu-item-' );
		if( 0 < intval( $id ) )
			unset( $classes[ $i ] );
		// Remove menu-item-type-*
		if( false !== strpos( $class, 'menu-item-type-' ) )
			unset( $classes[ $i ] );
		// Remove menu-item-object-*
		if( false !== strpos( $class, 'menu-item-object-' ) )
			unset( $classes[ $i ] );
		// Change page ancestor to menu ancestor
		if( 'current-page-ancestor' == $class ) {
			$classes[] = 'current-menu-ancestor';
			unset( $classes[ $i ] );
		}
	}
	// Remove submenu class if depth is limited
	if( isset( $args->depth ) && 1 === $args->depth ) {
		$classes = array_diff( $classes, array( 'menu-item-has-children' ) );
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'wd_clean_nav_menu_classes', 5 );


// Clean up post classes
function wd_clean_post_classes( $classes ) {
	if( ! is_array( $classes ) )
		return $classes;
	$allowed_classes = array(
  		'hentry',
  		'type-' . get_post_type(),
   	);
	return array_intersect( $classes, $allowed_classes );
}
add_filter( 'post_class', 'wd_clean_post_classes', 5 );


/*
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


// remove site health dashboard widget
add_action('wp_dashboard_setup', 'wd_remove_site_health_dashboard_widget');
function wd_remove_site_health_dashboard_widget() {
     remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
}


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
     if( $template_slug ) {

          $template_slug_trimmed = str_replace( '.php', '', $template_slug );
          $classes .= ' page-template-' . $template_slug_trimmed;
     }

	return $classes;
}
add_filter( 'admin_body_class', 'wd_editor_layout_class' );


// Add custom image sizes
// add_image_size( 'size-name', 000, 000, true );
