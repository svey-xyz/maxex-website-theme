<div class="project-statement block">
	<p><?php echo $theme->description;?></p>
</div>

<?php
	$general_submissions_query = get_posts(array(
		'tax_query' => array(
			array(
				'taxonomy' => 'general_submission_theme',
				// 'field' => 'name',
				'terms' => $theme,
			),
		),
		'post_type' => 'general_submission',
		'post_status' => 'publish',
		'posts_per_page' => -1
	));

	// setup for masonry block
	$masonry_items = array();
	$id = 'theme-masonry-gallery';
	$overlay_enabled = true;
	$handle = 'masonry-gallery';
	$cover_enabled = true;

	$i = 0;

	foreach ($general_submissions_query as $submission) {
		$sub = get_field('submission', $submission);
		
		$image = $sub['image'];
		$image['alt'] = $sub['image_title'] . ', ' . $sub['student_name'] . ', ' . $sub['student_year'];

		$id = 'full-width-image-' . $i;
		$gapless = false;
		
		include( locate_template('template-parts/images/full-width.php', false, false )); 

		$i++;

	}

	// include( locate_template('template-parts/images/masonry-grid.php', false, false )); 

	wp_reset_query();
?>