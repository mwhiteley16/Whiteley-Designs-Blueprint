(function($){

     var initializeBlock = function( $block ) {

          // jQuery goes here...

     }

     // initialize each block on page load
     $(document).ready(function(){
          initializeBlock( ('.') );
     });

     // initialize dynamic block preview (editor)
     if( window.acf ) {
          window.acf.addAction( 'render_block_preview/type=acf-', initializeBlock );
     }

})(jQuery);
