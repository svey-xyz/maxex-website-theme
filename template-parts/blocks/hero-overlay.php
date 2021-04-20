<?php
	$heading = get_sub_field('heading');
	$button_text = get_sub_field('button') ? get_sub_field('button_text') : null;
	$gallery = get_sub_field('gallery');
?>

<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
    <div class="column">
		<div class="gallery-overlay">

					<div class="overlay-heading">
						<div class="full-width-wrapper">
							<div class="max-width-container">
								<h3><?php echo $heading; ?></h3>
							</div>
						</div>
						
					</div>
					<?php if ($button_text): ?>
						<div class="overlay-button">
							<p><?php echo $button_text; ?></p>
						</div>
					<?php endif; ?>
					<div class="overlay-arrow"></div>

		</div>
       	<div class="gallery">
			<!-- Slider main container -->
			<div class="swiper-container">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<?php foreach ($gallery as $image): ?>

						<div class="swiper-slide">                
							<picture>
								<source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width: 640px)">
								<source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1024px)">
								<source srcset="<?php print $image['sizes']['laptop']; ?>" media="(max-width: 1600px)">
								<img class="swiper-lazy" src="<?php print $image['url']; ?>" alt="<?php print $image['alt']; ?>" />
							</picture>
						</div>
					<?php  endforeach; ?>
				</div>
			</div>
        </div>
    </div>
</section>