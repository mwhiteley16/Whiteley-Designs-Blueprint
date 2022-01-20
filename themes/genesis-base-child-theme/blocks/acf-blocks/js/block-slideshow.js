(function($){

     var initializeBlock = function( $block ) {

          // https://flickity.metafizzy.co/options.html
          var options = {
               // adaptiveHeight  : true, // changes height based on each slide
               autoPlay        : 6000,
               cellAlign       : 'left',
               cellSelector    : '.slideshow-block__slide',
               dragThreshold   : 25,
               imagesLoaded    : true, // don't load until images have loaded
               pageDots        : true,
               prevNextButtons : true,
               setGallerySize  : true, // comment out and define with CSS for custom heights
               wrapAround      : false,
          }

          // setup slideshow
          $('.slideshow-block__slides').flickity( options );

          // // if using custom previous/next buttons
          // var $carousel = $('.slideshow-block__slides').flickity( options );
          //
          // // set variables
          // var flkty            = $carousel.data('flickity'); // the slideshow
          // var $cellButtonGroup = $(''); // button wrapper
          // var $cellButtons     = $cellButtonGroup.find('i.far'); // button target
          //
          // // previous button
          // var $previousButton = $('.fa-arrow-left').on( 'click', function() {
          //     $carousel.flickity('previous');
          // });
          //
          // // next button
          // var $nextButton = $('.fa-arrow-right').on( 'click', function() {
          //     $carousel.flickity('next');
          // });
          //
          // // update selected cellButtons
          // $carousel.on( 'select.flickity', function() {
          //
          //      // set selected state
          //      $cellButtons.filter('.is-selected')
          //           .removeClass('is-selected');
          //      $cellButtons.eq( flkty.selectedIndex )
          //           .addClass('is-selected');
          //
          //      // enable/disable previous/next buttons
          //      if ( !flkty.slides[ flkty.selectedIndex - 1 ] ) {
          //           $previousButton.attr( 'disabled', 'disabled' );
          //           $nextButton.removeAttr('disabled'); // <-- remove disabled from the next
          //      } else if ( !flkty.slides[ flkty.selectedIndex +1 ] ) {
          //           $nextButton.attr( 'disabled', 'disabled' );
          //           $previousButton.removeAttr('disabled'); //<-- remove disabled from the prev
          //      } else {
          //           $previousButton.removeAttr('disabled');
          //           $nextButton.removeAttr('disabled');
          //      }
          // });

     }

     // Initialize each block on page load (front end).
     $(document).ready(function(){
          $('.slideshow-block').each(function(){
               initializeBlock( $(this) );
               return false; // stop after first run to ensure it works if multiple instances are on page
          });
     });

     if( window.acf ) {
          window.acf.addAction( 'render_block_preview/type=acf-slideshow', initializeBlock );
     }

})(jQuery);
