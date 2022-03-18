<?php
/**
 * Slideshow Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// block ID
$block_id = 'slideshow-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) { // add anchor if present
     $block_id = $block['anchor'];
}

// block Classes
$block_classes = 'acf-block slideshow-block';

// if using animations
if ( ! empty( $block['animationType'] ) ) {
     $block_classes .= ' ' . $block['animationType'];

     if ( ! empty( $block['animationDuration'] ) ) {
          $block_classes .= ' ' . $block['animationDuration'];
     }

     if ( ! empty( $block['animationDelay'] ) ) {
          $block_classes .= ' ' . $block['animationDelay'];
     }
}

// get align class if present
if ( ! empty( $block['align'] ) ) {
     $block_classes .= ' align' . $block['align'];
}

// optionally disable pointer events (prevent clicking links within block editor)
$disable_pointer_events = false;
if ( $disable_pointer_events == 1 && is_admin() ) {
     $block_classes .= ' disable-pointer-events';
}

if ( ! empty( $block['className'] ) ) {
     $block_classes .= ' ' . $block['className'];
}
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">

     <?php if ( have_rows( 'wd_block_slideshow_slides' ) ) : ?>
          <div class="slideshow-block__slides">

               <?php while ( have_rows( 'wd_block_slideshow_slides' ) ) : the_row(); ?>

                    <?php
                    $wd_image = get_sub_field( 'wd_image' );
                    ?>

                    <div class="slideshow-block__slide">
                         <img src="<?php echo esc_url( $wd_image['url'] ); ?>" data-flickity-lazyload="<?php echo esc_url( $wd_image['url'] ); ?>" alt="<?php echo esc_attr( $wd_image['alt'] ); ?>" width="<?php echo esc_attr( $wd_image['width'] ); ?>" height="<?php echo esc_attr( $wd_image['height'] ); ?>"/>
                    </div>

               <?php endwhile; ?>

          </div>
     <?php endif; ?>

</div>
