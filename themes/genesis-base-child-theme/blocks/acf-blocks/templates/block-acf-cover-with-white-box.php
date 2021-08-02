
<?php
/**
 * Cover w/ White Box Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        3.0.0
 * @license      GPL-2.0+
**/

// ACF Variable custom meta
$wd_cwb_block_image = get_field( 'wd_cwb_block_image' );
$wd_cwb_block_content_vertical_alignment = get_field( 'wd_cwb_block_content_vertical_alignment' );
$wd_cwb_block_content_horizontal_alignment = get_field( 'wd_cwb_block_content_horizontal_alignment' );

// Block ID
$block_id = 'cwb-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) { // add anchor if present
     $id = $block['anchor'];
}

// Block Classes
$block_classes = 'acf-block cwb-block';
$block_classes .= ' content-vertical-' . $wd_cwb_block_content_vertical_alignment;
$block_classes .= ' content-horizontal-' . $wd_cwb_block_content_horizontal_alignment;

// optionally disable pointer events (prevent clicking links within block editor)
$disable_pointer_events = true;
if ( $disable_pointer_events == 1 && is_admin() ) {
     $block_classes .= ' disable-pointer-events';
}

// for top-aligned ekg swap vertical classes to account for rotation
if ( $wd_cwb_block_ekg_vertical_alignment == 'top-align' ) {

     if ( $wd_cwb_block_ekg_horizontal_alignment == 'left' ) {
          $wd_cwb_block_ekg_horizontal_alignment = 'right';
     } elseif ( $wd_cwb_block_ekg_horizontal_alignment == 'right' ) {
          $wd_cwb_block_ekg_horizontal_alignment = 'left';
     }
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
               'level'       => 3,
               'placeholder' => 'Hero block leader',
          ]
     ],
     [ 'core/spacer',
          [
               'height' => 12
          ]
     ],
     [ 'acf/acf-separator',
          [ 'data' =>
               [
                    'wd_background_color'               => 'primay-color',
                    'wd_block_separator_type'           => 'solid',
                    'wd_block_separator_width_choice'   => 'user-defined',
                    'wd_block_separator_alignment'      => 'left-align',
                    'wd_block_separator_width'          => '57',
                    'wd_block_separator_height'         => '1',
                    'wd_block_separator_include_margin' => 'no-margin'
               ]
          ]
     ],
     [ 'core/spacer',
          [
               'height' => 32
          ]
     ],
     [ 'core/paragraph',
          [
               'placeholder' => 'Hero block descriptive text goes here. This uses innerBlocks so we can use whatever here.',
               'fontSize'    => 'large',
          ]
     ],
     [ 'core/spacer',
          [
               'height' => 12
          ]
     ],
     [ 'core/buttons',
          [
               'align'       => 'left',
               'placeholder' => 'Button Text'
          ]
     ],
];

?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>" style="background-image:url('<?php echo esc_url( $wd_cwb_block_image['url'] ); ?>">

     <div class="cwb-block__img">
          <img src="<?php echo esc_url( $wd_cwb_block_image['url'] ); ?>" alt="<?php echo esc_url( $wd_cwb_block_image['alt'] ); ?>">
     </div>

     <div class="cwb-block__wrap">

          <div class="cwb-block__content">
               <InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
          </div>

     </div>

</div>
