<?php
    $gallery = get_sub_field('full_width_gallery');
    //print print_r($gallery,TRUE);
?>
<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
<div class="column">
   <div class="gallery">
            <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach( $gallery as $image ): ?>
                <div class="swiper-slide">
                    <?php //print print_r($image['sizes'],TRUE); ?>
                    <picture>
                        <source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width: 640px)">
                        <source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1024px)">
                        <source srcset="<?php print $image['sizes']['laptop']; ?>" media="(min-width: 1400px)">
                        <img class="swiper-lazy" src="<?php print $image['url']; ?>" alt="<?php print $image['alt']; ?>" />
                    </picture>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</div>
</section>