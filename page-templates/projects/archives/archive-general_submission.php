<?php
	get_header();
	get_template_part('template-parts/headers/site-header');

	// include( locate_template('template-parts/functions/get-project-year.php', false, false ));
	$theme = get_term_by('slug', get_query_var('theme'), 'general_submission_theme');

	$theme_loaded = !empty($theme) ? true : false;
?>

<article>
	<?php if (!$theme_loaded): get_template_part('template-parts/blocks/blocks'); ?>

		<div class="full-width-wrapper">
			<div class="max-width-container">
				<div class="theme-grid block">
					<?php
						$general_submissions_theme_query = get_terms(array(
									'taxonomy'   => 'general_submission_theme',
									'hide_empty' => false
						));
						
						foreach ($general_submissions_theme_query as $theme) {
							include(locate_template('template-parts/cards/theme-card.php', false, false )); 
						}
						
						wp_reset_query();
					?>
				</div>
			</div>
		</dvi>

	<?php else:
		include(locate_template('page-templates/projects/singles/single-general_submission_theme.php', false, false )); 
	endif; ?>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>