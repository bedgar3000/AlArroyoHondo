(function($) { 
    "use strict";

    $(document).ready(function() {
        $(window).scroll(function(){ 
            if ($(this).scrollTop() > 100) {
                $('#back-to-top').addClass('d-flex');
            } else {
                $('#back-to-top').removeClass('d-flex');
            }
        });

        $('#back-to-top').click(function() {
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });

        $('.kt-phone').each(function() {
            $(this).inputmask({"mask": "(999) 999-9999"});
        });

        $('.kt-dni').each(function() {
            $(this).inputmask({"mask": "999-9999999-9"});
        });

        $('.kt-currency').each(function() {
            $(this).inputmask({ alias: "currency", prefix: "RD$ " });
        });

        $('.kt-percent').each(function() {
            $(this).inputmask({ alias: "currency", prefix: "% " });
        });
    });
})(jQuery); 