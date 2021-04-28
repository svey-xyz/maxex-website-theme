<div class="full-width-wrapper">
	<div class="max-width-container">
		<?php
			$overlay_enabled = get_sub_field('enable_overlay');
			
			$images = get_sub_field('masonry_gallery');
			$handle = theme_block_handle();
			$id = $handle . '-' . get_row_index();

			$masonry_items = array();

			global $student;

			foreach ($images as $gal_img) {
				$item = array();

				$item['title'] = $gal_img['alt'];
				$item['sub'] = $gal_img['caption'];
				
				$item['link'] = '';
				$item['image'] = $gal_img;

				$caption = $student;
				$item['image']['caption'] = $gal_img['caption'] !== '' ? $caption . ', ' . $gal_img['caption'] : $caption;

				$masonry_items[] = $item;
			}
			
			if( have_rows('masonry_gallery') ):
				include( locate_template('template-parts/images/masonry-grid.php', false, false ));
			endif;
		?>
	</div>
</div>