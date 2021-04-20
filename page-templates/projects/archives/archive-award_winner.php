<?php
	get_header();
	get_template_part('template-parts/headers/site-header');

	include( locate_template('template-parts/functions/get-project-year.php', false, false ));
	$theme = get_term_by('slug', get_query_var('theme'), 'general_submission_theme');

	$theme_loaded = !empty($theme) ? true : false;
	$title = $theme_loaded ? $theme->name : 'Award Winners';

?>

<article class="full-width-wrapper">
	<div class="max-width-container">
		<div class="project-title-section block">
			<h2><?php echo $title ?></h2>
		</div>

		<div class="project-years">
			<?php
			foreach ($years as $year):
				global $wp;
				$current_url = home_url( add_query_arg( array(), $wp->request ) );
				$query_url = add_query_arg('project-year', $year->name, $current_url);
				$class = '';
				if ($year_term->name == $year->name):
					$class = 'active-year';
				endif;
			?>
				<a href="<?php echo $query_url ?>"><span class=<?php echo $class ?>><?php echo $year->name; ?></span></a>
			<?php endforeach;?>
		</div>

		<div class="awards-grid block">
			<?php
				$award_winner_query = get_posts(array(
					'tax_query' => array(
						array(
							'taxonomy' => 'project_year',
							'field' => 'name',
							'terms' => $year_term,
						),
					),
					'post_type' => 'award_winner',
					'post_status' => 'publish',
					'posts_per_page' => -1
				));
				
				foreach ($award_winner_query as $award_winner) {
					include(locate_template('template-parts/cards/award-winner-card.php', false, false )); 
				}

				wp_reset_query();
			?>
		</div>

	</div>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>