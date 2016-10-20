jQuery(function ($) {

    $(window).on("load resize", function (e) {
        var side_height = $(".content-sidebar-wrap").height();
        var min_height = $(".ft-services-list").outerHeight(true);
        $(".ft-left-image").height(side_height);
        $(".ft-left-image").css("min-height", min_height + "px");
        /*var styleString = '<style>.ft-left-image-page .ft-left-image {height: ' + side_height + 'px !important;</style>';
        $("head").append(styleString);*/
    });
});