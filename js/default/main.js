(function($) {
    $(document).ready(function(e) {

        $('html').niceScroll({
            cursoropacitymin: 0,
            cursorwidth: 10,
            cursorborder : 0,
            cursorborderradius : '6px',
            horizrailenabled : false,
            scrollspeed : 60,
            mousescrollstep : 60,
            zindex: 99999999999999
        });


        /*===========================================================================================
         Slideshow
         =============================================================================================*/


        if($(".slideshow").is(':visible')) {

            $('.slideshow').imagesLoaded( function() {

                $('.slideshow').height('auto');

                // Generating the slider
                $('.slideshow').fractionSlider({
                    dimensions              : '1920,475',
                    responsive              : true,
                    backgroundAnimation     : false,
                    slideTransitionSpeed    : 500,
                    pagination              : false,
                    timeout                 : 7000,
                    controls                : true
                });
            });
        }

    });

})(jQuery);
