<?php
//
// Template Name: General Submissions
//
	get_header();
	get_template_part('template-parts/headers/site-header');

	include( locate_template('template-parts/functions/get-project-year.php', false, false ));

?>

<article class="full-width-wrapper">
	<div class="max-width-container">
		<div class="grid-title-section block">
			<h2><?php echo get_the_title() ?></h2>
		</div>
		<div class="thesis-years">
		<?php
			foreach ($years as $year):
				$query_url = add_query_arg('thesis-year', $year->name, get_permalink());
				$class = '';
				if ($year_term->name == $year->name):
					$class = 'active-year';
				endif;
		?>
			<a href="<?php echo $query_url ?>"><span class=<?php echo $class ?>><?php echo $year->name; ?></span></a>
		<?php endforeach;?>
		</div>
		<section class="thesis-projects-grid block">
		<!-- <ul class="grid-items"> -->
			<?php
				$thesisProjectsQuery = new WP_Query(array(
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

				while ($thesisProjectsQuery->have_posts()) {
					$project = $thesisProjectsQuery->the_post();
					get_template_part('template-parts/cards/project-card');
				}
				wp_reset_query();
			?>

			<div class="grid-sizer"></div>

		<!-- </ul> -->
		</section>
	</div>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>