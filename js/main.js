jQuery(document).ready(function($){
    var loader = $('#loader-status').val();
    if (loader == 1) {
        $('body').css({"height": "100%", "overflow": "hidden"});
        $(window).load(function() {
            // Animate loader off screen
            $('body').removeAttr("style");
            $(".se-pre-con").fadeOut("slow");
        });
    }
    $(window).load(function() {
        // Animate loader off screen
        var video_height = $('#section-banner #banner-video').height();
        var banner_height = video_height;
        var window_height = $(window).height();
        if (video_height > window_height) banner_height = window_height;
        $('#section-banner .banner-content').css('height',banner_height);
    }); 
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            //$('.scrollup').fadeIn();
            $('#main-header').addClass('tiny');
            $('.scrollup').fadeIn();
        } else {
            //$('.scrollup').fadeOut();
            $('#main-header').removeClass('tiny');
            $('.scrollup').fadeOut();
        }
    });
    
    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
    $(".navbar-nav > li:has('ul')").prepend("<span class='drop_down_icon fa fa-angle-down'></span>");
    
    $(".drop_down_icon").click(function() {
        $(this).siblings("ul").slideToggle();
    }); 
    $('#section-banner-owl').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        items:1,
        margin: 0,              
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 6000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
    });
    $('#section-feature-owl').owlCarousel({
        loop:true,
        nav:true,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    $('#section-banner-owl .owl-prev').html('<i class="fa fa-angle-left"></i>');
    $('#section-banner-owl .owl-next').html('<i class="fa fa-angle-right"></i>');
    $('#section-feature .slider-part .owl-prev').html('<i class="fa fa-arrow-circle-left"></i>');
    $('#section-feature .slider-part .owl-next').html('<i class="fa fa-arrow-circle-right"></i>');
});