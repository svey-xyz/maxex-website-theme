var swipers = {};
let page

$(window).on('load', function () {
	page = document.getElementsByTagName("body")[0];

	$(".full-width-gallery").each(function (index, element) {

		var block_id = $(this).attr('id');
		var gallery_num = $(this).attr('gallerynum');
		var block_element = '#' + block_id;

		swipers[gallery_num] = new Swiper(block_element + ' .swiper-container', {
			loop: false,
			slidesPerView: 1,
			spaceBetween: 0,
			noSwipingClass: 'swiper-no-swiping',
			navigation: {
				nextEl: block_element + ' .swiper-button-next',
				prevEl: block_element + ' .swiper-button-prev',
			}
		});
	});

});

$(".popup-gallery-close").on('click', function () {
	$(".popup-swiper-gallery").css({'opacity': '0', 'pointer-events': 'none'});
	page.style.overflow = ''; // enable scroll on page while popup is closed
});

$(".masonry-popup-click").on('click', function () {
	var gallery_item = $(this).parent();
	var popup_id = gallery_item.parent().attr('id') + '-popup-swiper';
	var gallery_num = gallery_item.parent().attr('gallerynum');
	var gallery_index = parseInt(gallery_item.attr('galleryindex'));
	var popup_element = '#' + popup_id;

	swipers[gallery_num].slideTo(gallery_index, 0);
	$(popup_element).css({ 'opacity': '1', 'pointer-events': 'auto' });

	page.style.overflow = 'hidden'; // disable scroll on page while popup is open
});
