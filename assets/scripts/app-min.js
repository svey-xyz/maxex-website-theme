// @codekit-append "app/globals/fx.js";
// @codekit-append "app/globals/header.js";
// @codekit-append "app/globals/resize.js";

// @codekit-append "app/blocks/full-width-gallery.js";
// @codekit-append "app/blocks/hero-inner.js";
// @codekit-append "app/blocks/hero.js";
// @codekit-append "app/blocks/square-image-gallery.js";
// @codekit-append "app/blocks/video.js";

// @codekit-append "app/progress-bar.js";

// @codekit-append "app/carousels.js";
// @codekit-append "app/countdown-timer.js";
// @codekit-append "app/drawers.js";
// @codekit-append "app/scrolling.js";
// @codekit-append "app/waves-effect.js";

$(document).ready(function() {
    $.fn.extend({
        pageTransition: function(transition, link) {

            if (transition == 'out') {
                $('.block').removeClass('loaded');
                if (link) {
                    window.location = link;
                }

            }
            if (transition == 'in') {

                // Fade in each block.
                var $blocks = $('.block');
                var delay_time = 500;
                $blocks.each(function(index, block) {
                    setTimeout(function() {
                        $(block).addClass('loaded');
                        //console.log(index);
                    }, delay_time)
                    delay_time += 500;
                });
                
                // Fade in images within blocks when they are ready.
                $('.block').each(function(index, el) {
                    $(el).imagesLoaded({},
                        function() {
                            $('img', el).addClass('loaded');
                        }
                    );
                });

            }
        }
    });
    $.fn.pageTransition('in');

    ////
    // Apply page transitions to links from the header and footer menus.
    $(document).on('click', '#header .column.menus a,#footer .column.menus a', function(event) {
        event.preventDefault();
        var href = $(this).attr('href');
        $.fn.pageTransition('out', href);
    });

});


$(document).ready(function() {
    // Click the logo to show the menu.
	$(document).on('click', '#header .column.logo a', function(event) {
		if($('#header').is('.offset')){
		    event.preventDefault();
		    $('#header').removeClass('offset');    
		}
	});
	
	
	$(document).on('click', '#header .sub-menu-toggle', function(event) {
		
	    event.preventDefault();
	    $(this).parent().toggleClass('active');
	    $(this).parent().blur();
	});
	$(document).on('click', '#header .menu-toggle', function(event) {
	    event.preventDefault();
		$('#header').toggleClass('menu-open');
		$(this).toggleClass('active');

		var page = document.getElementsByTagName("body")[0];
		page.style.overflow = page.style.overflow === 'hidden' ? '' : 'hidden'; // disable scroll on page while popup is open
	});
    
});


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


$(document).ready(function() {

    $(".block.full-width-gallery").each(function(index, element) {

        var block_id = $(this).attr('id');
        var block_element = '#' + block_id;
        var block_swiper = new Swiper(block_element + ' .swiper-container', {
            loop: true,
            navigation: {
                nextEl: block_element + ' .swiper-button-next',
                prevEl: block_element + ' .swiper-button-prev',
            },
            slidesPerView: 'auto',
            spaceBetween: 45
        });

    });
});


$(document).ready(function() {

    $(".block.hero-inner").each(function(index, element) {

        var block_id = $(this).attr('id');
        var block_element = '#' + block_id;
        var block_swiper = new Swiper(block_element + ' .swiper-container', {
            loop: false,
            navigation: {
                nextEl: block_element + ' .swiper-button-next',
                prevEl: block_element + ' .swiper-button-prev',
            }
        });
        
    });
});


$(document).ready(function() {

    $(".block.hero").each(function(index, element) {

        var block_id = $(this).attr('id');
        var block_element = '#' + block_id;
        var block_swiper = new Swiper(block_element + ' .swiper-container', {
            loop: false,
            navigation: {
                nextEl: block_element + ' .swiper-button-next',
                prevEl: block_element + ' .swiper-button-prev',
            }
        });
        
    });
    
});


$(document).ready(function() {

    $(".block.square-image-gallery").each(function(index, element) {

        var block_id = $(this).attr('id');
        var block_element = '#' + block_id;
        var block_swiper = new Swiper(block_element + ' .swiper-container', {
            loop: true,
            autoHeight: true,
            slidesPerView: 'auto',
            spaceBetween: 45,
            navigation: {
                nextEl: block_element + ' .swiper-button-next',
                prevEl: block_element + ' .swiper-button-prev',
            }
        });
        $(block_element + ' .swiper-container').imagesLoaded({},
            function() {
                block_swiper.update();
            }
        );
    });

});


$(document).ready(function() {

    $(".block.video").fitVids();
    $(".project-media").fitVids();
    
});


//
// Progress bar
//

$(function() {
  
  var $progressBar = $('.js-progress-bar');
  
  if ($progressBar.length > 0) {
    var progressBarElement = $('.js-progress-bar')[0];
    var progressBarOptions = {
      duration: 8000, // ~ 9s
      color: 'rgba(255, 255, 255, 0.5)'
    }
    var progressBar = new ProgressBar.Line(progressBarElement, progressBarOptions);
  }

  $.fn.extend({
    resetProgressBar: function() {
      var $progressBar = $('.js-progress-bar');
      
      if ($progressBar.length > 0) {
        progressBar.set(0);
      }
    },
    stopProgressBar: function() {
      $('.js-progress-bar').addClass('is-hidden'); // or progressBar.destroy();
    },
    pauseProgressBar: function() {
      var $progressBar = $('.js-progress-bar');
      
      if ($progressBar.length > 0) {
        progressBar.stop();
        progressBar.set(0);
      }
    },
    animateProgressBar: function(duration) {
      var $progressBar = $('.js-progress-bar');
      
      if ($progressBar.length > 0) {
        progressBar.animate(1, { duration: duration });
      }
    }
  });
  
  // 
  $.fn.animateProgressBar(8000);
});

