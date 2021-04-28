<?php
	get_header();
	get_template_part('template-parts/headers/site-header');

	global $student;
	$student = get_field('student_name');
	$statement = get_field('artist_statement');

?>

<div class="thesis-project-layout">
	<div class="full-width-wrapper">
		<div class="max-width-container">
			<div class="project-title-section block">
				<h2><?php echo get_the_title() ?><span>, <?php echo $student ?></span></h2>
			</div>
		</div>
	</div>

	<div class='project-content'>
		<!-- Handle flexible content -->
		<?php get_template_part('template-parts/blocks/blocks'); ?>
	</div>

	<div class="full-width-wrapper">
		<div class="max-width-container">		
			<div class='project-statement block'>
				<p><?php echo $statement ?></p>
			</div>
		</div>
	</div>

	<div class="full-width-wrapper">
		<div class="max-width-container project-nav-section block">
			<?php

			$thesisProjectsQuery = get_posts(array(
				'post_type' => 'thesis_project',
				'post_status' => 'publish',
				'posts_per_page' => -1
			));

			$prev_post;
			$next_post;
			$my_ID = get_the_ID();
			$i = 0;

			foreach ($thesisProjectsQuery as $project) {
				if ($project->ID == $my_ID) {
					//add checks for start and end of array
					$next_post = $thesisProjectsQuery[$i + 1]->ID;
					$prev_post = $thesisProjectsQuery[$i - 1]->ID;

					break;
				}
				$i += 1;
			}

			if($prev_post):
				$prev_student = get_field('student_name', $prev_post);
			?>
				<a rel="prev" href="<?php echo get_permalink($prev_post); ?>" title="<?php echo $prev_student?>" class="thesis-project-nav">
					<p>Previous Project - <strong><?php echo $prev_student; ?></strong></p>
				</a>

			<?php
			endif;

			
			if($next_post):
				$next_student = get_field('student_name', $next_post);
			?>
				<a rel="prev" href="<?php echo get_permalink($next_post); ?>" title="<?php echo $next_student?>" class="thesis-project-nav right">
					<p>Next Project - <strong><?php echo $next_student; ?></strong></p>
				</a>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>