jQuery(function ($) {

    // Sticky Navigation
    var headerHeight = $('.site-header').innerHeight();
    var abovenavHeight = headerHeight - 1;

    $(window).scroll(function () {

        if ($(document).scrollTop() > abovenavHeight) {

            $('.nav-primary').addClass('fixed');

        } else {

            $('.nav-primary').removeClass('fixed');

        }

    });

});