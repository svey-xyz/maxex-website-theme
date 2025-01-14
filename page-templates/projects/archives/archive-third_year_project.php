<?php
	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/headers/third-year-header');
	get_template_part('template-parts/blocks/blocks');
	
?>

<style type = "text/css"> 
	.third-year-header {
		position: sticky;
		top: 0;
		z-index: 11;
	}

</style>

<div class="full-width-wrapper">
	<div class="max-width-container">
							
		<div id="content-marker"></div>
		<?php
			$thirdYearProjectsQuery = get_posts(array(
				'post_type' => 'third_year_project',
				'post_status' => 'publish',
				'posts_per_page' => -1
			));

			// setup for masonry block
			$masonry_items = array();
			$id = 'masonry_gallery_third_year';
			$overlay_enabled = false;
			$handle = 'masonry-gallery';
			$link_enabled = true;
			$cover_enabled = true;
			
			foreach ($thirdYearProjectsQuery as $project) {
				// setup_postdata( $project );
				$item = array();

				$item['title'] = $project->post_title;
				$item['sub'] = get_field('student_name', $project);
				
				$item['link'] = get_post_permalink($project);
				$item['image'] = get_field('thumbnail', $project);

				$masonry_items[] = $item;
			}

			// wp_reset_postdata();

			include( locate_template('template-parts/images/masonry-grid.php', false, false )); 

			wp_reset_query();
		?>
	</div>
</div>

<?php
	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>