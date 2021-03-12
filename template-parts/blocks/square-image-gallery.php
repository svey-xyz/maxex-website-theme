<?php 
        $onethird = get_sub_field('one-third');
        $portrait = $onethird['portrait'];
        $headline = $onethird['headline'];
        $colour = $onethird['colour'];
        $button = $onethird['button'];
        $link = $onethird['link'];
        $alignment = $onethird['alignment'];
        $twothirds = get_sub_field('two-thirds');
        $gallery = $twothirds['gallery'];
        //print print_r($gallery,TRUE);
    ?>

<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
    <div class="column <?php print $alignment ?>">
        <div class="portrait">
            <a href="<?php print $link; ?>">
            <div class="js-tilt">
            <picture>
                <source srcset="<?php print $portrait['sizes']['medium_large']; ?>" media="(max-width:2880px)">
                <img src="<?php print $portrait['url']; ?>" alt="<?php print $portrait['alt']; ?>" />
            </picture>
            </div>
            </a>
            <div class="colourbox" style="background-color:<?php print $colour; ?>;">
                    <?php print $headline ?>
                    <?php if($button): ?>
                <p>
                    <a href="<?php print $link; ?>" class="text-link">
                        <?php print $button; ?>
                    </a>
                </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="gallery">
            
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach( $gallery as $image ): ?>
                    <div class="swiper-slide">
                        <picture>
                            <source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1920px)">
                            <img class="swiper-lazy" src="<?php print $image['url']; ?>" alt="<?php print $image['alt']; ?>" />
                        </picture>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>
</section>
    