$(document).ready(function() {
    // Click the logo to show the menu.
	$(document).on('click', '#header .column.logo a', function(event) {
		if($('#header').is('.offset')){
		    event.preventDefault();
		    $('#header').removeClass('offset');    
		}
	});
	
	$(document).on('click', '#header .menu-toggle', function(event) {
	    event.preventDefault();
		$('#header').toggleClass('menu-open');
		$(this).toggleClass('active');
	});
    
});
