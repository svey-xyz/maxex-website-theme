<?php
//
// Template Name: Thesis Projects (grid)
//
	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/blocks/blocks');

?>

<article class="full-width-wrapper ">
	<div class="max-width-container">
		<section class="cards-grid">
		<!-- <ul class="grid-items"> -->

			<?php
				$thesisProjectsQuery = new WP_Query(array(
					'post_type' => 'thesis_projects',
					'post_status' => 'publish',
					'posts_per_page' => -1
				));

				while ($thesisProjectsQuery->have_posts()) {
					$project = $thesisProjectsQuery->the_post();
					get_template_part('template-parts/cards/project-card');
				}
				wp_reset_query();
			?>

		<!-- </ul> -->
		</section>
	</div>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>