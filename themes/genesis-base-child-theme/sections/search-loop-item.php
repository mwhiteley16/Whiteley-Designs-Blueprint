<div class="search-loop-item">

     <div class="search-loop-item__content">
          <h4 class="loop-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
          <div class="loop-item__excerpt">
               <?php the_excerpt(); ?>
          </div>
     </div>

     <a class="readmore wd-button" href="<?php the_permalink(); ?>">Learn More</a>

</div>
