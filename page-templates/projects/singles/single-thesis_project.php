<?php
	get_header();
	get_template_part('template-parts/headers/site-header');

	global $student;
	$student = get_field('student_name');
	$statement = get_field('artist_statement');

?>

<div class="thesis-project-layout full-width-wrapper ">
	<div class="max-width-container">
		<div class="project-title-section block">
			<h2><?php echo get_the_title() ?></h2>
			<h3><?php echo $student ?></h3>
		</div>
	</div>

	<div class='project-content'>
		<!-- Handle flexible content -->
		<?php get_template_part('template-parts/blocks/blocks'); ?>
	</div>

	<div class="max-width-container">		
		<div class='project-statement block'>
			<p><?php echo $statement ?></p>
		</div>
	</div>
	
</div>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>