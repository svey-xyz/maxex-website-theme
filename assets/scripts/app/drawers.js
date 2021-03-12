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