(function($) {
    "use strict";

    $(document).ready(function() {
        $('.owl-hero').owlCarousel({
            loop:true,
            nav:true,
            dots:true,
            autoplay:true,
            autoplayTimeout:5000,
            dots:true,
            items:1
        });

        $('.owl-cat-vehiculo').owlCarousel({
            loop:false,
            nav:false,
            dots:false,
            autoplay:false,
            autoplayTimeout:5000,
            responsive:{
                0:{
                    margin:0,
                    dots:true,
                    items:1
                },
                576:{
                    margin:10,
                    dots:true,
                    items:2
                },
                768:{
                    margin:10,
                    dots:true,
                    items:3
                },
                1200:{
                    margin:10,
                    dots:true,
                    items:4
                },
                1600:{
                    margin:10,
                    items:5
                }
            }
        });
        
        $('.owl-posts').owlCarousel({
            loop:false,
            nav:false,
            dots:false,
            autoplay:false,
            autoplayTimeout:5000,
            responsive:{
                0:{
                    margin:0,
                    dots:true,
                    items:1
                },
                576:{
                    margin:10,
                    dots:true,
                    items:2
                },
                1200:{
                    margin:25,
                    dots:false,
                    items:3
                },
                1800:{
                    margin:50,
                    dots:false,
                    items:3
                }
            }
        });
    });
})(jQuery);
