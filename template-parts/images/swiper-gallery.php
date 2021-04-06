<div id="<?php echo $id?>" class="full-width-gallery">
		<!-- Slider main container -->
	<div class="swiper-container">
		<!-- Additional required wrapper -->
		<div class="swiper-wrapper">
			<!-- Slides -->
			<?php foreach( $gallery as $image ): ?>
			<div class="swiper-slide">
				<?php //print print_r($image['sizes'],TRUE); ?>
				<picture>
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