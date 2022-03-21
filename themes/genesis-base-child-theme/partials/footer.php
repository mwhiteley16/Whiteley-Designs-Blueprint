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
$wd_options_copyright_text = get_field( 'wd_options_copyright_text', 'option' );
?>

<?php if ( ! empty( $wd_options_copyright_text ) ) : ?>
     <div class="site-footer__copyright">
          <p>&copy; <?php echo date('Y'); ?> <?php echo $wd_options_copyright_text; ?></p>
     </div>
<?php endif; ?>

<?php // social media
if ( function_exists( 'wd_social_media' ) ) {
     wd_social_media( '24px', 'social-media__footer' );
}
?>
