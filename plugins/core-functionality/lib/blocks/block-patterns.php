<?php
// remove core block patterns
remove_theme_support( 'core-block-patterns' );

// add custom block pattern categories
function wd_register_block_categories() {
	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

		register_block_pattern_category(
			'whiteley-designs',
			array( 'label' => _x( 'Whiteley Designs', 'Block pattern category', 'whiteley-designs' ) )
		);

	}
}
add_action( 'init', 'wd_register_block_categories' );

/*
 * Add custom block patterns
 *
 * Block Pattern API - https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
 * Rich Tabor Tutorial - https://richtabor.com/build-block-patterns/
 * Escape HTML Tool - https://codebeautify.org/json-escape-unescape
 *
 */
function wd_register_block_patterns() {

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

		register_block_pattern(
			'wd/three-column-learn-more',
			[
				'title'       => __( 'Three Column w/ Learn More', 'whiteley-designs' ),
				'description' => _x( 'A three column layout with a header, description and Learn More button.', 'Block pattern description', 'whiteley-designs' ),
				'content'     => "",
				'categories'  => [ 'columns', 'whiteley-designs' ],
                    'keywords'    => [ 'pattern', 'block pattern', 'whiteley designs' ]
			]
		);

	}

}
add_action( 'init', 'wd_register_block_patterns' );
