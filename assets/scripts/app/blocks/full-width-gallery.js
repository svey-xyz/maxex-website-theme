$(window).on('load', function () {
	console.log('swiper init');

    $(".full-width-gallery").each(function(index, element) {
		console.log('found one');

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

		block_swiper.activeIndex = 3;

    });
});
