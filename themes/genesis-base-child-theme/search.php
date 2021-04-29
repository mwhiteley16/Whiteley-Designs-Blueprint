<?php
// show search term as header
add_action( 'genesis_before_loop', 'genesis_do_search_title' );
function genesis_do_search_title() {

	$title = sprintf( '<div class="archive-description"><h1 class="archive-title">%s %s</h1></div>', apply_filters( 'genesis_search_title_text', __( 'Search Results for:', 'genesis' ) ), get_search_query() );

	echo apply_filters( 'genesis_search_title_output', $title ) . "\n";

}

// add result count
add_action( 'genesis_before_loop', 'wd_search_results_count' );
function wd_search_results_count() {
     global $wp_query;
     echo '<div class="search-results-found">';
          echo $wp_query->found_posts.' results found';
     echo '</div>';
}

// use custom loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'wd_custom_loop' );

genesis();
