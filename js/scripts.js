$(document).ready(function(){
    smoothScroll.init({
      	speed: 500, // Integer. How fast to complete the scroll in milliseconds
      	easing: 'easeInOutQuad', // Easing pattern to use
      	updateURL: true, // Boolean. Whether or not to update the URL with the anchor hash on scroll
      	offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
      	callbackBefore: function ( toggle, anchor ) {}, // Function to run before scrolling
      	callbackAfter: function ( toggle, anchor ) {} // Function to run after scrolling
    });

function scroll_if_anchor(href) {
    href = typeof(href) == "string" ? href : $(this).attr("href");

    // If href missing, ignore
    if(!href) return;

    // You could easily calculate this dynamically if you prefer
    var fromTop = 50;

    // If our Href points to a valid, non-empty anchor, and is on the same page (e.g. #foo)
    // Legacy jQuery and IE7 may have issues: http://stackoverflow.com/q/1593174
    var $target = $(href);

    // Older browsers without pushState might flicker here, as they momentarily
    // jump to the wrong position (IE < 10)
    if($target.length) {
        $('html, body').animate({ scrollTop: $target.offset().top - fromTop });
        if(history && "pushState" in history) {
            history.pushState({}, document.title, window.location.pathname + href);
            return false;
        }
    }
}    

scroll_if_anchor(window.location.hash);

$("body").on("click", "a[href^='#']", scroll_if_anchor);

});