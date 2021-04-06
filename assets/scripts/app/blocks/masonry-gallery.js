$(window).on('load', function () {
	$('.thesis-projects-grid').masonry({
		columnWidth: '.project-card',
		itemSelector: '.project-card',
		gutter: '.grid-sizer',
		// fitWidth: true,
		transitionDuration: 0
	});

	

	$('.thesis-gallery-grid').masonry({
		columnWidth: '.project-gallery-image',
		itemSelector: '.project-gallery-image',
		gutter: '.grid-sizer',
		horizontalOrder: true,
		// fitWidth: true,
		transitionDuration: 0
	});
});