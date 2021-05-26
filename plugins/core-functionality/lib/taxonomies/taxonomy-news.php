<?php
/**
* Register News Taxonomy
*
* @author       WhiteleyDesigns
* @since        1.0.0
* @license      GPL-2.0+
*
*/

//add_action( 'init', 'create_news_tax', 0 );
function create_news_tax() {

     // customize labels
     $labels = [
          'name'          => _x( 'News Category', 'taxonomy general name', WD_THEME_NAME ),
          'add_new_item'  => __( 'Add News Category', WD_THEME_NAME ),
          'new_item_name' => __( 'New News Category', WD_THEME_NAME )
     ];

     // modify arguments
     $args = [
          'labels'        => $labels,
          'show_ui'       => true,
          'show_tagcloud' => false,
          'hierarchical'  => true,
          'show_in_rest'  => true,
          'rewrite'       => [
               'slug' => 'news-category',
          ]
     ];

     // register taxonomy
     register_taxonomy(
          'news_category',
          [ 'news' ],
          $args
     );
}
