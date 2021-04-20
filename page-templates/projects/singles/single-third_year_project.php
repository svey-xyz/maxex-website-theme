<?php
	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/headers/third-year-header');

	$student = get_field('student_name');
	$statement = get_field('artist_statement');

?>

<article class="thesis-project-layout">
	<div class="full-width-wrapper">
		<div class="max-width-container">
			<div class="project-title-section block">
				<h2><?php echo get_the_title() ?></h2>
				<h3><?php echo $student ?></h3>
			</div>
		</div>
	</div>

	<div class='project-content'>
		<!-- Handle flexible content -->
		<?php get_template_part('template-parts/blocks/blocks'); ?>
	</div>
	
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>