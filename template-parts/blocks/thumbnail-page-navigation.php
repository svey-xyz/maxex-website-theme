<?php 
	$copy = get_sub_field('copy');
	$columns = get_sub_field('columns');
	$constrain = get_sub_field('short_width');
	$line_height = get_sub_field('line_height');
?>

<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="full-width-wrapper block <?php echo theme_block_handle() ?>">
	<div class="max-width-container">
		<div class="thumbnail-group-wrapper">
			<?php
			if (have_rows('thumbnail_items')):
				while (have_rows('thumbnail_items')): the_row();

					$image = get_sub_field('thumbnail_image');
					$page_object = get_sub_field('page_object');
					$link = get_permalink($page_object->ID);
					$title = get_the_title($page_object->ID);
				?>
					<a href="<?php echo $link; ?>" class="thumbnail-navigation-container">
						<div class="thumbnail-cover">
							<h3><?php echo $title; ?></h3>
						</div>
						<picture>
							<source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width: 640px)">
							<source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1024px)">
							<source srcset="<?php print $image['sizes']['laptop']; ?>" media="(min-width: 1400px)">
							<img src="<?php print $image['url']; ?>"  alt="<?php print $image['alt']; ?>" />
						</picture>
					</a>
				<?php endwhile;
			endif;
			?>
		</div>
	</div>
</section>