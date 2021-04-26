$(document).ready(function() {
    // Click the logo to show the menu.
	$(document).on('click', '#header .column.logo a', function(event) {
		if($('#header').is('.offset')){
		    event.preventDefault();
		    $('#header').removeClass('offset');    
		}
	});

	$(document).on('click', function (event) {

		if ($('#header').hasClass('menu-open')) {
			$('#header').removeClass('menu-open');
			$('#header .menu-toggle').removeClass('active');
		} else if ($(event.target).hasClass('menu-toggle')) {
			event.preventDefault();
			$('#header').addClass('menu-open');
			$(event.target).addClass('active');
		}
	});
});
