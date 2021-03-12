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
