<?php
/**
 *  Max-Width Block
 *
 * @package      CLIENTNAME
 * @author       Matt Whiteley
 * @since        3.0.0
 * @license      GPL-2.0+
**/

// ACF custom fields
$wd_maximum_width = get_field( 'wd_maximum_width' );

// block ID
$block_id = 'max-width-' . $block['id'];

// block Classes
$block_classes = 'acf-block max-width-block';

if( ! empty( $block['align_text'] ) ) {
     $block_classes .= ' has-text-align-' . $block['align_text'];
}

if( ! empty( $block['className'] ) ) {
     $block_classes .= ' ' . $block['className'];
}

?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">
     <div class="max-width-block__interior" style="max-width:<?php echo $wd_maximum_width; ?>px;">
          <InnerBlocks />
     </div>
</div>
