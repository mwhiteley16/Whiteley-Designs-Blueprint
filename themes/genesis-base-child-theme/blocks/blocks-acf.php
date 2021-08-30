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

          // set block icon variable (defaults to Whiteley Designs icon)
          $block_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.5 22.5"><defs><style>.a{fill:#222;}.b{fill:#1fa8af;}</style></defs><path class="a" d="M20.17,4a10.17,10.17,0,0,0-7-3.5L11.91.38h-.18a.64.64,0,0,0-.47.13A.68.68,0,0,0,11,.93L10.6,3.79a.48.48,0,0,0,.12.43.54.54,0,0,0,.44.18h.11l1.44.17c3.94.45,6.12,2.69,5.84,6a8.37,8.37,0,0,1-2.49,5.12A8.14,8.14,0,0,1,10,18.06l-.65,0H9.15a.8.8,0,0,0-.5.17.68.68,0,0,0-.25.44L8,21.5a.49.49,0,0,0,.12.42.57.57,0,0,0,.45.18h.17l1,0h.34a11.61,11.61,0,0,0,8.21-3.39,12.76,12.76,0,0,0,3.77-7.92A9.49,9.49,0,0,0,20.17,4Z"/><path class="b" d="M9.2,17h.15L10,17a7.61,7.61,0,0,0,3.64-.77L15,6.15a8.65,8.65,0,0,0-2.33-.57l-1-.12-1,7.35L9.23,7c-.11-.45-.33-.67-.65-.67H7.16c-.29,0-.5.22-.65.67L5.1,12.81,3.82,3a.55.55,0,0,0-.61-.55H.78a.36.36,0,0,0-.29.16A.6.6,0,0,0,.37,3a.5.5,0,0,0,0,.18L2.53,19.22a1.07,1.07,0,0,0,.23.6.64.64,0,0,0,.53.23H5.16c.37,0,.61-.21.73-.65l2-7.19Z"/></svg>';

          // acf_register_block_type(
          //      [
          //           'name'			=> '',
          //           'title'			=> __( '', WD_CHILD_THEME_NAME ),
          //           'description'		=> __( '', WD_CHILD_THEME_NAME ),
          //           'category'		=> 'wd-blocks',
          //           'mode'              => 'preview',
          //           'align'             => '',
          //           'render_template'   => 'blocks/acf-blocks/templates/block-acf-NAME.php',
          //           'icon'			   => $block_icon,          
          //           'enqueue_assets'  => function() {
          //                  wp_enqueue_script(
          //                       'flickity',
          //                       get_stylesheet_directory_uri() . '/assets/js/src/flickity.pkgd.min.js',
          //                       [], null
          //                  );
          //                  wp_enqueue_script(
          //                       'acf-custom-block',
          //                       get_stylesheet_directory_uri() . '/blocks/acf-blocks/js/block.js',
          //                       [ 'jquery' ],
          //                       '',
          //                       true
          //                  );
          //           },
          //           'keywords' => [
          //                '',
          //                'wd',
          //                'acf',
          //                WD_CHILD_THEME_SLUG
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
          //                'customClassName' => true, // defaults to false
          //                'multiple' => false, // allows multiple instances of block, defaults to true
          //                'jsx' => true // defaults to false, used for innerBlocks
          //           ]
          //      ]
          // );

          acf_register_block_type(
               [
                    'name'			=> 'acf-cover-with-white-box',
                    'title'			=> __( 'Cover w/ White Box Block', WD_CHILD_THEME_NAME ),
                    'description'		=> __( 'A image cover block with a white content box.', WD_CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'render_template'   => 'blocks/acf-blocks/templates/block-acf-cover-with-white-box.php',
                    'mode'              => 'preview',
                    'align'             => 'full',
                    'icon'              => $block_icon,
                    'keywords' => [
                         'cover with white box',
                         'wd',
                         'acf',
                         WD_CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align'           => [ 'full' ],
                         'anchor'          => false,
                         'customClassName' => true,
                         'jsx'             => true
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-header-with-button',
                    'title'			=> __( 'Header with Button Block', WD_CHILD_THEME_NAME ),
                    'description'		=> __( 'A block for a heading w/ a button on the right side.', WD_CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'render_template'   => 'blocks/acf-blocks/templates/block-acf-header-with-button.php',
                    'mode'              => 'preview',
                    'icon'              => $block_icon,
                    'keywords' => [
                         'heading',
                         'heading button',
                         'wd',
                         'acf',
                         WD_CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align'           => false,
                         'anchor'          => false,
                         'customClassName' => true,
                         'jsx'             => true
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-hero',
                    'title'			=> __( 'Hero Block', WD_CHILD_THEME_NAME ),
                    'description'		=> __( 'A hero block.' , WD_CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'mode'              => 'preview',
                    'align'             => 'full',
                    'render_template'   => 'blocks/acf-blocks/templates/block-acf-hero.php',
                    'icon'              => $block_icon,
                    'keywords' => [
                         'hero',
                         'wd',
                         'acf',
                         WD_CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align'           => [ 'wide', 'full' ],
                         'align_content'   => 'matrix',
                         'anchor'          => false,
                         'customClassName' => true,
                         'jsx'             => true
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-highlight-split',
                    'title'			=> __( 'Highlight Split Block', WD_CHILD_THEME_NAME ),
                    'description'		=> __( 'A block to media content split with block editor content with a color background.', WD_CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'mode'              => 'preview',
                    'render_template'   => 'blocks/acf-blocks/templates/block-acf-highlight-split.php',
                    'icon'              => $block_icon,
                    'keywords' => [
                         'video',
                         'highlight',
                         'split image',
                         'wd',
                         'acf',
                         WD_CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align'           => false,
                         'anchor'          => false,
                         'customClassName' => true,
                         'jsx'             => true,
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-max-width-block',
                    'title'			=> __( 'Max-Width Block', WD_CHILD_THEME_NAME ),
                    'description'		=> __( 'A block to wrap any content in a max-width container with alignment options.', WD_CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'mode'              => 'preview',
                    'render_template'   => 'blocks/acf-blocks/templates/block-acf-max-width-block.php',
                    'icon'              => $block_icon,
                    'keywords' => [
                         'max-width',
                         'wd',
                         'acf',
                         WD_CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align'           => false,
                         'align_text'      => true,
                         'anchor'          => false,
                         'customClassName' => true,
                         'jsx'             => true
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-recent-posts',
                    'title'			=> __( 'Recent Posts Block', WD_CHILD_THEME_NAME ),
                    'description'		=> __( 'A block to recent posts.', WD_CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'render_template'   => 'blocks/acf-blocks/templates/block-acf-recent-posts.php',
                    'mode'              => 'preview',
                    'icon'              => $block_icon,
                    'keywords' => [
                         'post',
                         'recent posts',
                         'wd',
                         'acf',
                         WD_CHILD_THEME_SLUG
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
                    'title'			=> __( 'Separator Block', WD_CHILD_THEME_NAME ),
                    'description'		=> __( 'A block to replace the standard block editor separator block.', WD_CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'mode'              => 'preview',
                    'render_template'   => 'blocks/acf-blocks/templates/block-acf-separator.php',
                    'icon'              => $block_icon,
                    'keywords' => [
                         'separator',
                         'hr',
                         'divider',
                         'wd',
                         'acf',
                         WD_CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align'           => [ 'full', 'wide' ],
                         'anchor'          => false,
                         'customClassName' => true,
                    ]
               ]
          );

          acf_register_block_type(
               [
                    'name'			=> 'acf-team',
                    'title'			=> __( 'Team Block', WD_CHILD_THEME_NAME ),
                    'description'		=> __( 'A block to showcase team members block.', WD_CHILD_THEME_NAME ),
                    'category'		=> 'wd-blocks',
                    'mode'              => 'preview',
                    'render_template'   => 'blocks/acf-blocks/templates/block-acf-team.php',
                    'icon'              => $block_icon,
                    'keywords' => [
                         'team',
                         'wd',
                         'acf',
                         WD_CHILD_THEME_SLUG
                    ],
                    'post_type' => [
                         'post',
                         'page'
                    ],
                    'supports' => [
                         'align'           => [ 'wide' ],
                         'anchor'          => false,
                         'customClassName' => true,
                    ]
               ]
          );

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
				'title' => __( 'Whiteley Designs Blocks', WD_CHILD_THEME_NAME ),
			],
		]
	);

}
add_filter( 'block_categories_all', 'wd_block_category', 10, 2);
