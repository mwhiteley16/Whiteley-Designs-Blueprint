<?php
/**
 * Hero Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        3.0.0
 * @license      GPL-2.0+
**/

// ACF Variable custom meta
$wd_block_hero_image = get_field( 'wd_block_hero_image' );
$wd_block_hero_image_overlay = get_field( 'wd_block_hero_image_overlay' );
$wd_block_hero_content_alignment = get_field( 'wd_block_hero_content_alignment' );
$wd_block_background_type = get_field( 'wd_block_background_type' );
$wd_block_hero_image_position = get_field( 'wd_block_hero_image_position' );
$wd_block_hero_content_max_width = get_field( 'wd_block_hero_content_max_width' );

// Block ID
$block_id = 'hero-' . $block['id'];

// Block Classes
$block_classes = 'acf-block hero-block';
$block_classes .= ' image-' . $wd_block_hero_image_position;
$block_classes .= ' content-' . $wd_block_hero_content_alignment;

// get align class if present
if( ! empty( $block['align'] ) ) {
     $block_classes .= ' align' . $block['align'];
}

// get content align text class if present
if( ! empty( $block['align_content'] ) ) {
     $block_content_align = preg_replace('#[ -]+#', '-', $block['align_content']);
}

// get custom class name if present
if( ! empty( $block['className'] ) ) {
     $block_classes .= ' ' . $block['className'];
}

// set proper classes of content container
$content_class = 'hero-block__content';
$content_class .= ' hero-block__content--' . $wd_block_background_type;
if( $wd_block_background_type == 'solid-color' ) {
     $wd_block_background_color = get_field( 'wd_background_color' ); // only get background color variable if it is needed
     $content_class .= ' has-' . $wd_block_background_color . '-background-color';
}

// create the placeholder template
$template = [
     [ 'core/heading',
          [
               'level' => 2,
               'placeholder' => 'Hero Block Title Here',
          ]
     ],
     [ 'core/paragraph',
          [
               'placeholder' => 'Hero block descriptive text goes here. This uses innerBlocks so we can use whatever here.',
          ]
     ],
     [ 'core/button',
          [
               'align'       => 'left',
               'placeholder' => 'Button Text'
          ]
     ],
];

?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>" style="background-image:url('<?php echo esc_url( $wd_block_hero_image['url'] ); ?>">

     <?php if( $wd_block_hero_image_overlay == 'yes-overlay' ) : ?>
          <?php $wd_block_hero_overlay_opacity = get_field( 'wd_block_hero_overlay_opacity' ); ?>
          <div class="hero-block__overlay" style="opacity:0.<?php echo $wd_block_hero_overlay_opacity; ?>;"></div>
     <?php endif; ?>

     <div class="wrap is-position-<?php echo $block_content_align; ?>">

          <div class="<?php echo esc_attr( $content_class ); ?>" style="max-width:<?php echo $wd_block_hero_content_max_width; ?>px;">
               <InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
          </div>

     </div>
</div>
