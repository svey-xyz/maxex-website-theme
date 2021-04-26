<?php
	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/blocks/blocks');

?>


<article class="rougher-films-layout full-width-wrapper">
	<div class="max-width-container">
		<?php
			$rougher_film_query = get_posts(array(
				'post_type' => 'rougher_film',
				'post_status' => 'publish',
				'posts_per_page' => -1
			));
			
			$i = 0;

			foreach ($rougher_film_query as $submission):
				$video_source = get_field('video_source', $submission);
				$video = get_field('video', $submission);
				$film_title = get_field('film_title', $submission);
				$student_name = get_field('student_name', $submission);
				$student_year = get_field('student_year', $submission);
		?>
			<div class="film-item block">
				<?php if (have_rows('submission', $submission)) {
					while (have_rows('submission', $submission)) {
						the_row();
						get_template_part('template-parts/blocks/' . theme_block_handle());
					}
				} ?>

				<div class="film-attribution">
					<p class="student"><em><?php echo $student_name . "</em>, " . $student_year; ?></p>
					<p class="film-title"><?php echo $film_title; ?> </p>
				</div>
			</div>

		<?php
			$i++;
			endforeach;
			
			wp_reset_query();
		?>
	</div>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>