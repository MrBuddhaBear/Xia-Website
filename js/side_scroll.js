/* activate sidebar */
$('#sidebar').affix({
  offset: {
    top: 235,
    bottom: 465
  }
});

/* activate scrollspy menu */
var $body   = $(document.body);
var navHeight = $('.navbar').outerHeight(true) + 10;

$body.scrollspy({
	target: '#leftCol',
});

/* smooth scrolling sections */
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) 
    {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) 
        {
        $('html,body').animate(
            {
              scrollTop: target.offset().top - 50
            }, 1000
          );
        return false;
        }
    }
});

//temporary fix for relative positioning bug when bottom of page is reached
$("#sidebar").on("activate.bs.scrollspy", function() {
  $("#sidebar").attr("style","")
})
