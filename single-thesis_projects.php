<?php
//
// Template Name: Thesis Projects (grid)
//
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
		<div class='project-statement'>
			<p><?php echo $statement ?></p>
		</div>
		<div class='project-content'>
			<!-- Deal with flexible content -->
			<?php
			if( have_rows('project-media') ):
				while ( have_rows('project-media') ) : the_row();

					// Case: gallery.
					if( get_row_layout() == 'gallery_layout' ):

						$gallery = get_sub_field('gallery');
						
						$grid_id = theme_block_handle() . '-' . get_row_index();

						// including template this way shares variables
						include( locate_template('template-parts/blocks/popup-swiper-gallery.php', false, false ));
						
						if( have_rows('gallery') ): ?>

							<section id="<?php echo $grid_id ?>" class="block thesis-gallery-grid">
								<div class="grid-sizer"></div>
								<?php $i = 0; foreach( $gallery as $image ): ?>
									<picture class="project-gallery-image" galleryIndex=<?php echo $i ?>>
										<img srcset="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
									</picture>

								<?php $i++; endforeach; ?>
								</section>

						<?php endif;

					// Case: Download layout.
					elseif( get_row_layout() == 'download' ): 
						$file = get_sub_field('file');
						// Do something...

					endif; // no more cases.
				endwhile; // end of flexible content.
			endif;
			?>
		</div>
	</div>
</article>

<?php

	get_template_part('template-parts/footers/site-footer');
	get_footer();
?>