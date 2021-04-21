<?php
	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/headers/third-year-header');
	get_template_part('template-parts/blocks/blocks');
	
?>

<div class="full-width-wrapper">
	<div class="max-width-container">
							
		<div id="content-marker"></div>
		<?php
			$thesisProjectsQuery = get_posts(array(
				'post_type' => 'third_year_project',
				'post_status' => 'publish',
				'posts_per_page' => -1
			));

			// setup for masonry block
			$masonry_items = array();
			$id = 'masonry_gallery';
			$overlay_enabled = false;
			$handle = 'masonry-gallery';
			$link_enabled = true;
			$cover_enabled = false;
			
			foreach ($thesisProjectsQuery as $project) {
				$item = array();

				// $item['title'] = $project->post_title;
				// $item['sub'] = get_field('student_name', $project);
				
				$item['link'] = get_post_permalink($project);
				$item['image'] = get_field('thumbnail', $project);

				$masonry_items[] = $item;
			}

			include( locate_template('template-parts/images/masonry-grid.php', false, false )); 

			wp_reset_query();
		?>
	</div>
</div>

<?php
	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>