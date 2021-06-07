<?php
/**
 * Header partial
 *
 * @author       WhiteleyDesigns
 * @since        1.0.0
 * @license      GPL-2.0+
**/
?>

<?php // get custom logo
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>

<?php if ( function_exists( 'the_custom_logo' ) ) : ?>
     <div class="site-header__logo">
          <a class="custom-logo-link" href="<?php echo get_home_url(); ?>">
               <img class="custom-logo" src="<?php echo esc_url( $logo[0] ); ?>" alt="" height="" width="">
          </a>
     </div>
<?php endif; ?>

<div class="mobile-navigation-icon">
     <span></span>
     <span></span>
     <span></span>
</div>
