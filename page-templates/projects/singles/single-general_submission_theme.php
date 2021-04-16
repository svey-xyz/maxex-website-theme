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

	foreach ($general_submissions_query as $submission) {
		$sub = get_field('submission', $submission);
		$item = array();

		$item['title'] = $sub['image_title'];
		$item['sub'] = $sub['student_name'];
		
		$item['link'] = '';
		$item['image'] = $sub['image'];
		$item['image']['caption'] = $item['title'] . ', ' . $item['sub'] . ', ' . $sub['student_year'];

		$masonry_items[] = $item;
	}

	include( locate_template('template-parts/images/masonry-grid.php', false, false )); 

	wp_reset_query();
?>