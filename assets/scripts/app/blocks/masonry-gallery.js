$(window).on('load', function () {
	$('.thesis-projects-grid').masonry({
		columnWidth: '.project-card',
		itemSelector: '.project-card',
		gutter: '.grid-sizer',
		// fitWidth: true,
		transitionDuration: 0
	});


	$(".masonry-gallery").each(function (index, element) {
		
		var horizontalOrder = $(this).attr('maintainorder') == 1 ? true : false;

		$(this).masonry({
			columnWidth: '.masonry-item',
			itemSelector: '.masonry-item',
			gutter: '.grid-sizer',
			horizontalOrder: horizontalOrder,
			transitionDuration: 0
		});

	});
});