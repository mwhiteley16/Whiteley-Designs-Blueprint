<?php
/**
 *  Header w/ Button Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        1.0.0
 * @license      GPL-2.0+
**/

// acf variables
$wd_hwb_block_mobile_button_hide = get_field( 'wd_hwb_block_mobile_button_hide' );

// block ID
$block_id = 'header-button-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) { // add anchor if present
     $id = $block['anchor'];
}

// block Classes
$block_classes = 'acf-block header-button-block ' . $wd_hwb_block_mobile_button_hide;

// optionally disable pointer events (prevent clicking links within block editor)
$disable_pointer_events = true;
if ( $disable_pointer_events == 1 && is_admin() ) {
     $block_classes .= ' disable-pointer-events';
}

if ( ! empty( $block['className'] ) ) { // custom class name
     $block_classes .= ' ' . $block['className'];
}

// THINGS FOR INNER BLOCKS
$inner_allowed_blocks = [
     'core/heading',
     'core/button'
];

// create the placeholder template
$inner_template = [
     [ 'core/heading',
          [
               'level'       => 2,
               'content'     => 'Heading Here'
          ]
     ],
     [ 'core/button',
          [
               'content' => 'Learn More'
          ]
     ]
];
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">

     <InnerBlocks allowedBlocks="<?php esc_attr( wp_json_encode( $inner_allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $inner_template ) ); ?>" templateLock="all" />

</div>
