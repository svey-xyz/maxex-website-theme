
$(document).on('click', '.smooth-scroll-to', function (event) {
	var $tar = $(event.target);
	var destination = $tar.attr('scroll-loc');
	console.log(destination);
	let e = document.getElementById(destination);
	e.scrollIntoView({
		block: 'start',
		behavior: 'smooth',
		inline: 'start'
	});
});