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

<div class="theme-grid block">
	<?php
		$general_submissions_theme_query = get_terms(array(
					'taxonomy'   => 'general_submission_theme',
					'hide_empty' => false,
					'meta_key'  => 'submission_year',
					'meta_value' => $year_term->term_id
		));
		
		foreach ($general_submissions_theme_query as $theme) {
			include(locate_template('template-parts/cards/theme-card.php', false, false )); 
		}

		wp_reset_query();
	?>
</div>