<?php
	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/blocks/blocks');
	
?>

<article class="full-width-wrapper">
	<div class="max-width-container">

		<?php
			$thesisProjectsQuery = get_posts(array(
				'post_type' => 'thesis_project',
				'post_status' => 'publish',
				'posts_per_page' => -1
			));

			// setup for masonry block
			$masonry_items = array();
			$id = 'masonry_gallery_thesis_project';
			$overlay_enabled = false;
			$handle = 'masonry-gallery';
			$cover_enabled = true;
			$link_enabled = true;
			
			foreach ($thesisProjectsQuery as $project) {
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
	</div>
</article>

<?php
	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>