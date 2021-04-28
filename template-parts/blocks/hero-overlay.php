<?php
	$heading = get_sub_field('heading');
	$arrow_link = get_sub_field('arrow_link');
	$buttons = array();
	$gallery = get_sub_field('gallery');

	$i = 0;
	if (have_rows('buttons')):
		while ( have_rows('buttons')):
			the_row();
			$buttons[$i]['text'] = get_sub_field('button_text');
			$buttons[$i]['link'] = get_sub_field('button_link');

			$buttons[$i]['accent_colour'] = get_sub_field('accent_colour');
			$buttons[$i]['background_colour'] = get_sub_field('background_colour');
			$buttons[$i]['background_opacity'] = get_sub_field('background_opacity');

			$i++;
		endwhile;
	endif;

	
	// $buttons[0]['has'] = get_sub_field('button_one');
	// $button_text = get_sub_field('button') ? get_sub_field('button_text') : null;
	// $button_link = get_sub_field('button') ? get_sub_field('button_link') : null;
	
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
					<div class="bottom-half-overlay">
						<div class="buttons-container">
						<?php
							if ($buttons):
								foreach ($buttons as $button):
						
						?>
							<div class="overlay-button">
								
								
								<?php if($button['link'][0] == '#'): ?>
									<p style="color: <?php echo $button['accent_colour']?>;" class="smooth-scroll-to" scroll-loc="<?php echo $button['link']; ?>">
										<?php echo $button['text']; ?>
									</p>
								<?php else: ?>
									<a target="_blank" href="<?php echo $button['link']; ?>">
										<p style="color: <?php echo $button['accent_colour']?>;">
											<?php echo $button['text']; ?>
										</p>
									</a>
								<?php endif; ?>
								</a>
								<div style="background-color: <?php echo $button['background_colour']?>; opacity: <?php echo $button['background_opacity']?>;" class="button-cover"></div>
							</div>

						<?php
								endforeach;
							endif;
						?>
						</div>
						
						<div class="overlay-arrow smooth-scroll-to" scroll-loc="<?php echo $arrow_link; ?>"></div>
					</div>


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