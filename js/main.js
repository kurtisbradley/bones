/*--------------------------------------------------------------
Detect Swipe
--------------------------------------------------------------*/
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){function e(){this.removeEventListener("touchmove",f),this.removeEventListener("touchend",e),d=!1}function f(f){if(a.detectSwipe.preventDefault&&f.preventDefault(),d){var k,g=f.touches[0].pageX,h=f.touches[0].pageY,i=b-g,j=c-h;Math.abs(i)>=a.detectSwipe.threshold?k=i>0?"left":"right":Math.abs(j)>=a.detectSwipe.threshold&&(k=j>0?"up":"down"),k&&(e.call(this),a(this).trigger("swipe",k).trigger("swipe"+k))}}function g(a){1==a.touches.length&&(b=a.touches[0].pageX,c=a.touches[0].pageY,d=!0,this.addEventListener("touchmove",f,!1),this.addEventListener("touchend",e,!1))}function h(){this.addEventListener&&this.addEventListener("touchstart",g,!1)}a.detectSwipe={version:"2.1.2",enabled:"ontouchstart"in document.documentElement,preventDefault:!0,threshold:20};var b,c,d=!1;a.event.special.swipe={setup:h},a.each(["left","up","down","right"],function(){a.event.special["swipe"+this]={setup:function(){a(this).on("swipe",a.noop)}}})});

jQuery(function($) {

	// vars
	var $window = $(window);
	var $body = $('body');
	
	// load
	$window.load(function() {

	});
	
	// resize
	$window.resize(function() {
		
	});

	// scroll
	$window.scroll(function(event) {
		var windowTop = $window.scrollTop();
		// fixed header
		if (windowTop > 50) {
			$body.addClass('fixed');
		} else {
			$body.removeClass('fixed');
		}
	});
	
	// parallax
	var $parallax = $('.parallax');
	$window.scroll(function(event) {
		var scrolled = $window.scrollTop();
		$parallax.css('transform', 'translate3d(0, ' + (scrolled * 0.5) + 'px, 0)');
		$parallax.css('opacity', 1 - (scrolled / 1000));
	});
	
	// mobile menu
	$('.navigation-toggle').click(function(event) {
		event.preventDefault();
		if ($body.hasClass('menu-toggled')) {
			$body.off('swiperight');
		} else {
			$body.on('swiperight', function() {
				$('.navigation-toggle').click();
			});
		}
		$body.toggleClass('menu-toggled');
	});

	// content animation
	var $animate = $('.animate');
	function in_view() {
		var window_height = $window.height();
		var window_top_position = $window.scrollTop();
		var window_bottom_position = (window_top_position + window_height);
		
		$animate.each(function() {
			var $element = $(this);
			var element_height = $element.outerHeight();
			var element_top_position = $element.offset().top;
			var element_bottom_position = (element_top_position + element_height);
			if ((element_bottom_position >= window_top_position) &&
				(element_top_position <= window_bottom_position)) {
				$element.addClass('in-view');
			}
		});
	}
	$window.on('scroll resize', in_view);
	
	// trigger events
	$window.trigger('resize');
	$window.trigger('scroll');
	
});