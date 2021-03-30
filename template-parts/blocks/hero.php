<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
    <div class="column">
       <div class="gallery">
            <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php if( have_rows('hero') ): while ( have_rows('hero') ) : the_row(); ?>
                
                <?php $image = get_sub_field('image');
                    $colour = get_sub_field('colour');
                    $copy = get_sub_field('copy');
                    $button = get_sub_field('button');
                    $link = get_sub_field('link');
					$align = get_sub_field('text_align');
                ?>
                <?php //print print_r($image,TRUE) ?>
                <div class="swiper-slide">
                    <div class="year"><p>FUNCTION <?php print date('Y'); ?></p></div>
                    
                    <picture>
                        <source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width: 640px)">
                        <source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1024px)">
                        <source srcset="<?php print $image['sizes']['laptop']; ?>" media="(max-width: 1600px)">
                        <img class="swiper-lazy" src="<?php print $image['url']; ?>" alt="<?php print $image['alt']; ?>" />
                    </picture>
					<?php if($copy): ?>
						<div style="background-color:<?php print $colour; ?>e8" class="card full-width-wrapper">
							<div class="text-container max-width-container" style="text-align:<?php print $align; ?>">
								<?php print $copy; ?>
								<?php if($button): ?>
									<a class="text-link" href="<?php print $link; ?>"><?php print $button; ?></a>
								<?php endif; ?>
							</div>
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
						</div>
					<?php endif; ?>
                </div>
                <?php  endwhile; endif; ?>
            </div>
            
        </div>
        </div>
    </div>
    
    
</section>