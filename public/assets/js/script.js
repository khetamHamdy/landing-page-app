$(document).ready(function(){
	/*header-fixed*/
    /*header-fixed*/
    $(window).scroll(function(){
            
        if ($(window).scrollTop() >= 100) {
            $('#header').addClass('fixed-header');
        }
        else {
            $('#header').removeClass('fixed-header');
        }
              
    });
    $('.scroll, .mmenu a').on('click', function () {
        
        $('html, body').animate({
           
            scrollTop: $('#' + $(this).data('value')).offset().top
           
        }, 1000);
        
        $("body,html").removeClass('menu-toggle');
        
        $(".hamburger").removeClass('active');
        
    });
    /*open menu*/
    $(".hamburger").click(function(){
        $("body,html").addClass('menu-toggle');
        $(".hamburger").addClass('active');
    });
    $(".m-overlay").click(function(){
        $("body,html").removeClass('menu-toggle');
        $(".hamburger").removeClass('active');
    });
    
    $('.mmenu ul li').on('click', function () {
        $("body,html").removeClass('menu-toggle');
    });
    
    /*cart-menu*/
	$(function() {
		$('.btn-contact').click(function() {
				toggleNav();
			});
		});
		function toggleNav() {
			if ($('.aside-contact').hasClass('show-aside')) {
				$('.aside-contact').removeClass('show-aside');
			} else {
				$('.aside-contact').addClass('show-aside');
			}

			if ($('body').hasClass('over-hidden-body')) {
				$('body').removeClass('over-hidden-body');
			} else {
				$('body').addClass('over-hidden-body');
			}

		}
    $('.close-aside').click(function() {
            $('.aside-contact').removeClass('show-aside');
            $('body').removeClass('over-hidden-body');
    });
    
    /*page-scroll*/
    
    $(function() {
        $(document).on('click', 'a.page-scroll', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top-30
            }, 600, 'easeInOutExpo');
            event.preventDefault();
        });
    });
    
    
    $('#testi-slider').owlCarousel({
        loop: true,
        margin: 30,
        singleItem:true,
        responsiveClass: true,
        responsive:{
            0:{
                items:1,
            },
            470:{
                items:1,
            },
            650:{
                items:1,
            },
            767:{
                items:1,
            },
            991:{
                items:1,
            },
            1199:{
                items:2,
                stagePadding: 90,
            }

        },
        dots: true,
        nav: false,
        autoplay: true
    });
    
    $('.screenshoot-slider').owlCarousel({
	        loop: true,
            margin: 10,
            singleItem:true,
            center: true,
            responsiveClass: true,
            responsive:{
                0:{
                    items:1,
                },
                470:{
                    items:1,
                },
                650:{
                    items:1,
                },
                767:{
                    items:1,
                },
                991:{
                    items:5,
                },
                1199:{
                    items:5,
                }

            },
            dots: true,
            nav: false,
            autoplay: false
	    });
    

})