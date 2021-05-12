<div class="loop-item">

     <?php
     $post_date = get_the_date( 'F j, Y' );
     $categories = get_the_category();
     $author_id = get_the_author_meta( 'ID' );
     $author_display_name = get_the_author_meta( 'display_name' );
     $author_posts = get_author_posts_url( $author_id );
     ?>

     <?php if( has_post_thumbnail() ) : ?>
          <div class="loop-item__thumbnail">
               <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
          </div>
     <?php endif; ?>

     <?php if( $categories ) : ?>
          <div class="loop-item__categories">

               <?php foreach( $categories as $cat ) : ?>
                    <a href="<?php echo get_home_url(); ?>/<?php echo $cat->taxonomy; ?>/<?php echo $cat->category_nicename; ?>"><?php echo $cat->cat_name; ?></a>
               <?php endforeach; ?>

          </div>
     <?php endif; ?>

     <div class="loop-item__content">

          <h4 class="loop-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

          <span class="loop-item__byline">By <a href="<?php echo $author_posts; ?>"><?php echo $author_display_name; ?></a> on <?php echo $post_date; ?></span>

          <div class="loop-item__excerpt">
               <?php the_excerpt(); ?>
          </div>

          <div class="loop-item__readmore">
               <a href="<?php the_permalink(); ?>">Continue Reading</a>
          </div>

     </div>

</div>
