<?php $title = $theme_loaded ? $theme->name : 'General Submissions'; ?>

<div class="full-width-wrapper">
	<div class="max-width-container">
		<div class="project-title-section block">
			<h2><?php echo $title ?></h2>
		</div>

		<div class="project-statement block">
			<p><?php echo $theme->description;?></p>
		</div>
	</div>
</div>

<div class="general-theme-submissions">

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

		foreach ($general_submissions_query as $submission):
			$submission_type = get_field('submission_type', $submission);
			
			$title = get_field('submission_title', $submission);
			$student_name = get_field('student_name', $submission);
			$year = get_field('student_year', $submission);

			$caption = '<em>' . $title . '</em>, ' . $student_name . ', ' . $year;

			if (have_rows('submission', $submission)) {
				while (have_rows('submission', $submission)) {
					the_row();
					get_template_part('template-parts/blocks/' . theme_block_handle());
				}
			}

		?>

		<div class="full-width-wrapper">
			<div class="max-width-container">
				<p><?php echo $caption; ?></p>
			</div>
		</div>

		<?php endforeach;
		wp_reset_query();
	?>

</div>