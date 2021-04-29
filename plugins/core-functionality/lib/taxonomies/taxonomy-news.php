<?php
/**
 * Register taxonomy
 *
 * @since 2.0
 */
//add_action( 'init', 'create_news_tax', 0 );
function create_news_tax() {
     register_taxonomy(
          'news_category',
          'news',
          array(
               'labels' => array(
                    'name' => 'News Category',
                    'add_new_item' => 'Add News Category',
                    'new_item_name' => 'New News Category',
               ),
               'show_ui' => true,
               'show_tagcloud' => false,
               'hierarchical' => true,
               'show_in_rest' => true,
          )
     );
}
