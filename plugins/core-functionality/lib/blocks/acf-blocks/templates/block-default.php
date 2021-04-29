<?php
/**
 *  NAME Block
 *
 * @package      ClientName
 * @author       Matt Whiteley
 * @since        3.0.0
 * @license      GPL-2.0+
**/

// ACF custom fields


// block ID
$block_id = 'NAME-' . $block['id'];

// block Classes
$block_classes = 'acf-block NAME-block';

if( ! empty( $block['align'] ) ) { // block alignment (left, center, right, wide, full)
     $block_classes .= ' align' . $block['align'];
}

if( ! empty( $block['align_text'] ) ) { // text alignment (left, center, right)
     $block_classes .= ' has-text-align-' . $block['align_text'];
}

// get content align (standard)
if( ! empty( $block['align_content'] ) ) { // content alignment (top, center, bottom)
     $block_classes .= ' is-vertically-aligned-' . $block['align_content'];
}

// get content align (matrix)
if( ! empty( $block['align_content'] ) ) {
     $block_content_align = preg_replace('#[ -]+#', '-', $block['align_content']);
     $block_classes .= ' is-position-' . $block_content_align;
}

if( ! empty( $block['className'] ) ) { // custom class name
     $block_classes .= ' ' . $block['className'];
}

// THINGS FOR INNER BLOCKS
$inner_allowed_blocks = [
     'core/heading',
     'core/paragraph',
     'core/button',
     'core/group',
     'core/separator'
];

// create the placeholder template
$inner_template = [
     [ 'core/heading',
          [
               'level'       => 2,
               'placeholder' => 'Hero Block Title Here',
               // 'content'     => 'Pre-defined header here.'
          ]
     ],
     [ 'core/paragraph',
          [
               'placeholder' => 'Placeholder text here.',
               // 'content'     => 'Pre-defined content here.'
          ]
     ],
     [ 'core/button',
          [
               'align'       => 'left',
               'placeholder' => 'Button Text'
          ]
     ],
     [ 'core/group',
          [ // group block attributes
               'className' => ''
          ],
          [ // blocks within groups block
               [ 'core/separator',
                    [ 'color' => 'grey-medium' ]
               ],
               [ 'core/heading',
                    [
                         'placeholder' => '',
                         'level' => '3',
                         'className' => ''
                    ]
               ],
               [ 'core/paragraph',
                    [ 'placeholder' => 'Loren ipsum dolor...' ]
               ],
          ]
     ]
];

?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_classes ); ?>">

     <InnerBlocks allowedBlocks="<?php esc_attr( wp_json_encode( $inner_allowed_blocks ) ); ?>" template="<?php echo esc_attr( wp_json_encode( $inner_template ) ); ?>" templateLock="all/insert" />

</div>
