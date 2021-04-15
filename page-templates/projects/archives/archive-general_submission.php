<?php
	get_header();
	get_template_part('template-parts/headers/site-header');

	include( locate_template('template-parts/functions/get-project-year.php', false, false ));
	$theme = get_term_by('slug', get_query_var('theme'), 'general_submission_theme');

?>

<article class="full-width-wrapper">
	<div class="max-width-container">
		<div class="grid-title-section block">
			<h2><?php echo 'General Submissions' ?></h2>
		</div>
		<p><?php echo $theme->name; ?></p>
		<div class="thesis-years">
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
		<div class="theme-grid block">
			<?php

				// $general_submissions_theme_query = get_terms(array(
				// 	'tax_query' => array(
				// 		array(
				// 			'taxonomy' => 'project_year',
				// 			'field' => 'name',
				// 			'terms' => $year_term,
				// 		),
				// 	),
				// 	'taxonomy' => 'general_submission_theme',
				// 	'hide_empty' => false,
				// ));
				$general_submissions_theme_query = get_terms(array(
                            'taxonomy'   => 'general_submission_theme',
                            'hide_empty' => false,
                            'meta_key'  => 'submission_year',
                            'meta_value' => $year_term->term_id
				));
				
				foreach ($general_submissions_theme_query as $theme) {
					include(locate_template('template-parts/cards/theme-card.php', false, false )); 
				}

				// include( locate_template('template-parts/images/masonry-grid.php', false, false )); 

				wp_reset_query();
			?>
		</div>
	</div>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>