<?php
	$id = theme_block_handle() . '-swiper-' . get_row_index();	
	$gallery = get_sub_field('full_width_gallery');
?>

<section id="<?php echo $id ?>" class="block full-width-wrapper">
<div class="max-width-container">
   	<!-- including template this way shares variables -->
	<?php include( locate_template('template-parts/blocks/swiper-gallery.php', false, false )); ?>
</div>
</section>