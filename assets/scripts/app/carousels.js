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