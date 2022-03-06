wp.domReady( () => {

     // ADD CUSTOM BLOCK STYLES

     // button styles
     wp.blocks.unregisterBlockStyle(
     	'core/button',
     	[
               'outline',
               'fill',
          ]
     );

     // column styles
     wp.blocks.registerBlockStyle(
          'core/columns',
          [
               {
                    name: 'default',
                    label: 'Default',
                    isDefault: true,
               },
               {
                    name: 'wide-break',
                    label: 'Wide Break',
               },
               {
                    name: 'no-col-gap',
                    label: 'No Column Gap',
               }
          ]
     );


     // heading styles
     wp.blocks.registerBlockStyle(
          'core/heading',
          [
               {
                    name: 'default',
                    label: 'Default',
                    isDefault: true,
               },
               {
                    name: 'no-bottom-margin',
                    label: 'No Bottom Margin',
               },
               {
                    name: 'half-bottom-margin',
                    label: 'Half Bottom Margin',
               }
          ]
     );


     // image styles
     wp.blocks.unregisterBlockStyle(
     	'core/image',
     	[ 'rounded' ]
     );

     wp.blocks.registerBlockStyle(
          'core/image',
          [
               {
                    name: 'no-bottom-margin',
                    label: 'No Bottom Margin',
               },
               {
                    name: 'half-bottom-margin',
                    label: 'Half Bottom Margin',
               },
               {
                    name: 'hide-mobile',
                    label: 'Hide Mobile',
               },
               {
                    name: 'hide-desktop',
                    label: 'Hide Desktop',
               }
          ]
     );


     // list styles
     wp.blocks.registerBlockStyle(
          'core/list',
          [
               {
                    name: 'default',
                    label: 'Default',
                    isDefault: true,
               },
               {
                    name: 'styled-list',
                    label: 'Styled List',
               },
               {
                    name: 'two-column-list',
                    label: 'Two Columns',
               },
               {
                    name: 'three-column-list',
                    label: 'Three Columns',
               }
          ]
     );


     // media text styles
     wp.blocks.registerBlockStyle(
          'core/media-text',
          [
               {
                    name: 'default',
                    label: 'Default',
                    isDefault: true,
               },
               {
                    name: 'wide-break',
                    label: 'Wide Break',
               }
          ]
     );


     // paragraph styles
     wp.blocks.registerBlockStyle(
          'core/paragraph',
          [
               {
                    name: 'default',
                    label: 'Default',
                    isDefault: true,
               },
               {
                    name: 'no-bottom-margin',
                    label: 'No Bottom Margin',
               },
               {
                    name: 'half-bottom-margin',
                    label: 'Half Bottom Margin',
               }
          ]
     );


     // spacer styles
     wp.blocks.registerBlockStyle(
          'core/spacer',
          [
               {
                    name: 'default',
                    label: 'Default',
                    isDefault: true,
               },
               {
                    name: 'responsive',
                    label: 'Responsive',
               },
               {
                    name: 'tablet-hide',
                    label: 'Tablet Hidden',
               },
               {
                    name: 'mobile-hide',
                    label: 'Mobile Hidden',
               },
               {
                    name: 'desktop-hide',
                    label: 'Desktop Hidden',
               }
          ]
     );

     // ADD CUSTOM BLOCK VARIATIONS
     // column variations
     wp.blocks.unregisterBlockVariation( // removed unused layouts
          'core/columns',
          [
               // 'one-column-full',
               // 'two-columns-equal',
               'two-columns-one-third-two-thirds',
               'two-columns-two-thirds-one-third',
               // 'three-columns-equal',
               'three-columns-wider-center'
          ]
     );


     // REMOVE CORE BLOCKS / VARIATIONS THAT AREN'T NEEDED

     // design
     wp.blocks.unregisterBlockType( 'core/separator' );

     // formatting
     wp.blocks.unregisterBlockType( 'core/code' );
     wp.blocks.unregisterBlockType( 'core/preformatted' );
     wp.blocks.unregisterBlockType( 'core/pullquote' );
     wp.blocks.unregisterBlockType( 'core/verse' );

     // layouts
     wp.blocks.unregisterBlockType( 'core/more' );
     wp.blocks.unregisterBlockType( 'core/nextpage' );

     // media
     wp.blocks.unregisterBlockType( 'core/file' );

     // theme
     wp.blocks.unregisterBlockType( 'core/post-content' );
     wp.blocks.unregisterBlockType( 'core/post-date' );
     wp.blocks.unregisterBlockType( 'core/post-excerpt' );
     wp.blocks.unregisterBlockType( 'core/post-featured-image' );
     wp.blocks.unregisterBlockType( 'core/post-terms' );
     wp.blocks.unregisterBlockType( 'core/post-title' );
     wp.blocks.unregisterBlockType( 'core/query' );
     wp.blocks.unregisterBlockType( 'core/site-logo' );
     wp.blocks.unregisterBlockType( 'core/site-tagline' );
     wp.blocks.unregisterBlockType( 'core/site-title' );
     wp.blocks.unregisterBlockType( 'core/query-title' );

     // widgets
     wp.blocks.unregisterBlockType( 'core/archives' );
     wp.blocks.unregisterBlockType( 'core/calendar' );
     wp.blocks.unregisterBlockType( 'core/categories' );
     wp.blocks.unregisterBlockType( 'core/latest-comments' );
     wp.blocks.unregisterBlockType( 'core/latest-posts' );
     wp.blocks.unregisterBlockType( 'core/page-list' );
     wp.blocks.unregisterBlockType( 'core/rss' );
     wp.blocks.unregisterBlockType( 'core/search' );
     wp.blocks.unregisterBlockType( 'core/social-links' );
     wp.blocks.unregisterBlockType( 'core/tag-cloud' );

     // embeds
     wp.blocks.unregisterBlockVariation( 'core/embed', 'amazon-kindle' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'animoto' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'cloudup' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'collegehumor' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'crowdsignal' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'dailymotion' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'flickr' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'funnyordie' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'hulu' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'imgur' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'issuu' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'kickstarter' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'meetup-com' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'mixcloud' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'photobucket' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'polldaddy' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'reddit' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'reverbnation' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'screencast' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'scribd' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'slideshare' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'smugmug' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'speaker' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'speaker-deck' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'ted' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'tiktok' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'tumblr' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'videopress' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'wordpress' );
     wp.blocks.unregisterBlockVariation( 'core/embed', 'wordpress-tv' );

     // yoast
     wp.blocks.unregisterBlockType( 'yoast/faq-block' );
     wp.blocks.unregisterBlockType( 'yoast/how-to-block' );
     wp.blocks.unregisterBlockType( 'yoast-seo/breadcrumbs' );

} );


