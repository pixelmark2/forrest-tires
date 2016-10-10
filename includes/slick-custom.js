(function($) {
	
	$(document).ready(function(){
			
			postid = $(".ft-header").data("postid");
			postslide = document.getElementById(postid);
			console.log(postid);
			$(postslide).addClass('ft-active');
			slide_id = $(postslide).data("count");
			var slick_index = $(postslide).data("slick-index");
			console.log(slide_id);
			//console.log(slick_index);
		$('.ft-carousel').slick({
			centerMode: true,
			slide: '.ft-carousel-item',
			slidesToShow: 6,
			slidesToScroll: 1,
			vertical: true,
			verticalSwiping: true,
			arrows: true,
			initialSlide: slide_id,
			prevArrow: '<a class="ft-carousel-arrow ft-arrow-up" href="#"><span class="dashicons dashicons-arrow-up-alt2"></span></a>',
			nextArrow:'<a class="ft-carousel-arrow ft-arrow-down" href="#"><span class="dashicons dashicons-arrow-down-alt2"></span></a>'

		});

			// var slider = $('.ft-carousel');
			// slider[0].slick.slickGoTo(parseInt(slick_index));
			/*var slick_height = $(".content-sidebar-wrap").height();
			console.log(slick_height)
			$("ft-carousel .slick-list").css("height", slick_height);*/
		
		
		//$('.ft-carousel').slick('slickGoTo',(slide_id,false));
	});
	
	$(window).load(function() {
		
		var slick_height = $(".content-sidebar-wrap").height();
		var styleString = '<style>.ft-carousel .slick-list {height: ' + slick_height + 'px !important; min-height: 750px!important;</style>';
		$("head").append(styleString);
		
	});


})(jQuery);