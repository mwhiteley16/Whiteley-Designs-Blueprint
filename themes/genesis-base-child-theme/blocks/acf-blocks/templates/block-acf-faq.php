<?php
/**
 * FAQ Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// block ID
$block_id = 'faq-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) { // add anchor if present
     $id = $block['anchor'];
}

// block Classes
$block_classes = 'acf-block faq-block';

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
$disable_pointer_events = true;
if ( $disable_pointer_events == 1 && is_admin() ) {
     $block_classes .= ' disable-pointer-events';
}

if ( ! empty( $block['className'] ) ) {
     $block_classes .= ' ' . $block['className'];
}
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">

     <?php if ( have_rows( 'wd_block_faq' ) ) : ?>
          <?php $faq_count = 0; ?>
		<?php while ( have_rows( 'wd_block_faq' ) ) : the_row(); $faq_count++; ?>
               <div class="faq-block__toggle">
                    <button class="faq-block__toggle-question">
                         <?php the_sub_field( 'wd_faq_question' ); ?>
                         <div class="faq-block__toggle-question-icons">
                              <i class="fas fa-plus"></i>
                              <i class="fas fa-minus"></i>
                         </div>
                    </button>
                    <div class="faq-block__toggle-answer">
                         <?php the_sub_field( 'wd_faq_answer' ); ?>
                    </div>
               </div>
		<?php endwhile; ?>
	<?php endif; ?>

</div>
