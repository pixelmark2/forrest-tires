(function($) {
	
	$(document).ready(function(){


		$('.ft-carousel').on('init', function(slick) {
			var slick_height = $(".content-sidebar-wrap").height();
			var styleString = '<style>.ft-carousel .slick-list {height: ' + slick_height + 'px !important</style>';


			$("head").append(styleString);
		});
			var postid = $(".ft-header").data("postid");
			var postslide = document.getElementById(postid);
			console.log(postslide)
			var slide_id = $(postslide).data("count")
			//var slick_index = $(postslide).data("slick-index");
			console.log(slide_id);
		$('.ft-carousel').slick({
			centerMode: true,
			centerPadding: '50px',
			slide: '.ft-carousel-item',
			slidesToShow: 6,
			slidesToScroll: 1,
			vertical: true,
			verticalSwiping: true,
			arrows: true,
			initialSlide: slide_id,
			prevArrow: "<button class='dashicons dashicons-arrow-up-alt2 slick-prev slick-arrow'></button>",
			nextArrow:"<button class='dashicons dashicons-arrow-down-alt2 slick-next slick-arrow'></button>"


		});

			// var slider = $('.ft-carousel');
			// slider[0].slick.slickGoTo(parseInt(slick_index));
			var slick_height = $(".content-sidebar-wrap").height();
			console.log(slick_height)
			$("ft-carousel .slick-list").css("height", slick_height);
		
	
	});


})(jQuery);