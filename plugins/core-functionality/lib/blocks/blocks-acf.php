<?php
/**
 * ACF Gutenberg Blocks
 *
 * Categories: common, formatting, layout, widgets, embed
 * Modes: preview, edit, auto
 * Align: left, center, right, wide, full
 * Align Text: left, center, right
 * Align Content: top, center, bottom (top left, etc available with matrix)
 * Dashicons: https://developer.wordpress.org/resource/dashicons/
 * ACF Settings: https://www.advancedcustomfields.com/resources/acf_register_block/
 * Gutenberg Supports: https://developer.wordpress.org/block-editor/developers/block-api/block-supports/
 *
*/
add_action( 'acf/init', 'wd_acf_blocks' );
function wd_acf_blocks() {

 	if( function_exists( 'acf_register_block' ) ) {

          // acf_register_block_type(array(
          //      'name'			=> '',
          //      'title'			=> __( '' ),
          //      'description'		=> __( '' ),
          //      'category'		=> 'wd-blocks',
          //      'icon'			=> [
          //           'background' => '#fff',
          //           'foreground' => '#b5267b',
          //           'src'        => 'star-filled'
          //      ],
          //      'mode'              => 'preview',
          //      'align'             => '',
          //      'keywords'		=> [ '', 'wd', 'acf', 'CLIENT-NAME' ],
          //      'post_type'         => [ 'post', 'page' ],
          //      'render_callback'	=> 'wd_acf_block_render_callback',
          //      'enqueue_script'    => plugin_dir_url(__FILE__) . '/acf-blocks/js/block-acf-NAME.js',
          //      'enqueue_style'     => get_stylesheet_directory_uri() . '/assets/scss/partials/blocks/acf-css-output/blocks-NAME.css',
          //      'supports'          => [
          //           'align' => false, // disable alignment toolbar, defaults to true
          //           // 'align' => [ 'left', 'right', 'full' ] // customize which are available
          //           'align_text' => true, // defaults to false
          //           'align_content' => true, // defaults to false ('matrix' to use align_content matrix)
          //           'anchor' => true, // defaults to false
          //           'multiple' => false, // allows multiple instances of block, defaults to true
          //           'jsx' => true // defaults to false, used for innerBlocks
          //      ]
          // ));

          acf_register_block_type(array(
               'name'			=> 'acf-separator',
               'title'			=> __( 'Separator Block' ),
               'description'		=> __( 'A block to replace the standard block editor separator block.' ),
               'category'		=> 'wd-blocks',
               'icon'			=> [
                    'background' => '#fff',
                    'foreground' => '#b5267b',
                    'src'        => 'minus'
               ],
               'mode'              => 'preview',
               'keywords'		=> [ 'separator', 'hr', 'divider', 'wd', 'acf' ],
               'post_type'         => [ 'post', 'page' ],
               'render_callback'	=> 'wd_acf_block_render_callback',
               'supports'          => [
                    'align' => [ 'full', 'wide' ],
               ]
          ));

          acf_register_block_type(array(
               'name'			=> 'acf-max-width-block',
               'title'			=> __( 'Max-Width Block' ),
               'description'		=> __( 'A block to wrap any content in a max-width container with alignment options.' ),
               'category'		=> 'wd-blocks',
               'icon'			=> [
                    'background' => '#fff',
                    'foreground' => '#b5267b',
                    'src'        => 'editor-expand'
               ],
               'mode'              => 'preview',
               'keywords'		=> [ 'max-width', 'wd', 'acf' ],
               'post_type'         => [ 'post', 'page' ],
               'render_callback'	=> 'wd_acf_block_render_callback',
               'supports'          => [
                    'align'      => false,
                    'align_text' => true,
                    'jsx'        => true
               ]
          ));

          acf_register_block_type(array(
               'name'			=> 'acf-hero',
               'title'			=> __( 'Hero Block' ),
               'description'		=> __( 'A hero block.' ),
               'category'		=> 'wd-blocks',
               'icon'			=> [
                    'background' => '#fff',
                    'foreground' => '#b5267b',
                    'src'        => 'star-filled'
               ],
               'mode'              => 'preview',
               'align'             => 'full',
               'keywords'		=> [ 'hero', 'wd', 'acf' ],
               'post_type'         => [ 'post', 'page' ],
               'render_callback'	=> 'wd_acf_block_render_callback',
               'supports'          => [
                    'align'         => [ 'wide', 'full' ],
                    'align_content' => 'matrix',
                    'jsx'           => true // defaults to false, used for innerBlocks
               ]
          ));

 	}
}

// callback to render proper template
function wd_acf_block_render_callback( $block ) {

	// convert name into path friendly slug
	$slug = str_replace('acf/', '', $block['name']);

     // include a template part from within the "blocks/templates" folder
	if( file_exists( dirname(__FILE__) . "/acf-blocks/templates/block-{$slug}.php") ) {
		include( dirname(__FILE__) . "/acf-blocks/templates/block-{$slug}.php" );
	}
}


/**
 *
 * add custom block category for ACF blocks
 *
 * @link https://developer.wordpress.org/block-editor/developers/filters/block-filters/#managing-block-categories
 *
 */
function wd_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'wd-blocks',
				'title' => __( 'Whiteley Designs Blocks', 'wd-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'wd_block_category', 10, 2);
