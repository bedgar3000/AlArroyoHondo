(function($) { 
    "use strict";

	$(function() {
		var header = $("header");

		scrollOn();
		$(window).scroll(function() {
			scrollOn();
		});

		function scrollOn() {
			var scroll = $(window).scrollTop();
			if (scroll >= 100) {
				header.addClass("scroll-on");
			} else {
				header.removeClass("scroll-on");
			}
		}
	});

    $(document).ready(function () {
        $(".hamburger").on("click", function () {
            $(this).toggleClass("is-active");
            $('header').toggleClass("toggled");
            $('body').toggleClass("toggled");
        });

		$('.btn-search-mobile').on('click', function(e) {
			e.preventDefault();
			$('.header-search-mobile').toggleClass('opened');
		});
    });
})(jQuery); 