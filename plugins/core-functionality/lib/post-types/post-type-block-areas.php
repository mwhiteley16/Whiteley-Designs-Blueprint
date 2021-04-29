<?php
/**
 * Block Area
 * CPT for block-based widget areas, until WP core adds block support to widget areas
 * @link https://www.billerickson.net/wordpress-gutenberg-block-widget-areas/
 *
 * @package      CoreFunctionality
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

class WD_Block_Area {

	/**
	 * Instance of the class.
	 * @var object
	 */
	private static $instance;

	/**
	 * Class Instance.
	 * @return WD_Block_Area
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof WD_Block_Area ) ) {
			self::$instance = new WD_Block_Area();

			// Actions
			add_action( 'init',              array( self::$instance, 'wd_block_areas_cpt'      )    );
			add_action( 'template_redirect', array( self::$instance, 'redirect_single'   )    );
		}
		return self::$instance;
	}

	/**
	 * Register the custom post type
	 *
	 */
     function wd_block_areas_cpt() {
     	$labels = array(
     		'name'               => _x( 'Block Area', 'post type general name' ),
     		'singular_name'      => _x( 'Block Area', 'post type singular name' ),
     		'menu_name'          => _x( 'Block Areas', 'admin menu' ),
     		'name_admin_bar'     => _x( 'Block Area', 'add new on admin bar' ),
     		'add_new'            => _x( 'Add New', 'Block Area' ),
     		'add_new_item'       => __( 'Add New Block Area' ),
     		'new_item'           => __( 'New Block Area' ),
     		'edit_item'          => __( 'Edit Block Area' ),
     		'view_item'          => __( 'View Block Area' ),
     		'all_items'          => __( 'All Block Areas' ),
     		'search_items'       => __( 'Search Block Areas' ),
     		'parent_item_colon'  => __( 'Parent Block Areas:' ),
     		'not_found'          => __( 'No Block Areas found.' ),
     		'not_found_in_trash' => __( 'No Block Areas found in Trash.' )
     	);

     	$args = array(
               'labels'              => $labels,
               'description'         => __( 'Block areas used to show custom blocks in templates.' ),
               'public'              => false,
               'show_ui'             => true,
               'show_in_rest'        => true,
               'exclude_from_search' => true,
               'show_in_menu'        => true,
               'query_var'           => true,
               'can_export'          => true,
               'rewrite'             => array( 'slug' => 'block-area', 'with_front' => false ),
               'has_archive'         => false,
               'hierarchical'        => false,
               'menu_position'       => 29,
               'menu_icon'           => 'dashicons-welcome-widgets-menus', // https://developer.wordpress.org/resource/dashicons/
               'supports'            => array( 'title', 'editor', 'revisions' ),
     	);

     	register_post_type( 'block_area', $args );
     }

     /**
      * Redirect single block areas
      *
      */
     function redirect_single() {
     	if( is_singular( 'block_area' ) ) {
     		wp_redirect( home_url() );
     		exit;
     	}
     }

     /**
      * Show block area
      *
      */
     function show( $location = '' ) {
     	if( ! $location )
     		return;

     	$location = sanitize_key( $location );

     	$loop = new WP_Query( array(
     		'post_type'		=> 'block_area',
     		'name'    		=> $location,
     		'posts_per_page'	=> 1,
     	));

     	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();
     		echo '<div class="block-area block-area-' . $location . '">';
     			the_content();
     		echo '</div>';
     	endwhile; endif; wp_reset_postdata();
     }

}

/**
 * The function provides access to the class methods.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * example usage:
 * if( function_exists( 'wd_block_area' ) )
 *   ea_block_area()->show( 'after-post' );
 *
 * @return object
 */
function wd_block_area() {
	return WD_Block_Area::instance();
}
wd_block_area();
