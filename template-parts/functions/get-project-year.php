<?php
	$years = get_terms(array(
		'taxonomy' => 'project_year',
		'hide_empty' => false,
	));

	$year_query = get_query_var('thesis-year');
	if ($year_query ) {
		$year_query = get_query_var('thesis-year');
	} else {
		$recent_year = 0;
		foreach ($years as $year) {
			
			if ($year->name > $recent_year) {
				$recent_year = $year->name;
			}

		}
		$year_query = $recent_year;
	}

	$year_term = get_term_by('name', $year_query, 'project_year');
?>