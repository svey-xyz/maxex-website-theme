<div id="<?php echo $id?>" class="full-width-gallery">
		<!-- Slider main container -->
	<div class="swiper-container">
		<!-- Additional required wrapper -->
		<div class="swiper-wrapper">
			<!-- Slides -->
			<?php foreach( $gallery as $image ): ?>
			<div class="swiper-slide">
				<picture>
					<img class="swiper-lazy" src="<?php print $image['url']; ?>" alt="<?php print $image['alt']; ?>" />
				</picture>
				<p class="image-caption"><?php 
					echo $image['caption'];
				?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<!-- If we need navigation buttons -->
		
	</div>
	<div class="swiper-button-prev swiper-no-swiping"></div>
	<div class="swiper-button-next swiper-no-swiping"></div>
</div>