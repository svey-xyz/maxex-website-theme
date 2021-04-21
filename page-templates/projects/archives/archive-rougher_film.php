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

			foreach ($rougher_film_query as $film):
				$video_source = get_field('video_source', $film);
				$video = get_field('video', $film);
				$film_title = get_field('film_title', $film);
				$student_name = get_field('student_name', $film);
				$student_year = get_field('student_year', $film);
		?>
			<div class="film-item block">
				<div style="order:<?php echo $i % 2; ?>" class="film-attribution">
					<p class="student"><em><?php echo $student_name . "</em>, " . $student_year; ?></p>
					<p class="film-title"><?php echo $film_title; ?> </p>
				</div>
				<div style="order:<?php echo abs($i % 2); ?>" class="column video">
					<?php if($video_source == 'youtube'): ?>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php print $video; ?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<?php elseif($video_source == 'vimeo'): ?>
						<iframe src="https://player.vimeo.com/video/<?php print $video; ?>" width="560" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
					<?php endif; ?>
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