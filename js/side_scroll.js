/* activate sidebar */
$('#sidebar').affix({
  offset: {
    top: 235
  }
});

/* activate scrollspy menu */
var $body   = $(document.body);
var navHeight = $('.navbar').outerHeight(true) + 10;

$body.scrollspy({
	target: '#leftCol',
  offset: navHeight
});

/* smooth scrolling sections */
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 50
        }, 1000);
        return false;
      }
    }
});

$(window).scroll(function () { 

var navbarHeights = {
  "studio": 475,
  "press": 300,
  "events": 550
}

// distance from top of footer to top of document
footertotop = ($('#footer').position().top);
// distance user has scrolled from top, adjusted to take in height of sidebar (570 pixels inc. padding)
scrolltop = $(document).scrollTop()+navbarHeights[page];
// difference between the two
difference = scrolltop-footertotop;

// if user has scrolled further than footer,
// pull sidebar up using a negative margin

if (scrolltop > footertotop) {

$('#sidebar').css('margin-top',  0-difference);
}

else  {
$('#sidebar').css('margin-top', 0);
}


});