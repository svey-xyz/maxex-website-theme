<?php
	$overlay_enabled = get_sub_field('enable_overlay');
	
	$gallery = get_sub_field('masonry_gallery');
	$handle = theme_block_handle();
	$id = $handle . '-' . get_row_index();

	$masonry_items = array();

	foreach ($gallery as $gal_img) {
		$item = array();

		$item['title'] = $gal_img['alt'];
		$item['sub'] = $gal_img['caption'];
		
		$item['link'] = '';
		$item['image'] = $gal_img;

		$masonry_items[] = $item;
	}

	// including template this way shares variables
	if ($overlay_enabled): 
		include( locate_template('template-parts/images/popup-swiper-gallery.php', false, false ));
	endif;
	
	if( have_rows('masonry_gallery') ):
		include( locate_template('template-parts/images/masonry-grid.php', false, false ));
	endif;
?>