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