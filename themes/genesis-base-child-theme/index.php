<?php
// Remove page title from 'posts' page
//remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );

// add custom entry header
//add_action( 'genesis_after_header', 'wd_blog_archive_custom_entry_header' );
function wd_blog_archive_custom_entry_header() { ?>

     <header class="wd-entry-header">
          <div class="wrap">
               <h1 class="entry-title">Blog</h1>
               <?php do_action( 'wd_do_breadcrumbs' ); ?>
          </div>
     </header>

<?php }

// use custom loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'wd_custom_loop' );

genesis();
