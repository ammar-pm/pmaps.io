"use strict";

$(document).ready(function (){

  // backstretch
  $("header").backstretch("/images/hero.jpg");

  // Setting default easing
  jQuery.easing.def = "easeInOutExpo";

  // Slick initializer function
  $(".panels-carousel").slick({
    autoplay: false,
    autoplaySpeed: 5000,
    infinite: false,
    dots: true,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }
    ]
  });

  // Slick initializer function
  $(".library-carousel").slick({
    autoplay: true,
    autoplaySpeed: 5000,
    infinite: true,
    dots: false,
    arrows: false,
    slidesToShow: 1,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  // Scroll To # Links
  $('a.scroll[href^="#"]').on('click', function(e) {
    e.preventDefault();

    var target = this.hash;
    target = target.replace('#', '');
     var $target = $('#' + target);

    $('html, body').stop().animate({
      'scrollTop': $target.offset().top
    }, 1000, function() {
      window.location.hash = '#' + target;
    });
  });

});

// Preloader
// Change delay and fadeOut speed (in miliseconds)
$(window).load(function() {
  $(".preloader").delay(250).fadeOut(500);
});