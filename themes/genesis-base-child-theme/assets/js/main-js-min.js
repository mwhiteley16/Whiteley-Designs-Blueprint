!function($){$.fn.isInViewport=function(){var i=$(this).offset().top,n=i+$(this).outerHeight(),a=$(window).scrollTop(),t=a+$(window).height();return n>a&&i<t},$(document).ready((function(){$(".mobile-navigation-icon").click((function(){$(this).toggleClass("open"),$(".nav-primary").slideToggle()})),$(".menu-item-has-children button").click((function(){$(this).parent(".menu-item").toggleClass("open")})),$(".animation-fade-in, .animation-fade-up, .animation-fade-down, .animation-fade-right, .animation-fade-left, .animation-fade-up-right, .animation-fade-up-left, .animation-fade-down-right, .animation-fade-down-left").each((function(){$(this).isInViewport()&&$(this).addClass("inviewport")}))})),$(window).on("resize scroll",(function(){$(".animation-fade-in, .animation-fade-up, .animation-fade-down, .animation-fade-right, .animation-fade-left, .animation-fade-up-right, .animation-fade-up-left, .animation-fade-down-right, .animation-fade-down-left").each((function(){$(this).isInViewport()&&$(this).addClass("inviewport")}))}))}(jQuery);