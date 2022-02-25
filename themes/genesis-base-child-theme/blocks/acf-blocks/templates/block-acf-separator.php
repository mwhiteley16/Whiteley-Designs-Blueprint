<?php
/**
 * Separator Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// ACF Variables
$wd_block_separator_type = get_field( 'wd_block_separator_type' );
$wd_block_separator_width_choice = get_field( 'wd_block_separator_width_choice' );
$wd_block_separator_width = get_field( 'wd_block_separator_width' );
$wd_block_separator_height = get_field( 'wd_block_separator_height' );
$wd_block_separator_include_margin = get_field( 'wd_block_separator_include_margin' );
$wd_block_separator_alignment = get_field( 'wd_block_separator_alignment' );

// Block ID
$block_id = 'acf-separator-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) { // add anchor if present
     $block_id = $block['anchor'];
}

// Block Classes
$block_classes = 'acf-block acf-separator-block ' . $wd_block_separator_include_margin . ' ' . $wd_block_separator_alignment;

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

if ( ! empty( $block['backgroundColor'] ) ) {
     $wd_border_color = $block['backgroundColor'];
} else {
     $wd_border_color = 'primary';
}

// optionally disable pointer events (prevent clicking links within block editor)
$disable_pointer_events = true;
if ( $disable_pointer_events == 1 && is_admin() ) {
     $block_classes .= ' disable-pointer-events';
}

// get align class if present
if ( ! empty( $block['align'] ) ) {
     $block_classes .= ' align' . $block['align'];
}

// get custom class name if present
if ( ! empty( $block['className'] ) ) {
     $block_classes .= ' ' . $block['className'];
}

// set hr styles
$hr_styles = 'height: 1px;';
$hr_styles .= 'border-top-style:' . $wd_block_separator_type . ';';
$hr_styles .= 'border-width:' . $wd_block_separator_height . 'px;';
$hr_styles .= 'border-color: var(--wp--preset--color--' . $wd_border_color . ');';

if ( $wd_block_separator_width_choice == 'user-defined' ) {
     $hr_styles .= 'width:' . $wd_block_separator_width . 'px;';
}
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">
     <hr style="<?php echo esc_attr( $hr_styles ); ?>">
</div>
