<?php
/**
 * Gutenberg
 *
 * @author       WhiteleyDesigns
 * @since        1.0.0
 * @license      GPL-2.0+
**/


/**
* Enable block editor styles
*/
add_editor_style( 'assets/css/editor-style.css' );
add_theme_support( 'editor-styles' );


/**
* Responsive embeds
*/
add_theme_support( 'responsive-embeds' );


/**
* Show Reusable Blocks UI in WordPress admin
*
* @link https://www.billerickson.net/reusable-blocks-accessible-in-wordpress-admin-area
*
*/
function wd_reusable_blocks_admin_menu() {

     add_menu_page(
          'Reusable Blocks',
          'Reusable Blocks',
          'edit_posts',
          'edit.php?post_type=wp_block',
          '',
          'dashicons-editor-table',
          300
     );
}
add_action( 'admin_menu', 'wd_reusable_blocks_admin_menu' );


/**
* Add columns classes back to core columns block
*
* Only adds classes on front end, not within block editor
*
*/
 function wd_core_columns_block_classes( $block_content, $block ) {

     if ( $block['blockName'] === 'core/columns' ) {
          $columns_class = 'wp-block-columns'; // default class
          $new_columns_class = ' has-' . sizeof( $block['innerBlocks'] ) . '-columns'; // append number of columns
          $content = substr_replace( $block_content, $new_columns_class, strpos( $block_content, $columns_class ) + strlen( $columns_class ), 0 ); // replace default class with new class on outer columns wrapper
          return $content;
     }
     return $block_content;
 }
 // add_filter( 'render_block', 'wd_core_columns_block_classes', 10, 2 );