/**
 * Setup custom animations panels in block editor
 *
 * @link https://jeffreycarandang.com/extending-gutenberg-core-blocks-with-custom-attributes-and-controls/
 */


// WordPress dependencies
const { __ } = wp.i18n;
const { addFilter } = wp.hooks;
const { Fragment }	= wp.element;
const { InspectorControls } = wp.editor;
const { createHigherOrderComponent } = wp.compose;
const { Panel, PanelBody, PanelRow, SelectControl } = wp.components;

// Restrict to specific block types
const allowedBlocks = [
     'acf/acf-cover-with-white-box',
     'acf/acf-faq',
     'acf/acf-header-with-button',
     'acf/acf-hero',
     'acf/acf-highlight-split',
     'acf/max-width-block',
     'acf/acf-recent-posts',
     'acf/acf-separator',
     'acf/acf-team',
     'core/button',
     'core/buttons',
     'core/column',
     'core/columns',
     'core/gallery',
     'core/group',
     'core/heading',
     'core/image',
     'core/list',
     'core/media-text',
     'core/paragraph',
     'core/quote',
     'core/table',
     'core/video',
];

// Add custom attribute for animation settings
function addAttributes( settings ) {

     if( typeof settings.attributes !== 'undefined' && allowedBlocks.includes( settings.name ) ){

          settings.attributes = Object.assign( settings.attributes, {
               animationType:{
                    type: 'string',
                    default: 'none',
               },
               animationDuration:{
                    type: 'string',
                    default: 'default',
               },
               animationDelay:{
                    type: 'string',
                    default: 'default',
               }
          });

     }

     return settings;
}

