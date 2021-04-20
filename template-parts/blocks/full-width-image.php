<?php 
	$image = get_sub_field('full_width_image');
	$gapless = get_sub_field('edge_to_edge');
	//print print_r($image,TRUE);
	$id = theme_block_handle() . '-' . get_row_index();
	include( locate_template('template-parts/images/full-width.php', false, false )); 
?>


