<?php
/**
* Remove core block patterns
* note: make sure at least one pattern category is registered if this support is removed or block editor will crash
*
*/
remove_theme_support( 'core-block-patterns' );


/**
* Add custom block pattern categories
*/
function wd_register_block_categories() {

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

		register_block_pattern_category(
			'whiteley-designs',
			[
                    'label' => _x( 'Whiteley Designs', 'Block pattern category', WD_CHILD_THEME_NAME ),
               ]
		);

	}

}
add_action( 'init', 'wd_register_block_categories' );


/*
* Add custom block patterns
*
* Block Pattern API - https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
* Rich Tabor Tutorial - https://richtabor.com/build-block-patterns/
* Escape HTML Tool - https://jsonformatter.org/json-escape
*
*/
function wd_register_block_patterns() {

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

          // block patterns markeup, must have double quotes around it
          $content = "";

		register_block_pattern(
			'wd/block-pattern-name',
			[
				'title'       => __( 'Block Patterns Title', WD_CHILD_THEME_NAME ),
				'description' => _x( 'Block pattern descriptive text.', 'Block pattern description', WD_CHILD_THEME_NAME ),
				'content'     => trim( $content ),
				'categories'  => [
                         'whiteley-designs',
                         WD_CHILD_THEME_NAME,
                    ],
                    'keywords' => [
                         'keyword',
                         WD_CHILD_THEME_NAME,
                    ],
			]
		);

	}

}
add_action( 'init', 'wd_register_block_patterns' );
