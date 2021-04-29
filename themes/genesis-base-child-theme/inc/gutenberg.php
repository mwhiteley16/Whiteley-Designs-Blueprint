<?php
/**
 * Gutenberg
 *
 * @author       Matt Whiteley
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// Add support for wide blocks
add_theme_support( 'align-wide' );


// Enable block editor styles
add_editor_style( 'assets/css/editor-style.css' );
add_theme_support( 'editor-styles' );


// Disable Custom Colors
add_theme_support( 'disable-custom-colors' );


// Disable gradient color options
add_theme_support( 'editor-gradient-presets', [] );
add_theme_support( 'disable-custom-gradients', true );


// Responsive embeds
add_theme_support( 'responsive-embeds' );


/*
 * Customize Gutenberg Color Palette
 *
 * Match colors with variables set in /assets/scss/partials/base/variables.scss
 *
 */
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Primary Color', CHILD_THEME_SLUG ),
		'slug'  => 'primary-color',
		'color'	=> '#007991',
	),
	array(
		'name'  => __( 'Secondary Color', CHILD_THEME_SLUG ),
		'slug'  => 'secondary-color',
		'color' => '#439a86',
	),
	array(
		'name'  => __( 'Grey Light', CHILD_THEME_SLUG ),
		'slug'  => 'grey-light',
		'color' => '#fafafa',
	),
	array(
		'name'  => __( 'Grey Medium', CHILD_THEME_SLUG ),
		'slug'  => 'grey-medium',
		'color' => '#e0e0e0',
	),
	array(
		'name'  => __( 'Grey Dark', CHILD_THEME_SLUG ),
		'slug'  => 'grey-dark',
		'color' => '#424242',
	),
     array(
		'name'  => __( 'White', CHILD_THEME_SLUG ),
		'slug'  => 'white',
		'color' => '#ffffff',
     ),
     array(
		'name'  => __( 'Black', CHILD_THEME_SLUG ),
		'slug'  => 'black',
		'color' => '#000000',
     ),
) );


/*
 * Customize Gutenberg Font Sizes
 *
 * Match font sizes with sizes set in /assets/scss/partials/blocks/core/paragraphs.scss
 *
 */
add_theme_support( 'editor-font-sizes', array(
	array(
		'name'      => __( 'Small', CHILD_THEME_SLUG ),
		'shortName' => __( 'S', CHILD_THEME_SLUG ),
		'size'      => 12,
		'slug'      => 'small'
	),
	array(
		'name'      => __( 'Regular', CHILD_THEME_SLUG ),
		'shortName' => __( 'M', CHILD_THEME_SLUG ),
		'size'      => 16,
		'slug'      => 'regular'
	),
	array(
		'name'      => __( 'Large', CHILD_THEME_SLUG ),
		'shortName' => __( 'L', CHILD_THEME_SLUG ),
		'size'      => 20,
		'slug'      => 'large'
	),
	array(
		'name'      => __( 'Larger', CHILD_THEME_SLUG ),
		'shortName' => __( 'XL', CHILD_THEME_SLUG ),
		'size'      => 24,
		'slug'      => 'larger'
	)
) );


/**
 * Show Reusable Blocks UI in WordPress admin
 *
 * @link https://www.billerickson.net/reusable-blocks-accessible-in-wordpress-admin-area
 *
 */
function wd_reusable_blocks_admin_menu() {
    add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 32 );
}
add_action( 'admin_menu', 'wd_reusable_blocks_admin_menu' );
