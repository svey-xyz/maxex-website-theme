<?php
	get_header();
	get_template_part('template-parts/headers/site-header');

	include( locate_template('template-parts/functions/get-project-year.php', false, false ));

?>

<article class="full-width-wrapper">
	<div class="max-width-container">
		<div class="grid-title-section block">
			<h2><?php echo 'Thesis Projects' ?></h2>
		</div>
		<div class="thesis-years">
			<?php
			foreach ($years as $year):
				global $wp;
				$current_url = home_url( add_query_arg( array(), $wp->request ) );
				$query_url = add_query_arg('thesis-year', $year->name, $current_url);
				$class = '';
				if ($year_term->name == $year->name):
					$class = 'active-year';
				endif;
			?>
				<a href="<?php echo $query_url ?>"><span class=<?php echo $class ?>><?php echo $year->name; ?></span></a>
			<?php endforeach;?>
		</div>
		<?php
			$thesisProjectsQuery = get_posts(array(
				'tax_query' => array(
					array(
						'taxonomy' => 'project_year',
						'field' => 'name',
						'terms' => $year_term,
					),
				),
				'post_type' => 'thesis_project',
				'post_status' => 'publish',
				'posts_per_page' => -1
			));

			// setup for masonry block
			$masonry_items = array();
			$id = 'masonry_gallery';
			$overlayEnabled = false;
			$handle = 'masonry-gallery';
			$cover_enabled = true;
			
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