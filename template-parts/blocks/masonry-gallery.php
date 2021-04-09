<?php
	$overlayEnabled = get_sub_field('enable_overlay');
	$gallery = get_sub_field('masonry_gallery');
	$handle = theme_block_handle();
	$id = $handle . '-' . get_row_index();

	// including template this way shares variables
	if ($overlayEnabled): 
		include( locate_template('template-parts/images/popup-swiper-gallery.php', false, false ));
	endif;
	
	if( have_rows('masonry_gallery') ): ?>

		<section id="<?php echo $id ?>" maintainOrder="<?php echo $overlayEnabled ?>" class="block <?php echo $handle ?>">
			<div class="grid-sizer"></div>
			<?php $i = 0; foreach( $gallery as $image ): ?>
				<picture class="masonry-item" galleryIndex=<?php echo $i ?>>
					<div class="masonry-popup-click"></div>
					<img srcset="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
				</picture>
			<?php $i++; endforeach; ?>
		</section>

	<?php endif;
?>