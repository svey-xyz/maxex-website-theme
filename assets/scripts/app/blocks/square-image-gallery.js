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
