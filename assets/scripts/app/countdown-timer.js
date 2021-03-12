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