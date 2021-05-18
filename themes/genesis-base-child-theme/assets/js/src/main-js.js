// @codekit-prepend quiet "flickity.pkgd.min.js";

(function($){

     $(document).ready(function(){

          // mobile menu
          $('.mobile-navigation-icon').click(function() {
               $(this).toggleClass('open');
               $('.nav-primary').slideToggle();
          });
     });

})(jQuery);
