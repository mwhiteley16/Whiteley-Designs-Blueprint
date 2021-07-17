(function($){

     $(document).ready(function(){

          // mobile menu
          $('.mobile-navigation-icon').click(function() {
               $(this).toggleClass('open');
               $('.nav-primary').slideToggle();
          });

          // mobile submenu dropdowns
          $('.menu-item-has-children button').click(function() {
               $(this).parent('.menu-item').toggleClass('open');
          })

          // custom gravityforms labels (use div with .gfield to avoid complex fieldsets)
          // $( '.styled-labels div.gfield input, .styled-labels div.gfield textarea' ).on( "change keyup keydown" , function(e) {
          //      var elem = $(this);
          //      if ( elem.val() ) {
          //           elem.closest( 'div.gfield' ).addClass( 'hasValue' );
          //      } else {
          //           elem.closest( 'div.gfield' ).removeClass( 'hasValue' );
          //      }
          // });

          // custom gravityforms labels (use fieldset with .gfield to target complex fieldsets)
          // $( '.styled-labels fieldset.gfield input' ).on( "change keyup keydown" ,function(e) {
          //      var elem = $(this);
          //      if ( elem.val() ) {
          //           elem.closest( 'span' ).addClass( 'hasValue' );
          //      }else{
          //           elem.closest( 'span' ).removeClass( 'hasValue' );
          //      }
          // });
     });

})(jQuery);
