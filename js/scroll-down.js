$(document).ready(function(){
  //  smooth scrolling for scroll down 
  $('.scroll-down').click(function(){
     $('body,html').animate({scrollTop:$(window).scrollTop()+800},1000);
  })
});