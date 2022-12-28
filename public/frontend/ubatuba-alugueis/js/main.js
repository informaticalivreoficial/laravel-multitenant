/* Theme Name: Itawa - Real Estate Landing Page
	Author: Rajesh-Doot
	Version: 1.0.0
	File Description: Main JS file of the template*/
	
	/*Table of contents*/
	/*1.OWL-CAROUSEL
	2.FLOOR PLAN POPUP 
	3.GALLERY POPUP
	4.NAVBAR SCROLL
	5.Form validation */
	
(function ($) {
	"use strict";
	//OWL-CAROUSEL	
	$(".owl-carousel").each(function () {
		var $Carousel = $(this);
		$Carousel.owlCarousel({
			loop: $Carousel.data('loop'),
			autoplay: $Carousel.data("autoplay"),
			margin: $Carousel.data('space'),
			nav: $Carousel.data('nav'),
			dots: $Carousel.data('dots'),
			dotsSpeed: $Carousel.data('speed'),
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: $Carousel.data('slide-res')
				},
				1000: {
					items: $Carousel.data('slide'),
				}
			}
		});
	});
	//FLOOR PLAN POPUP  
	$('.image-popup-floor-plan').magnificPopup({
		type: 'image',
		mainClass: 'mfp-with-zoom',
		gallery: {
			enabled: true
		},
	});
	//GALLERY POPUP
	$('.image-popup-gallery').magnificPopup({
		type: 'image',
		mainClass: 'mfp-with-zoom',
		gallery: {
			enabled: true
		},
	});
	//STICKY HEADER
	$(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 50) {
            $(".navbar").removeClass("sticky");
        } else {
            $(".navbar").addClass("sticky");
        }
    });
	
	//NAVBAR SCROLL		
	var aScroll = $('.nav-item .nav-link'),
		$navbarCollapse = $('.navbar-collapse');
	aScroll.on('click', function (event) {
		var target = $($(this).attr('href'));
		$(this).parent(".nav-item").siblings().removeClass('active');
		$(this).parent('.nav-item').addClass('active');

		if (target.length > 0) {
			event.preventDefault();
			$('html, body').animate({
				scrollTop: target.offset().top - 70
			}, 1000);
		}
		// If click link and navabr is show
		if ($('.navbar-collapse').hasClass('show')) {
			$('.navbar-collapse').toggleClass('show');
			$('.navbar-toggler-icon').toggleClass('active');
			$('.navbar-toggler').toggleClass('collapsed');
		}
	});
	// Form validation	
		

})(jQuery);