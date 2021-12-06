<?php
/**
 * Gutenberg
 *
 * @author       WhiteleyDesigns
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
* Add support for wide blocks
*/
add_theme_support( 'align-wide' );


/**
* Enable block editor styles
*/
add_editor_style( 'assets/css/editor-style.css' );
add_theme_support( 'editor-styles' );


/**
* Disable custom colors
*/
add_theme_support( 'disable-custom-colors' );


/**
* Gradient color setup
*
* @link https://richtabor.com/block-editor-gradients/
*/
add_theme_support( 'editor-gradient-presets', [] );
add_theme_support( 'disable-custom-gradients', true ); // disable


/**
* Responsive embeds
*/
add_theme_support( 'responsive-embeds' );


/**
* Customize block editor color palette
*
* Match colors with variables set in /assets/scss/partials/base/variables.scss
*
*/
add_theme_support( 'editor-color-palette',
     [
          [
               'name'  => __( 'Primary Color', WD_CHILD_THEME_SLUG ),
               'slug'  => 'primary-color',
               'color' => '#007991',
          ],
          [
               'name'  => __( 'Secondary Color', WD_CHILD_THEME_SLUG ),
               'slug'  => 'secondary-color',
               'color' => '#439a86',
          ],
          [
               'name'  => __( 'Grey Light', WD_CHILD_THEME_SLUG ),
               'slug'  => 'grey-light',
               'color' => '#fafafa',
          ],
          [
               'name'  => __( 'Grey Medium', WD_CHILD_THEME_SLUG ),
               'slug'  => 'grey-medium',
               'color' => '#e0e0e0',
          ],
          [
               'name'  => __( 'Grey Dark', WD_CHILD_THEME_SLUG ),
               'slug'  => 'grey-dark',
               'color' => '#424242',
          ],
          [
               'name'  => __( 'White', WD_CHILD_THEME_SLUG ),
               'slug'  => 'white',
               'color' => '#ffffff',
          ],
          [
               'name'  => __( 'Black', WD_CHILD_THEME_SLUG ),
               'slug'  => 'black',
               'color' => '#000000',
          ],
     ]
);


/**
* Customize block editor font sizes
*
* Match font sizes with sizes set in /assets/scss/partials/blocks/core/paragraphs.scss
*
*/
add_theme_support( 'editor-font-sizes',
     [
          [
               'name'      => __( 'Small', WD_CHILD_THEME_SLUG ),
               'shortName' => __( 'S', WD_CHILD_THEME_SLUG ),
               'size'      => 12,
               'slug'      => 'small',
          ],
          [
               'name'      => __( 'Regular', WD_CHILD_THEME_SLUG ),
               'shortName' => __( 'M', WD_CHILD_THEME_SLUG ),
               'size'      => 16,
               'slug'      => 'regular',
          ],
          [
               'name'      => __( 'Large', WD_CHILD_THEME_SLUG ),
               'shortName' => __( 'L', WD_CHILD_THEME_SLUG ),
               'size'      => 20,
               'slug'      => 'large',
          ],
          [
               'name'      => __( 'Larger', WD_CHILD_THEME_SLUG ),
               'shortName' => __( 'XL', WD_CHILD_THEME_SLUG ),
               'size'      => 24,
               'slug'      => 'larger',
          ],
     ]
);


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
