wp.domReady( () => {

     // ADD CUSTOM BLOCK STYLES

     // button styles
     wp.blocks.unregisterBlockStyle(
     	'core/button',
     	[ 'default', 'outline', 'squared', 'fill' ]
     );

     wp.blocks.registerBlockStyle(
          'core/button',
          [
               {
                    name: 'default',
                    label: 'Default',
                    isDefault: true,
               },
               {
                    name: 'inverse',
                    label: 'Inverse',
               }
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
                    name: 'two-three-list',
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
               },
               {
                    name: 'mobile-image-top',
                    label: 'Mobile Image Top',
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
                    name: 'responsive-small',
                    label: 'Responsive Small (100px-60px)',
               },
               {
                    name: 'responsive-medium',
                    label: 'Responsive Medium (120px-80px)',
               },
               {
                    name: 'responsive-large',
                    label: 'Responsive Large (140px-100px)',
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

     // button variations
     wp.blocks.registerBlockVariation(
          'core/buttons',
          [
               {
                    name: 'wide',
                    title: 'Wide Buttons',
                    attributes: {
                         className: 'is-variation-wide'
                    },
               },
               {
                    name: 'full',
                    title: 'Full Buttons',
                    attributes: {
                         className: 'is-variation-full'
                    },
               }
          ]
     );

     // column variations
     wp.blocks.unregisterBlockVariation( // removed unused layouts
          'core/columns',
          [
               'one-column-full',
               'two-columns-equal',
               'two-columns-one-third-two-thirds',
               'two-columns-two-thirds-one-third',
               'three-columns-equal',
               'three-columns-wider-center'
          ]
     );

     wp.blocks.registerBlockVariation( // add custom layouts & replace 2/3 column layouts
          'core/columns',
          [
               {
                    name: 'two-columns',
                    title: '2 Columns',
                    icon: 'star-filled',
                    attributes: {
                         className: 'is-variation-2-columns'
                    },
                    scope: [ 'block' ],
                    innerBlocks: [
                         [ 'core/column' ],
                         [ 'core/column' ],
                    ],
               },
               {
                    name: 'three-columns',
                    title: '3 Columns',
                    icon: 'star-filled',
                    attributes: {
                         className: 'is-variation-3-columns'
                    },
                    scope: [ 'block' ],
                    innerBlocks: [
                         [ 'core/column' ],
                         [ 'core/column' ],
                         [ 'core/column' ],
                    ],
               },
               {
                    name: 'four-columns',
                    title: '4 Columns',
                    icon: 'star-filled',
                    attributes: {
                         className: 'is-variation-4-columns'
                    },
                    scope: [ 'block' ],
                    innerBlocks: [
                         [ 'core/column' ],
                         [ 'core/column' ],
                         [ 'core/column' ],
                         [ 'core/column' ],
                    ],
               },
               {
                    name: 'five-columns',
                    title: '5 Columns',
                    icon: 'star-filled',
                    attributes: {
                         className: 'is-variation-5-columns'
                    },
                    scope: [ 'block' ],
                    innerBlocks: [
                         [ 'core/column' ],
                         [ 'core/column' ],
                         [ 'core/column' ],
                         [ 'core/column' ],
                         [ 'core/column' ],
                    ],
               },
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


// add center align to group block
wp.hooks.addFilter(
	'blocks.registerBlockType',
	'wd/groupAlignments',
	function (settings, name) {
		if (name === 'core/group') { return lodash.assign({}, settings, {
			supports: lodash.assign({}, settings.supports, {
				align: [ 'wide', 'full', 'center' ],
			}),
		});
	}
	return settings;
	}
);
