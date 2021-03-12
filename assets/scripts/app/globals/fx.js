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
