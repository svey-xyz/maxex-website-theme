<?php
	get_header();
	get_template_part('template-parts/headers/site-header');
	get_template_part('template-parts/blocks/blocks');

	$student = get_field('student_name');
	$statement = get_field('artist_statement');

?>

<article class="thesis-project-layout full-width-wrapper ">
	<div class="max-width-container">
		<div class='project-title'>
			<h2><?php echo get_the_title() ?></h2>
			<h3><?php echo $student ?></h3>
		</div>
		<div class='block project-statement'>
			<p><?php echo $statement ?></p>
		</div>
		<div class='project-content'>
			<!-- Handle flexible content -->
			<?php
			if (have_rows('project-media')) :
				while (have_rows('project-media')) :
					the_row();	
					get_template_part('template-parts/blocks/' . theme_block_handle());
				endwhile;
			endif;
			?>
		</div>
	</div>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>