<?php 
	$heading = get_sub_field('section_heading');
	$image = get_sub_field('image');
	$copy = get_sub_field('copy');
	$section_colour = get_sub_field('section_colour');
	$heading_colour = get_sub_field('heading_colour');
	$copy_colour = get_sub_field('copy_colour');
?>


<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
	<div style="background-color:<?php echo $section_colour?>;" class="colour-block">
		<div class="full-width-wrapper">
			<div class="max-width-container">

				<h3 style="color:<?php echo $heading_colour?>;"><?php echo $heading; ?></h3>
	
				<div class="column image">
					<picture>
						<source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width: 640px)">
						<source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1024px)">
						<source srcset="<?php print $image['sizes']['laptop']; ?>" media="(min-width: 1400px)">
						<img src="<?php print $image['url']; ?>"  alt="<?php print $image['alt']; ?>" />
					</picture>
				</div>

				<h4 style="color:<?php echo $copy_colour?>;"><?php echo $copy; ?></h4>
			</div>
		</div>
	</div>
    
</section>