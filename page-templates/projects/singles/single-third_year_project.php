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
	
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>