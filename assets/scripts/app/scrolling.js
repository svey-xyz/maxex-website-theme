$(function() {

  if ($('.js-horizontal-scrolling').length) {

    $('body').addClass('overflow-y-disable');
    
    scrollConverter.activate();
  }
});