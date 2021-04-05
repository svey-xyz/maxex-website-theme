<?php
	$id = theme_block_handle() . '-swiper-' . get_row_index();	
?>

<section id="<?php echo $id ?>" class="popup-gallery">
<!-- including template this way shares variables -->

<div class="full-width-wrapper">
	<div class="max-width-container">
		<?php include( locate_template('template-parts/blocks/swiper-gallery.php', false, false )); ?>	
	</div>
</div>
</section>