<?php
/**
* Register ACF Blocks
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

          // acf_register_block_type(
          //      [
          //           'name'			=> '',
          //           'title'			=> __( '', CHILD_THEME_NAME ),
          //           'description'		=> __( '', CHILD_THEME_NAME ),
          //           'category'		=> 'wd-blocks',
          //           'mode'              => 'preview',
          //           'align'             => '',
          //           'render_callback'	=> 'wd_acf_block_render_callback',
          //           'enqueue_script'    => plugin_dir_url(__FILE__) . '/acf-blocks/js/block-acf-NAME.js',
          //           'enqueue_style'     => get_stylesheet_directory_uri() . '/assets/scss/partials/blocks/acf-css-output/blocks-NAME.css',
          //           'icon'			=> [
          //                'background' => '#fff',
          //                'foreground' => BLOCK_ICON_COLOR,
          //                'src'        => 'star-filled'
          //           ],
          //           'keywords' => [
          //                '',
          //                'wd',
          //                'acf',
          //                CHILD_THEME_SLUG
          //           ],
          //           'post_type' => [
          //                'post',
          //                'page'
          //           ],
          //           'supports' => [
          //                'align' => false, // disable alignment toolbar, defaults to true
          //                // 'align' => [ 'left', 'right', 'full' ] // customize which are available
          //                'align_text' => true, // defaults to false
          //                'align_content' => true, // defaults to false ('matrix' to use align_content matrix)
          //                'anchor' => true, // defaults to false
          //                'multiple' => false, // allows multiple instances of block, defaults to true
          //                'jsx' => true // defaults to false, used for innerBlocks
          //           ]
          //      ]
          // );

          acf_register_block_type(
               [
                    'name'			=> 'acf-cover-with-white-box',
                    'title'			=> __( 'Cover w/ White Box Block', CHILD_THEME_NAME ),
                    'description'		=> __( 'A image cover block with a white content box.', CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'render_callback'	=> 'wd_acf_block_render_callback',
                    'mode'              => 'preview',
                    'align'             => 'full',
                    'icon'			=> [
                         'background' => '#fff',
                         'foreground' => BLOCK_ICON_COLOR,
                         'src'        => 'star-filled'
                    ],
                    'keywords' => [
                         'cover with white box',
                         'wd',
                         'acf',
                         CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align' => [ 'full' ],
                         'jsx'   => true
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-header-with-button',
                    'title'			=> __( 'Header with Button Block', CHILD_THEME_NAME ),
                    'description'		=> __( 'A block for a heading w/ a button on the right side.', CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'render_callback'	=> 'wd_acf_block_render_callback',
                    'mode'              => 'preview',
                    'icon'			=> [
                         'background' => '#fff',
                         'foreground' => BLOCK_ICON_COLOR,
                         'src'        => 'star-filled'
                    ],
                    'keywords' => [
                         'heading',
                         'heading button',
                         'wd',
                         'acf',
                         CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align' => false,
                         'jsx'   => true
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-hero',
                    'title'			=> __( 'Hero Block', CHILD_THEME_NAME ),
                    'description'		=> __( 'A hero block.' , CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'mode'              => 'preview',
                    'align'             => 'full',
                    'render_callback'	=> 'wd_acf_block_render_callback',
                    'icon'			=> [
                         'background' => '#fff',
                         'foreground' => BLOCK_ICON_COLOR,
                         'src'        => 'star-filled'
                    ],
                    'keywords' => [
                         'hero',
                         'wd',
                         'acf',
                         CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align'         => [ 'wide', 'full' ],
                         'align_content' => 'matrix',
                         'jsx'           => true
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-highlight-split',
                    'title'			=> __( 'Highlight Split Block', CHILD_THEME_NAME ),
                    'description'		=> __( 'A block to media content split with block editor content with a color background.', CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'mode'              => 'preview',
                    'render_callback'	=> 'wd_acf_block_render_callback',
                    'icon'			=> [
                         'background' => '#fff',
                         'foreground' => BLOCK_ICON_COLOR,
                         'src'        => 'star-filled'
                    ],
                    'keywords' => [
                         'video',
                         'highlight',
                         'split image',
                         'wd',
                         'acf',
                         CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align' => false,
                         'jsx'   => true,
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-max-width-block',
                    'title'			=> __( 'Max-Width Block', CHILD_THEME_NAME ),
                    'description'		=> __( 'A block to wrap any content in a max-width container with alignment options.', CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'mode'              => 'preview',
                    'render_callback'	=> 'wd_acf_block_render_callback',
                    'icon'			=> [
                         'background' => '#fff',
                         'foreground' => BLOCK_ICON_COLOR,
                         'src'        => 'star-filled'
                    ],
                    'keywords' => [
                         'max-width',
                         'wd',
                         'acf',
                         CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align'      => false,
                         'align_text' => true,
                         'jsx'        => true
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-recent-posts',
                    'title'			=> __( 'Recent Posts Block', CHILD_THEME_NAME ),
                    'description'		=> __( 'A block to recent posts.', CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'render_callback'	=> 'wd_acf_block_render_callback',
                    'mode'              => 'preview',
                    'icon'			=> [
                         'background' => '#fff',
                         'foreground' => BLOCK_ICON_COLOR,
                         'src'        => 'star-filled'
                    ],
                    'keywords' => [
                         'post',
                         'recent posts',
                         'wd',
                         'acf',
                         CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],

               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-separator',
                    'title'			=> __( 'Separator Block', CHILD_THEME_NAME ),
                    'description'		=> __( 'A block to replace the standard block editor separator block.', CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'mode'              => 'preview',
                    'render_callback'	=> 'wd_acf_block_render_callback',
                    'icon'			=> [
                         'background' => '#fff',
                         'foreground' => BLOCK_ICON_COLOR,
                         'src'        => 'star-filled'
                    ],
                    'keywords' => [
                         'separator',
                         'hr',
                         'divider',
                         'wd',
                         'acf',
                         CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align' => [ 'full', 'wide' ],
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-team',
                    'title'			=> __( 'Team Block', CHILD_THEME_NAME ),
                    'description'		=> __( 'A block to showcase team members block.', CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'mode'              => 'preview',
                    'render_callback'	=> 'wd_acf_block_render_callback',
                    'icon'			=> [
                         'background' => '#fff',
                         'foreground' => BLOCK_ICON_COLOR,
                         'src'        => 'star-filled'
                    ],

                    'keywords' => [
                         'team',
                         'wd',
                         'acf',
                         CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align' => [ 'wide' ],
                    ]
               ]
          );

 	}
}


/**
* Callback to render proper block template
*/
function wd_acf_block_render_callback( $block ) {

	// convert name into path friendly slug
	$slug = str_replace( 'acf/', '', $block['name'] );

     // include a template part from within the "blocks/templates" folder
	if( file_exists( dirname(__FILE__) . "/acf-blocks/templates/block-{$slug}.php") ) {
		include( dirname(__FILE__) . "/acf-blocks/templates/block-{$slug}.php" );
	}

}


/**
* add custom block category for ACF blocks
* @link https://developer.wordpress.org/block-editor/developers/filters/block-filters/#managing-block-categories
*/
function wd_block_category( $categories, $post ) {

	return array_merge(
		$categories,
		[
			[
				'slug' => 'wd-blocks',
				'title' => __( 'Whiteley Designs Blocks', CHILD_THEME_NAME ),
			],
		]
	);

}
add_filter( 'block_categories', 'wd_block_category', 10, 2);
