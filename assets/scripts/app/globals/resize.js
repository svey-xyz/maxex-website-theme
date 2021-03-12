$(document).ready(function() {
	////
	// React to window size and resizing events.
	var $window = $(window);
	var breakpoints = {mobile: 320,mobilelarge: 640, tablet: 768, laptop: 1024, widescreen: 1440};
	
	function checkWidth() {
	  var windowWidth = $window.width();	  
	  if (windowWidth < breakpoints.laptop) {
			$('body').addClass('mobile');
	  }else{
			$('body').removeClass('mobile');
	  }
	}
	checkWidth();
	$(window).resize(checkWidth);
	
});
