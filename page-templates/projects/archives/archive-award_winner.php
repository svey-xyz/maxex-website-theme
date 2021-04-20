<?php
	get_header();
	get_template_part('template-parts/headers/site-header');

	$theme = get_term_by('slug', get_query_var('theme'), 'general_submission_theme');

	$theme_loaded = !empty($theme) ? true : false;
	$title = $theme_loaded ? $theme->name : 'Award Winners';

?>

<article class="full-width-wrapper">
	<div class="max-width-container">
		<div class="project-title-section block">
			<h2><?php echo $title ?></h2>
		</div>

		<div class="awards-grid block">
			<?php
				$award_winner_query = get_posts(array(
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