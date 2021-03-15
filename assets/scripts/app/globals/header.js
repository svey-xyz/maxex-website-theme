$(document).ready(function() {
    // Click the logo to show the menu.
	$(document).on('click', '#header .column.logo a', function(event) {
		if($('#header').is('.offset')){
		    event.preventDefault();
		    $('#header').removeClass('offset');    
		}
	});
	
	
	// $(document).on('click', '#header .sub-menu-toggle', function(event) {
		
	//     event.preventDefault();
	//     $(this).parent().toggleClass('active');
	//     $(this).parent().blur();
	// });
	$(document).on('click', '#header .menu-toggle', function(event) {
	    event.preventDefault();
		$('#header').toggleClass('menu-open');
		$(this).toggleClass('active');

		var page = document.getElementsByTagName("body")[0];
		page.style.overflow = page.style.overflow === 'hidden' ? '' : 'hidden'; // disable scroll on page while popup is open
	});
    
});
