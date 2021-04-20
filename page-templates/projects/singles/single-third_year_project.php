<?php
	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/blocks/blocks');

	$student = get_field('student_name');
	$statement = get_field('artist_statement');
	$project_year = get_term_by( 'id', get_field('project_year'), 'project_year' );

?>

<article class="thesis-project-layout full-width-wrapper ">
	<div class="max-width-container">
		<div class="project-title-section block">
			<h2><?php echo get_the_title() ?></h2>
			<h3><?php echo $student ?></h3>
		</div>
		<div class='project-content'>
			<!-- Handle flexible content -->
			<?php
			if (have_rows('thirdyear-project-media')) :
				while (have_rows('thirdyear-project-media')) :
					the_row();	
					include( locate_template('template-parts/blocks/' . theme_block_handle() . '.php'));
				endwhile;
			endif;
			?>
		</div>
		<div class='project-statement block'>
			<p><?php echo $statement ?></p>
		</div>
	</div>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>