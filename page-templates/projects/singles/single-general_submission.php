<?php
	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/blocks/blocks');

	$student = get_field('student_name');
	$statement = get_field('artist_statement');
	$project_year = get_term_by( 'id', get_field('project_year'), 'project_year' );
	$is_thesis_project = true;

?>

<article class="thesis-project-layout full-width-wrapper ">
	<div class="max-width-container">
		<div class='project-title block'>
			<h2><?php echo get_the_title() ?></h2>
			<h3><?php echo $post->description?></h3>
		</div>
		<div class='project-content'>
			<!-- Handle flexible content -->
			<?php
			if (have_rows('project-media')) :
				while (have_rows('project-media')) :
					the_row();	
					include( locate_template('template-parts/blocks/' . theme_block_handle() . '.php'));
				endwhile;
			endif;
			?>
		</div>
		<div class='project-statement block'>
			<p><?php echo $statement ?></p>
		</div>
	</div>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>

<?php
			$general_submissions_query = get_posts(array(
				'tax_query' => array(
					array(
						'taxonomy' => 'project_year',
						'field' => 'name',
						'terms' => $year_term,
					),
				),
				'post_type' => 'general_submission',
				'post_status' => 'publish',
				'posts_per_page' => -1
			));

			// setup for masonry block
			$masonry_items = array();
			$id = 'masonry_gallery';
			$overlayEnabled = false;
			$handle = 'masonry-gallery';
			$cover_enabled = true;
			
			foreach ($general_submissions_query as $project) {
				$item = array();

				$item['title'] = $project->post_title;
				$item['sub'] = get_field('student_name', $project);
				
				$item['link'] = get_post_permalink($project);
				$item['image'] = get_field('thumbnail', $project);

				$masonry_items[] = $item;
			}

			include( locate_template('template-parts/images/masonry-grid.php', false, false )); 

			wp_reset_query();
		?>	