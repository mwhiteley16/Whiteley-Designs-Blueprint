(function($){

     var initializeBlock = function( $block ) {

          var options = {
               cellAlign: 'left',
               //setGallerySize: true,
               // autoPlay: 6000,
               wrapAround: false,
               dragThreshold: 25,
               pageDots: true,
               prevNextButtons: true,
               imagesLoaded: true,
               adaptiveHeight: true,
               cellSelector: '.slideshow-block__slide',
          }

          // setup slideshow
          $('.slideshow-block__slides').flickity( options );

    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.slideshow-block').each(function(){
            initializeBlock( $(this) );
        });
    });

     if( window.acf ) {
          window.acf.addAction( 'render_block_preview/type=acf-slideshow-block', initializeBlock );
     }

})(jQuery);
