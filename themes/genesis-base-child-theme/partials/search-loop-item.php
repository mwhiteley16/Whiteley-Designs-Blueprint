<?php
/**
 * Search loop item partial
 *
 * @author       WhiteleyDesigns
 * @since        1.0.0
 * @license      GPL-2.0+
**/
?>

<div class="search-loop-item">

     <div class="search-loop-item__content">

          <h3 class="loop-item__title"><a href="<?php the_permalink(); ?>" tabindex="-1"><?php the_title(); ?></a></h3>
          <div class="loop-item__excerpt">
               <?php the_excerpt(); ?>
          </div>

     </div>

     <a class="readmore wd-button" href="<?php the_permalink(); ?>"><?php _e( 'Learn More', WD_CHILD_THEME_SLUG ); ?></a>

</div>
