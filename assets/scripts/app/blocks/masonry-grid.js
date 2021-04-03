$(document).ready(function () {
	console.log('masonry loaded')

	$('.cards-grid').masonry({
		columnWidth: '.project-card',
		itemSelector: '.project-card',
		gutter: '.grid-sizer',
		// fitWidth: true,
		transitionDuration: 0
	});
});