//
// Carousels
//
// NOTE also see app/blocks for additional Swiper implementations
//

$(function() {
  
  $.fn.extend({
    
    initCarousel: function(carousel) {
      
      var namespace = {
        containerModifierClass: 'carousel-items-wrapper-',
        wrapperClass: 'carousel-items',
        slideClass: 'carousel-item',
        slideActiveClass: 'carousel-item-active',
        slideDuplicateActiveClass: 'carousel-item-duplicate-active',
        slideVisibleClass: 'carousel-item-visible',
        slideDuplicateClass: 'carousel-item-duplicate',
        slideNextClass: 'carousel-item-next',
        slideDuplicateNextClass: 'carousel-item-duplicate-next',
        slidePrevClass: 'carousel-item-prev',
        slideDuplicatePrevClass: 'carousel-item-duplicate-prev'
      }
      
      // args
      var args = {
        effect: 'fade',
        fadeEffect: {
          crossFade: true
        },
        loop: true,
        speed: 450,
        navigation: {
          prevEl: carousel.find('.prev-button'),
          nextEl: carousel.find('.next-button')          
        },
        allowTouchMove: false,
        autoHeight: true, // carousel slides should be same height, this enables resizing after ghost pixel is replaced by lazysizes data-srcset
      }
      
      // auto-advance
      if (carousel.hasClass('js-auto-advance')) {
        
        var $progress_bar = carousel.find('.carousel-progress-bar');
        
        var auto_args = {
          autoplay: {
            delay: 8000,
          },
          on: {
            init: function() {
              window.dispatchEvent(new Event('resize')); // fixes some odd swiper inits.
            },
            slideChangeTransitionStart: function() {
              $.fn.resetProgressBar();
            },
            slideChangeTransitionEnd: function() {
              $.fn.animateProgressBar(8000);
            },
            sliderMove: function () {
              $.fn.stopCarousel(carousel);
            },
          }
        }
        
        $.extend(args, auto_args);
      }
            
      // namespace
      $.extend(args, namespace);
      
      // init.
      var carouselContainer = carousel.find('.carousel-items-wrapper');
      var carousel = new Swiper(carouselContainer[0], args);
    },
    /*
    stopCarousel: function(carousel) {
      
      var swiper = carousel.find('.carousel-items-wrapper')[0].swiper;
      swiper.autoplay.stop();
      
      carousel.removeClass('js-auto-advance');
      
      $.fn.stopProgressBar();
    },
    */
    initCarousels: function() {

      $('.js-carousel').each(function() {
        $.fn.initCarousel($(this));    
      });
    }
  });
  
  // init.
  $.fn.initCarousels();
  
  // hide progress-bar when carousels manually clicked
  /*
  $(document).on('click', '.carousel .carousel-nav button', function(){
    $(this).closest('.carousel').find('.carousel-progress-bar').addClass('is-hidden');
  });
  */
});

//
// Countdown timer
//

$(function() {

  $('.js-countdown-timer').countdown('04/30/2020 17:00:00').on('update.countdown', function(event) {
    var $this = $(this).html(event.strftime(''
      + '<div class="timer-segment"><span class="numeral-characters">%-D</span> <span class="label-text">day%!D</span></div> '
      + '<div class="timer-segment"><span class="numeral-characters">%-H</span> <span class="label-text">hr%!H</span></div> '
      + '<div class="timer-segment"><span class="numeral-characters">%-M</span> <span class="label-text">min%!M</span></div> '
      + '<div class="timer-segment"><span class="numeral-characters">%-S</span> <span class="label-text">sec%!S</span></div>'));
  });
});

//
// Drawer
//

$(function() {

  $.fn.extend({
    openDrawer: function(drawer) {

      drawer.addClass('is-open');

      // close other open
      $('.drawer').not(drawer).removeClass('is-open');
    },
    closeDrawer: function(drawer) {

      drawer.removeClass('is-open');
    },
    closeDrawers: function() {

      // close all
      $('.drawer').each(function() {
        $.fn.closeDrawer($(this));
      });
    },
    toggleDrawer: function(drawer) {

      if (drawer.is('.is-open')) {
        $.fn.closeDrawer(drawer);
      } else {
        $.fn.openDrawer(drawer);
      }
    }
  });

  // click...
  $('.js-drawer-button').click(function(event){
    
    event.preventDefault();

    var drawerSelector = '.' + $(this).data('drawer');
    var $drawer = $(drawerSelector);

    // open / close
    $.fn.toggleDrawer($drawer);
  });
});

$(function() {

  if ($('.js-horizontal-scrolling').length) {

    $('body').addClass('overflow-y-disable');
    
    scrollConverter.activate();
  }
});

//
// Waves
//

$(function() {

  // buttons
  Waves.attach('.button');
  
  // tile-links
  //Waves.attach('.tile-link', ['waves-light', 'waves-block']);
  
  Waves.init();
});