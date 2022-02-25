<?php
/**
 * Hero Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// ACF Variable custom meta
$wd_block_hero_image = get_field( 'wd_block_hero_image' );
$wd_block_hero_image_overlay = get_field( 'wd_block_hero_image_overlay' );
$wd_block_hero_image_position = get_field( 'wd_block_hero_image_position' );

// Block ID
$block_id = 'hero-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) { // add anchor if present
     $block_id = $block['anchor'];
}

// Block Classes
$block_classes = 'acf-block hero-block';

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

// create the placeholder template
$template = [
     [ 'core/heading',
          [
               'level'       => 2,
               'textColor'   => 'white',
               'placeholder' => 'Hero Block Title Here',
          ]
     ],
     [ 'core/paragraph',
          [
               'textColor'   => 'white',
               'placeholder' => 'Hero block descriptive text goes here. This uses innerBlocks so we can use whatever here.',
          ]
     ],
     [ 'core/buttons',
          [
               'contentJustification' => 'left',
          ],
          [
               [ 'core/button',
                    [
                         'placeholder' => 'Button Text',
                    ]
               ]
          ]
     ]
];
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">

     <div class="hero-block__image">
          <img class="image-<?php echo $wd_block_hero_image_position; ?>" src="<?php echo esc_url( $wd_block_hero_image['url'] ); ?>" alt="<?php echo esc_url( $wd_block_hero_image['alt'] ); ?>" width="<?php echo esc_url( $wd_block_hero_image['width'] ); ?>" height="<?php echo esc_url( $wd_block_hero_image['height'] ); ?>">
     </div>

     <?php
     if ( $wd_block_hero_image_overlay == 'yes-overlay' ) {
          $wd_block_hero_overlay_opacity = get_field( 'wd_block_hero_overlay_opacity' );
          echo '<div class="hero-block__overlay" style="opacity:0.' . $wd_block_hero_overlay_opacity . '"></div>';
     }
     ?>

     <div class="wrap">

          <div class="hero-block__content">
               <InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
          </div>

     </div>

</div>
