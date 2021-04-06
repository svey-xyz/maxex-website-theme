<?php
	$gallery = get_sub_field('gallery');
						
	$id = theme_block_handle() . '-' . get_row_index();

	// including template this way shares variables
	include( locate_template('template-parts/blocks/popup-swiper-gallery.php', false, false ));
	
	if( have_rows('gallery') ): ?>

		<section id="<?php echo $id ?>" class="block thesis-gallery-grid">
			<div class="grid-sizer"></div>
			<?php $i = 0; foreach( $gallery as $image ): ?>
				<picture class="project-gallery-image" galleryIndex=<?php echo $i ?>>
					<img srcset="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
				</picture>

			<?php $i++; endforeach; ?>
			</section>

	<?php endif;
?>