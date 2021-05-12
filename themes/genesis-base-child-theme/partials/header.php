<?php
/**
 * Header partial
 *
 * @author       WhiteleyDesigns
 * @since        1.0.0
 * @license      GPL-2.0+
**/
?>

<?php if ( function_exists( 'the_custom_logo' ) ) : ?>

     <div class="site-header__logo">
          <?php the_custom_logo(); ?>
     </div>

<?php endif; ?>

<div class="mobile-navigation-icon">
     <span></span>
     <span></span>
     <span></span>
</div>
