<?php
?>

<section id="<?php echo $id . '-popup-swiper' ?>" class="popup-gallery" gallerynum=<?php echo get_row_index()?>>
<!-- including template this way shares variables -->

<div class="full-width-wrapper">
	<div class="max-width-container">
		<span class="popup-gallery-close">CLOSE</span>
		<?php include( locate_template('template-parts/blocks/swiper-gallery.php', false, false )); ?>	
	</div>
</div>
</section>