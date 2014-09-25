
$(document).ready(function(){
    smoothScroll.init({
      	speed: 500, // Integer. How fast to complete the scroll in milliseconds
      	easing: 'easeInOutQuad', // Easing pattern to use
      	updateURL: true, // Boolean. Whether or not to update the URL with the anchor hash on scroll
      	offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
      	callbackBefore: function ( toggle, anchor ) {}, // Function to run before scrolling
      	callbackAfter: function ( toggle, anchor ) {} // Function to run after scrolling
    });

/* smooth scrolling for scroll to top */
$('.scroll-top').click(function(){
  $('body,html').animate({scrollTop:0},800);
})
//  smooth scrolling for scroll down 
$('.scroll-down').click(function(){
   $('body,html').animate({scrollTop:$(window).scrollTop()+800},1000);
})

// /* highlight the top nav as scrolling occurs */
// $('body').scrollspy({ target: '#navbar' })

// });
});