// Add Animation Controls panel to editor
const withInspectorControls = createHigherOrderComponent( ( BlockEdit ) => {
     return ( props ) => {

          const {
               name,
               attributes,
               setAttributes,
               isSelected,
          } = props;

          const {
               animationType,
          } = attributes;

          return (
               <Fragment>
               <BlockEdit {...props} />
               { isSelected && allowedBlocks.includes( name ) &&
                    <InspectorControls>
                         <PanelBody
                         title="Animation Settings"
                         initialOpen={ false }
                         >
                              <PanelRow>
                                   <SelectControl
                                   label="Animation Type"
                                   value={ attributes.animationType }
                                   options={ [
                                        { label: 'None', value: 'none' },
                                        { label: 'Fade In', value: 'animation-fade-in' },
                                        { label: 'Fade Up', value: 'animation-fade-up' },
                                        { label: 'Fade Down', value: 'animation-fade-down' },
                                        { label: 'Fade Left', value: 'animation-fade-left' },
                                        { label: 'Fade Right', value: 'animation-fade-right' },
                                        { label: 'Fade Up Right', value: 'animation-fade-up-right' },
                                        { label: 'Fade Up Left', value: 'animation-fade-up-left' },
                                        { label: 'Fade Down Right', value: 'animation-fade-down-right' },
                                        { label: 'Fade Down Left', value: 'animation-fade-down-left' },
                                   ] }
                                   onChange={ ( value ) => props.setAttributes( { animationType: value } ) }
                                   />
                              </PanelRow>
                              <PanelRow>
                                   <SelectControl
                                   label="Animation Duration"
                                   value={ attributes.animationDuration }
                                   options={ [
                                        { label: 'Default', value: 'animation-duration-default' },
                                        { label: 'Fast', value: 'animation-duration-fast' },
                                        { label: 'Slow', value: 'animation-duration-slow' },
                                   ] }
                                   onChange={ ( value ) => props.setAttributes( { animationDuration: value } ) }
                                   />
                              </PanelRow>
                              <PanelRow>
                                   <SelectControl
                                   label="Animation Delay"
                                   value={ attributes.animationDelay }
                                   options={ [
                                        { label: 'Default', value: 'animation-delay-default' },
                                        { label: 'Delay 1', value: 'animation-delay-1' },
                                        { label: 'Delay 2', value: 'animation-delay-2' },
                                        { label: 'Delay 3', value: 'animation-delay-3' },
                                        { label: 'Delay 4', value: 'animation-delay-4' },
                                        { label: 'Delay 5', value: 'animation-delay-5' },
                                   ] }
                                   onChange={ ( value ) => props.setAttributes( { animationDelay: value } ) }
                                   />
                              </PanelRow>
                         </PanelBody>
                    </InspectorControls>
               }
               </Fragment>
          );
     };
}, 'withInspectorControls');

// Add proper classes based on animation settings
function applyExtraClass( extraProps, blockType, attributes ) {

     const {
          animationDelay,
          animationDuration,
          animationType,
     } = attributes;

     if ( allowedBlocks.includes( blockType.name ) ) {

          // set animation type classes
          if ( animationType == 'animation-fade-up' || animationType == 'animation-fade-down' || animationType == 'animation-fade-left' || animationType == 'animation-fade-right' || animationType == 'animation-fade-in' || animationType == 'animation-fade-up-right' || animationType == 'animation-fade-up-left' || animationType == 'animation-fade-down-right' || animationType == 'animation-fade-down-left' ) {
               extraProps.className = extraProps.className + ' ' + animationType;

               if ( animationDuration == 'animation-duration-fast' || animationDuration == 'animation-duration-slow' ) {
                    extraProps.className = extraProps.className + ' ' + animationDuration;
               }

               if ( animationDelay == 'animation-delay-1' || animationDelay == 'animation-delay-2' || animationDelay == 'animation-delay-3' || animationDelay == 'animation-delay-4' || animationDelay == 'animation-delay-5' ) {
                    extraProps.className = extraProps.className + ' ' + animationDelay;
               }
          }
     }

     return extraProps;
}

// Add filters to set animation styles
// addFilter(
//      'blocks.registerBlockType',
//      'editorskit/custom-attributes',
//      addAttributes
// );
//
// addFilter(
//      'editor.BlockEdit',
//      'editorskit/custom-advanced-control',
//      withInspectorControls
// );
//
// addFilter(
//      'blocks.getSaveContent.extraProps',
//      'editorskit/applyExtraClass',
//      applyExtraClass
// );
