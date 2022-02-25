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
