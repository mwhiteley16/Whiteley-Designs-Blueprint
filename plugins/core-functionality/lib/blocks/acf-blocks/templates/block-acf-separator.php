<?php
/**
 * Separator Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        3.0.0
 * @license      GPL-2.0+
**/

// ACF Variables
$wd_background_color = get_field( 'wd_background_color' );
$wd_block_separator_type = get_field( 'wd_block_separator_type' );
$wd_block_separator_width_choice = get_field( 'wd_block_separator_width_choice' );
$wd_block_separator_width = get_field( 'wd_block_separator_width' );
$wd_block_separator_height = get_field( 'wd_block_separator_height' );
$wd_block_separator_include_margin = get_field( 'wd_block_separator_include_margin' );
$wd_block_separator_alignment = get_field( 'wd_block_separator_alignment' );

// get block editor colors
$colors = get_theme_support( 'editor-color-palette' );
foreach( $colors[0] as $color ) {

     // loop over block editor colors and compare to color setting
     if( $wd_background_color == $color['slug'] ) {
          $border_color = $color['color'];  // set border color
     }
}

// Block ID
$block_id = 'acf-separator-' . $block['id'];

// Block Classes
$block_classes = 'acf-block acf-separator-block ' . $wd_block_separator_include_margin . ' ' . $wd_block_separator_alignment;

// get align class if present
if( ! empty( $block['align'] ) ) {
     $block_classes .= ' align' . $block['align'];
}

// get custom class name if present
if( ! empty( $block['className'] ) ) {
     $block_classes .= ' ' . $block['className'];
}

// set hr styles
$hr_styles = 'height: 1px;';
$hr_styles .= 'border-top-style:' . $wd_block_separator_type . ';';
$hr_styles .= 'border-width:' . $wd_block_separator_height . 'px;';
$hr_styles .= 'border-color:' . $border_color . ';';

if( $wd_block_separator_width_choice == 'user-defined' ) {
     $hr_styles .= 'width:' . $wd_block_separator_width . 'px;';
}

?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">
     <hr style="<?php echo esc_attr( $hr_styles ); ?>">
</div>
