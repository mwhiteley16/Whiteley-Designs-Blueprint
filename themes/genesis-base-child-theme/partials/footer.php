<?php
/**
 * Footer partial
 *
 * @author       WhiteleyDesigns
 * @since        1.0.0
 * @license      GPL-2.0+
**/
?>

<?php
$wd_options_copyright_text = get_field( '$wd_options_copyright_text', 'option' );
?>

<?php if ( ! empty( $wd_options_copyright_text ) ) : ?>
     <div class="site-footer__copyright">
          <p>&copy; <?php echo date('Y'); ?> <?php echo $wd_options_copyright_text; ?></p>
     </div>
<?php endif; ?>

<?php if ( have_rows( 'wd_options_social_media_links', 'option' ) ) : ?>
     <div class="social-media">
     	<?php while ( have_rows( 'wd_options_social_media_links', 'option' ) ) : the_row(); ?>

               <a class="social-media__link" href="<?php the_sub_field( 'wd_link' ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php the_sub_field( 'wd_aria_label' ); ?>">
                    <?php the_sub_field( 'wd_icon' ); ?>
               </a>

     	<?php endwhile; ?>
     </div>
<?php endif; ?>
