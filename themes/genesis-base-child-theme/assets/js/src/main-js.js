// @codekit-prepend quiet "flickity.pkgd.min.js";

(function($){

     $(document).ready(function(){

          // mobile menu
          $('.mobile-navigation-icon').click(function() {
               $(this).toggleClass('open');
               $('.nav-primary').slideToggle();
          });

          // superfish options
          // full list of options -- https://superfish.joelbirch.design/options/
          $('ul.js-superfish').superfish({

               // args to mirror default genesis superfish settings
               'delay':       100,                                     // 0.1 second delay on mouseout.
     		'animation':   { 'opacity': 'show', 'height': 'show' },  // Default os fade-in and slide-down animation.
     		'dropShadows': false,                                    // Disable drop shadows.

               // custom args
               // 'speed': 250, // speed of opening animation
          });
     });

})(jQuery);
