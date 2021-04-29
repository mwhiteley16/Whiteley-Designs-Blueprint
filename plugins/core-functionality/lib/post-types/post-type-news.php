<?php
/**
 * Register Custom Post Type
 *
 * @since 2.0
 */
add_action( 'init', 'wd_news_cpt' );
function wd_news_cpt() {
	$labels = array(
		'name'               => _x( 'News Item', 'post type general name' ),
		'singular_name'      => _x( 'News Item', 'post type singular name' ),
		'menu_name'          => _x( 'News Items', 'admin menu' ),
		'name_admin_bar'     => _x( 'News Item', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'News Item' ),
		'add_new_item'       => __( 'Add New News Item' ),
		'new_item'           => __( 'New News Item' ),
		'edit_item'          => __( 'Edit News Item' ),
		'view_item'          => __( 'View News Item' ),
		'all_items'          => __( 'All News Items' ),
		'search_items'       => __( 'Search News Items' ),
		'parent_item_colon'  => __( 'Parent News Items:' ),
		'not_found'          => __( 'No News Items found.' ),
		'not_found_in_trash' => __( 'No News Items found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
          'description'        => __( 'News.' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 8,
		'menu_icon'          => 'dashicons-welcome-widgets-menus', // https://developer.wordpress.org/resource/dashicons/
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
          // 'show_in_rest'       => true,
	);

	register_post_type( 'news', $args );
}

/**
 * Customize CPT Query
 *
 * @since 2.0
 * @param object $query
 */
// add_action( 'pre_get_posts', 'news_query' );
function news_query( $query ) {
	if( $query->is_main_query() && !is_admin() && $query->is_post_type_archive( 'news' ) ) {
		$query->set( 'posts_per_page', 10 );
	}
}
?>
