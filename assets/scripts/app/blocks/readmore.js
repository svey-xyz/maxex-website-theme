
$(document).on('click', '.read-more', function (event) {
	var $tar = $(event.target);
	var parentID = $tar.attr('block-parent');

	console.log($tar)

	if ($tar.hasClass('open')) {
		$('#' + parentID + '-moreText').removeClass('open');
		$tar.removeClass('open');
		$tar.html('Read More...')

	} else {	
		$('#' + parentID + '-moreText').addClass('open');
		$tar.addClass('open');
		$tar.html('Show Less...')
	}
});