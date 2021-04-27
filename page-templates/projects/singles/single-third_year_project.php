<?php
	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/headers/third-year-header');

	$student = get_field('student_name');
	$image = get_field('thumbnail');

?>

<style type = "text/css"> 
	.paragraph-multi-column {
		padding-top: 100px;
		padding-bottom: 100px;
	}

	.third-year-header {
		padding-bottom: 55px;
		padding-top: 55px;
		box-shadow: none;
	}
</style>

<article class="third-year-project-layout">
	
	<div class="project-heading-section block">
		<div class="header-image">
			<picture>
				<source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width: 640px)">
				<source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1024px)">
				<source srcset="<?php print $image['sizes']['laptop']; ?>" media="(min-width: 1400px)">
				<img src="<?php print $image['url']; ?>"  alt="<?php print $image['alt']; ?>" />
			</picture>
		</div>

		<div class="full-width-wrapper">
			<div class="max-width-container block">
				<h3><?php echo $student ?></h3>
			</div>
		</div>
	</div>

	<div class='project-content'>
		<!-- Handle flexible content -->
		<?php get_template_part('template-parts/blocks/blocks'); ?>
	</div>
	<p>



	<div class="full-width-wrapper">
		<div class="max-width-container block">
			<?php

			$thirdYearProjectsQuery = get_posts(array(
				'post_type' => 'third_year_project',
				'post_status' => 'publish',
				'posts_per_page' => -1
			));

			$prev_post;
			$next_post;
			$my_ID = get_the_ID();
			$i = 0;

			foreach ($thirdYearProjectsQuery as $project) {
				if ($project->ID == $my_ID) {
					//add checks for start and end of array
					$next_post = $thirdYearProjectsQuery[$i + 1]->ID;
					$prev_post = $thirdYearProjectsQuery[$i - 1]->ID;

					break;
				}
				$i += 1;
			}

			if($prev_post):
				$prev_student = get_field('student_name', $prev_post);
			?>
				<a rel="prev" href="<?php echo get_permalink($prev_post); ?>" title="<?php echo $prev_student?>" class="third-year-project-nav">
					Previous Project - <strong><?php echo $prev_student; ?></strong>
				</a>

			<?php
			endif;

			
			if($next_post):
				$next_student = get_field('student_name', $next_post);
			?>
				<a style="float:right;"rel="prev" href="<?php echo get_permalink($next_post); ?>" title="<?php echo $next_student?>" class="third-year-project-nav">
					Next Project - <strong><?php echo $next_student; ?></strong>
				</a>
			<?php endif; ?>
		</div>
	</div>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>