(function($){

     var initializeBlock = function( $block ) {

          $('.faq-block__toggle-question').click(function() {
               $(this).parent('.faq-block__toggle').toggleClass('active');
               $(this).siblings('.faq-block__toggle-answer').slideToggle();
          });

    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.faq-block').each(function(){
            initializeBlock( $(this) );
        });
    });

     if( window.acf ) {
          window.acf.addAction( 'render_block_preview/type=acf-faq', initializeBlock );
     }

})(jQuery);
