<?php
	get_header();
	get_template_part('template-parts/headers/site-header');

	// include( locate_template('template-parts/functions/get-project-year.php', false, false ));
	$theme = get_term_by('slug', get_query_var('theme'), 'general_submission_theme');

	$theme_loaded = !empty($theme) ? true : false;
?>

<article>
	<?php if (!$theme_loaded) {
		include(locate_template('page-templates/projects/archives/general-submissions-years.php', false, false )); 
	} else {
		include(locate_template('page-templates/projects/singles/single-general_submission_theme.php', false, false )); 
	} ?>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>