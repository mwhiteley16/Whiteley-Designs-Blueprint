<?php
/**
* Setup front end UI for Block Patterns
*
* @author       WhiteleyDesigns
* @since        1.0.0
* @license      GPL-2.0+
*
*/

/*
* Register Block Patterns Custom Post Type
*/
add_action( 'init', 'wd_register_cpt_block_pattern' );
function wd_register_cpt_block_pattern() {

     $labels = [
          'name'               => _x( 'Block Pattern', 'post type general name', WD_PLUGIN_THEME_NAME ),
          'singular_name'      => _x( 'Block Pattern', 'post type singular name', WD_PLUGIN_THEME_NAME ),
          'menu_name'          => _x( 'Block Patterns', 'admin menu', WD_PLUGIN_THEME_NAME ),
          'name_admin_bar'     => _x( 'Block Pattern', 'add new on admin bar', WD_PLUGIN_THEME_NAME ),
          'add_new'            => _x( 'Add New', 'Block Pattern', WD_PLUGIN_THEME_NAME ),
          'add_new_item'       => __( 'Add New Block Pattern', WD_PLUGIN_THEME_NAME ),
          'new_item'           => __( 'New Block Pattern', WD_PLUGIN_THEME_NAME ),
          'edit_item'          => __( 'Edit Block Pattern', WD_PLUGIN_THEME_NAME ),
          'view_item'          => __( 'View Block Pattern', WD_PLUGIN_THEME_NAME ),
          'all_items'          => __( 'All Block Patterns', WD_PLUGIN_THEME_NAME ),
          'search_items'       => __( 'Search Block Patterns', WD_PLUGIN_THEME_NAME ),
          'parent_item_colon'  => __( 'Parent Block Patterns:', WD_PLUGIN_THEME_NAME ),
          'not_found'          => __( 'No Block Patterns found.', WD_PLUGIN_THEME_NAME ),
          'not_found_in_trash' => __( 'No Block Patterns found in Trash.', WD_PLUGIN_THEME_NAME )
     ];

     $args = [
          'labels'              => $labels,
          'description'         => __( 'Block Patterns.', WD_PLUGIN_THEME_NAME ),
          'public'              => false,
          'exclude_from_search' => true,
          'publicly_queryable'  => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'query_var'           => true,
          'capability_type'     => 'post',
          'has_archive'         => false,
          'hierarchical'        => false,
          'menu_position'       => 28,
          'menu_icon'           => 'dashicons-align-left',
          'show_in_rest'        => true,
          'supports'            => [
               'title',
               'editor',
               'revisions',
          ],
          'rewrite' => [
               'slug'       => 'block-pattern',
               'with_front' => false,
          ],
     ];

     register_post_type(
          'block_pattern',
          $args,
     );
}


/**
* Add custom block pattern categories
*/
function wd_register_block_pattern_categories() {

     if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

          register_block_pattern_category(
               'whiteley-designs',
               [
                    'label' => _x( 'Whiteley Designs', 'Block pattern category', WD_CHILD_THEME_NAME )
               ]
          );

     }
}
add_action( 'init', 'wd_register_block_pattern_categories' );


/**
* Remove core block patterns (optional)
*
* Optionally disable core block patterns
*/
// remove_theme_support( 'core-block-patterns' );


/**
* Create categories metabox
*
* @link https://www.advancedcustomfields.com/resources/register-fields-via-php/
*/
add_action( 'acf/init', 'wd_add_block_patterns_acf_metabox' );
function wd_add_block_patterns_acf_metabox() {

     // set array of categories to offer
     $block_pattern_categories = [
          // 'buttons'          => 'Buttons', // core
          // 'columns'          => 'Columns', // core
          // 'gallery'          => 'Gallery', // core
          // 'header'           => 'Headers', // core
          // 'text'             => 'Text', // core
          // 'query'            => 'Query', // core
          'whiteley-designs' => 'Whiteley Designs', // custom
     ];

     // register the ACF field group
     acf_add_local_field_group(
          [
               'key'    => 'group_61a8f5eb8dc40',
               'title'  => 'Block Pattern Categories',
               'fields' => [
                    [
                         'key'               => 'field_61a8f608a61fa',
                         'label'             => 'Block Pattern Categories',
                         'name'              => 'wd_block_pattern_categories',
                         'type'              => 'checkbox',
                         'instructions'      => '',
                         'required'          => 0,
                         'conditional_logic' => 0,
                         'choices'           => $block_pattern_categories,
                         'allow_custom'      => 0,
                         'default_value'     => [],
                         'layout'            => 'vertical',
                         'toggle'            => 0,
                         'return_format'     => 'value',
                         'save_custom'       => 0,
                         'wrapper' => [
                              'width' => '',
                              'class' => '',
                              'id'    => '',
                         ],
                    ]
               ],
               'location' => [
                    [
                         [
                              'param'    => 'post_type',
                              'operator' => '==',
                              'value'    => 'block_pattern',
                         ]
                    ]
               ],
               'menu_order'            => 0,
               'position'              => 'side',
               'style'                 => 'default',
               'label_placement'       => 'top',
               'instruction_placement' => 'label',
               'hide_on_screen'        => '',
               'active'                => true,
               'description'           => '',
               'show_in_rest'          => 0,
          ]
     );
}


/*
* Redirect single posts to home page
*/
add_action( 'template_redirect', 'wd_block_patterns_cpt_redirect_single' );
function wd_block_patterns_cpt_redirect_single() {

     if ( is_singular( 'block_pattern' ) ) {
          wp_redirect( get_home_url() );
          exit;
     }
}


/*
* Register Block Patterns
*/
add_action( 'init', 'wd_register_block_patterns' );
function wd_register_block_patterns() {

     if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

          $loop = new WP_Query(
               [
                    'post_type'      => 'block_pattern',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
               ]
          );

          if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();

               $post_title = get_the_title();
               $post_slug = str_replace( ' ', '-', strtolower( $post_title ) );
               $post_content = get_the_content();
               $block_pattern_categories = get_field( 'wd_block_pattern_categories', get_the_ID() );

               register_block_pattern(
                    'wd/' . $post_slug,
                    [
                         'title'      => $post_title,
                         'content'    => trim( $post_content ),
                         'categories' => $block_pattern_categories,
                         'keywords'   => [
                              $post_title,
                              'pattern',
                              'block pattern',
                         ]
                    ]
               );

          endwhile; endif; wp_reset_postdata();

     }
}
