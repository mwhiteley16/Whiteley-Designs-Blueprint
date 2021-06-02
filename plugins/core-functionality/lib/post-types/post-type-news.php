<?php
/**
* Register News Custom Post Type
*
* @author       WhiteleyDesigns
* @since        1.0.0
* @license      GPL-2.0+
*
*/

add_action( 'init', 'wd_register_cpt_news' );
function wd_register_cpt_news() {

	$labels = [
		'name'               => _x( 'News Item', 'post type general name', WD_PLUGIN_THEME_NAME ),
		'singular_name'      => _x( 'News Item', 'post type singular name', WD_PLUGIN_THEME_NAME ),
		'menu_name'          => _x( 'News Items', 'admin menu', WD_PLUGIN_THEME_NAME ),
		'name_admin_bar'     => _x( 'News Item', 'add new on admin bar', WD_PLUGIN_THEME_NAME ),
		'add_new'            => _x( 'Add New', 'News Item', WD_PLUGIN_THEME_NAME ),
		'add_new_item'       => __( 'Add New News Item', WD_PLUGIN_THEME_NAME ),
		'new_item'           => __( 'New News Item', WD_PLUGIN_THEME_NAME ),
		'edit_item'          => __( 'Edit News Item', WD_PLUGIN_THEME_NAME ),
		'view_item'          => __( 'View News Item', WD_PLUGIN_THEME_NAME ),
		'all_items'          => __( 'All News Items', WD_PLUGIN_THEME_NAME ),
		'search_items'       => __( 'Search News Items', WD_PLUGIN_THEME_NAME ),
		'parent_item_colon'  => __( 'Parent News Items:', WD_PLUGIN_THEME_NAME ),
		'not_found'          => __( 'No News Items found.', WD_PLUGIN_THEME_NAME ),
		'not_found_in_trash' => __( 'No News Items found in Trash.', WD_PLUGIN_THEME_NAME )
	];

	$args = [
		'labels'             => $labels,
          'description'        => __( 'News.', WD_PLUGIN_THEME_NAME ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 8,
		'menu_icon'          => 'dashicons-welcome-widgets-menus',
          'show_in_rest'       => true,
		'supports'           => [
               'title',
               'editor',
               'thumbnail'
          ],
          'rewrite'            => [
               'slug' => 'news'
          ],
	];

	register_post_type(
          'news',
          $args
     );
}

/**
* Customize CPT Query
*
* @author       WhiteleyDesigns
* @since        1.0.0
* @license      GPL-2.0+
*
*/
// add_action( 'pre_get_posts', 'wd_news_cpt_pre_get_posts' );
function wd_news_cpt_pre_get_posts( $query ) {

	if( $query->is_main_query() && !is_admin() && $query->is_post_type_archive( 'news' ) ) {

          $query->set( 'posts_per_page', 10 );

     }

}
