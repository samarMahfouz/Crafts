/*global $, alert, console*/
$(function () {
  'use strict';
  $('header').height($(window).height() - $('nav').height());
  // adjust list item center
  $('header section').css('paddingTop', ($(window).height()-$('header section').height()) / 2);

  $('.signn').click(function () {
    $('.login').removeClass('hidden');
    $('.signup').addClass('hidden');
  });
  // adjust shuffle links
  $('.links li').click(function () {
    $(this).addClass('select').siblings().removeClass('select');
  });
  $('.link li').click(function () {
    $(this).addClass('selected').siblings().removeClass('selected');
  });
  // testimonials slider
  (function autoSlider() {
		$('.slider .active').each(function () {
		  	if(!$(this).is(":last-child")){
				$(this).delay(5000).slideDown(800, function () {
				$(this).removeClass("active").next().addClass("active").fadeIn(800);
				autoSlider();
			});
			}else{
				$(this).delay(5000).slideDown(800, function () {
					$(this).removeClass('active');
					$('.slider div').eq(0).addClass('active').fadeIn();
					autoSlider();
				});
			}
		});
	}());
  // Trigger mixitup
   window.mixitup('#gallery');
});
