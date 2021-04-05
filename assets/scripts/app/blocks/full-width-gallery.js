var swipers = {};

$(window).on('load', function () {

	$(".full-width-gallery").each(function (index, element) {
		console.log('found one');

		var block_id = $(this).attr('id');
		var gallery_num = $(this).attr('gallerynum');
		var block_element = '#' + block_id;
		swipers[gallery_num] = new Swiper(block_element + ' .swiper-container', {
			loop: false,
			navigation: {
				nextEl: block_element + ' .swiper-button-next',
				prevEl: block_element + ' .swiper-button-prev',
			},
			slidesPerView: 'auto',
			spaceBetween: 45,
			activeSlideKey: 0
		});

	});
});

$(".popup-gallery-close").on('click', function () {
	$(".popup-gallery").css('display', 'none');
});

$(".project-gallery-image").on('click', function () {
	var popup_id = $(this).parent().attr('id') + '-popup-swiper';
	var gallery_num = $(this).parent().attr('gallerynum');
	var gallery_index = parseInt($(this).attr('galleryindex'));
	var popup_element = '#' + popup_id;

	console.log(swipers[gallery_num]);

	swipers[gallery_num].slideTo(gallery_index, 0);
	$(popup_element).css('display', 'flex');

	// $(".popup-gallery").css('display', 'none');
});
