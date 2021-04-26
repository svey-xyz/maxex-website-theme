<?php get_template_part('template-parts/blocks/blocks'); ?>

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