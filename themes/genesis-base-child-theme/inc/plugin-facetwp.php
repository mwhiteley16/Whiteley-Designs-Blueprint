<?php
/**
 * FacetWP
 *
 * @author       WhiteleyDesigns
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
* Enable FacetWP pager
*/
// add_action( 'genesis_header', 'wd_facetwp_pager_setup' );
function wd_facetwp_pager_setup() {

     if ( function_exists( 'facetwp_display' ) ) {

          $object = get_queried_object();

          // array of post types to enable FacetWP pager on
          $post_type = [
               'post',
          ];

          // array of taxonomies to enable FacetWP pager on
          $taxonomies = [
               'category',
               'tag',
          ];

          // default show to false
          $show_facetwp_pager = false;

          // check for post types
          if ( is_home() && in_array( 'post', $post_type ) || is_post_type_archive() && in_array( get_post_type(), $post_type ) ) {
               $show_facetwp_pager = true;
          }

          // check for taxonomies
          if ( is_category() && in_array( 'category', $taxonomies ) || is_tag() && in_array( 'tag', $taxonomies ) || is_tax() && in_array( $object->slug, $taxonomies ) ) {
               $show_facetwp_pager = true;
          }

          // show the FacetWP pager
          if ( $show_facetwp_pager == 1 ) {

               // remove default pagination
               remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

               // add custom FacetWP pager
               add_action( 'genesis_after_endwhile', 'wd_facet_wp_pager_output' );
          }
     }
}


/**
* Output FacetWP pager
*/
function wd_facet_wp_pager_output() {

     // set proper slug
     $object = get_queried_object();
     $post_type_slug = '';

     if ( is_category() || is_tag() || is_tax() ) {
          $post_type_slug = $object->slug;
     } elseif ( is_home() ) {
          $post_type_slug = 'post';
     } elseif ( is_post_type_archive() ) {
          $post_type_slug = get_post_type();
     }

     // output FacetWP pager
     echo '<div class="archive-pager archive-pager--' . $post_type_slug . '">';
          echo facetwp_display( 'facet', 'wd_pager' );
     echo '</div>';
}
