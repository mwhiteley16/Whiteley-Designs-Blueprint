<?php
// Remove page title from 'category' page
//remove_action( 'genesis_archive_title_descriptions', 'genesis_do_archive_headings_headline', 10, 3 );

// add custom entry header
//add_action( 'genesis_after_header', 'wd_category_archive_custom_entry_header' );
function wd_category_archive_custom_entry_header() { ?>

     <?php
     global $wp_query;
     $query_object = $wp_query->get_queried_object();
     $page_header = $query_object->name;
     ?>

     <header class="wd-entry-header">
          <div class="wrap">
               <h1 class="entry-title">Category: <?php echo $page_header; ?></h1>
               <?php do_action( 'wd_do_breadcrumbs' ); ?>
          </div>
     </header>

<?php }

// use custom loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'wd_custom_loop' );

genesis();
