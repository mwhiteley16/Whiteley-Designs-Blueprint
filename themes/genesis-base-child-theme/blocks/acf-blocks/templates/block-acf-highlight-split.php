<?php
/**
 * Highlight Split Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        3.0.0
 * @license      GPL-2.0+
**/

// ACF custom fields
$wd_hs_block_media_layout = get_field( 'wd_hs_block_media_layout' );
$wd_hs_block_image = get_field( 'wd_hs_block_image' );
$wd_hs_block_include_image_shadow = get_field( 'wd_hs_block_include_image_shadow' );
$wd_background_color = get_field( 'wd_background_color' );

// block ID
$block_id = 'highlight-split-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) { // add anchor if present
     $id = $block['anchor'];
}

// block Classes
$block_classes = 'acf-block highlight-split ' . $wd_hs_block_media_layout;

// optionally disable pointer events (prevent clicking links within block editor)
$disable_pointer_events = true;
if ( $disable_pointer_events == 1 && is_admin() ) {
     $block_classes .= ' disable-pointer-events';
}

if ( ! empty( $block['className'] ) ) {
     $block_classes .= ' ' . $block['className'];
}

// create the placeholder template
$template = [
     [ 'core/heading',
          [
               'level'       => 3,
               'placeholder' => 'Block Title Here',
          ]
     ],
     [ 'acf/acf-separator',
          [ 'data' =>
               [
                    'wd_background_color' => 'primary-color',
                    'wd_block_separator_type' => 'solid',
                    'wd_block_separator_width_choice' => 'user-defined',
                    'wd_block_separator_alignment' => 'left-align',
                    'wd_block_separator_width' => '57',
                    'wd_block_separator_height' => '1',
                    'wd_block_separator_include_margin' => 'no-margin'
               ]
          ]
     ],
     [ 'core/spacer',
          [
               'height' => 24
          ]
     ],
     [ 'core/paragraph',
          [
               'placeholder' => 'Hero block descriptive text goes here. This uses innerBlocks so we can use whatever here.',
          ]
     ],
     [ 'core/buttons',
          [
               'align'       => 'left',
               'placeholder' => 'Book a Demo',
          ]
     ],
];
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">

     <div class="highlight-split__highlight has-<?php echo $wd_background_color; ?>-background-color"></div>

     <div class="highlight-split__inner">

          <div class="highlight-split__media">
               <img class="<?php echo $wd_hs_block_include_image_shadow; ?>" src="<?php echo $wd_hs_block_image['url']; ?>" alt="<?php echo $wd_hs_block_image['alt']; ?>">
          </div>

          <div class="highlight-split__content">
               <InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
          </div>

     </div>


</div>
