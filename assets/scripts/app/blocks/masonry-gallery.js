
document.addEventListener("DOMContentLoaded", function () {
	lazy();
});

$('.lazyload').on('load', function () {
	$(this).parents('.masonry-item').css({ 'height': 'auto' });
	setTimeout(function () { masonryLayout(); }, 100); // wait to make sure css is applied before triggering layout
});

$(window).on('load', function () {
	masonryLayout();
});

function lazy() {
	let images = $(".lazyload");
	let lazy = new lazyload(images, {
		root: null,
		rootMargin: "0px",
		threshold: 0
	});
}

function masonryLayout() {
	$(".masonry-gallery").masonry({
		columnWidth: '.masonry-item',
		itemSelector: '.masonry-item',
		gutter: '.grid-sizer',
		transitionDuration: 0
	});

		// $(".masonry-gallery").each(function (index, element) {
	// 	var horizontalOrder = $(this).attr('maintainorder') == 1 ? true : false;

	// 	$(this).masonry({
	// 		columnWidth: '.masonry-item',
	// 		itemSelector: '.masonry-item',
	// 		gutter: '.grid-sizer',
	// 		horizontalOrder: horizontalOrder,
	// 		transitionDuration: 0
	// 	});

	// });

}



$(".masonry-item").on('click', function () {
	var gallery_item = $(this);
	var popup_id = gallery_item.parent().attr('id') + '-popup-swiper';
	var gallery_num = gallery_item.parent().attr('gallerynum');
	var gallery_index = parseInt(gallery_item.attr('galleryindex'));
	var popup_element = '#' + popup_id;

	swipers[gallery_num].slideTo(gallery_index, 0);
	$(popup_element).css({ 'opacity': '1', 'pointer-events': 'auto' });

	page.style.overflow = 'hidden'; // disable scroll on page while popup is open
});