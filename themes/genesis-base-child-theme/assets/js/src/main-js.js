(function($){

     $.fn.isInViewport = function() {
          var elementTop = $(this).offset().top;
          var elementBottom = elementTop + $(this).outerHeight();

          var viewportTop = $(window).scrollTop();
          var viewportBottom = viewportTop + $(window).height();

          return elementBottom > viewportTop && elementTop < viewportBottom;
     };

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

          // add "inviewport" class once container is visible to trigger animation
          $('.animation-fade-in, .animation-fade-up, .animation-fade-down, .animation-fade-right, .animation-fade-left, .animation-fade-up-right, .animation-fade-up-left, .animation-fade-down-right, .animation-fade-down-left').each(function() {
               if ($(this).isInViewport()) {
                    $(this).addClass('inviewport');
               }
          });

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

     // add "inviewport" class once container is visible to trigger animation
     $(window).on('resize scroll', function() {

          $('.animation-fade-in, .animation-fade-up, .animation-fade-down, .animation-fade-right, .animation-fade-left, .animation-fade-up-right, .animation-fade-up-left, .animation-fade-down-right, .animation-fade-down-left').each(function() {
               if ($(this).isInViewport()) {
                    $(this).addClass('inviewport');
               }
          });
     });

})(jQuery);
