<?php 
	$image = get_sub_field('full_width_image');
	$gapless = get_sub_field('edge_to_edge');
	//print print_r($image,TRUE);
?>

<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block full-width-image">
 
	<?php if (!$gapless): ?>
		<div class="full-width-wrapper">
			<div class="max-width-container">
	<?php endif; ?>
	
				<div class="column image <?php if ($gapless) { echo 'gapless'; } ?>">
					<picture>
						<source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width: 640px)">
						<source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1024px)">
						<source srcset="<?php print $image['sizes']['laptop']; ?>" media="(min-width: 1400px)">
						<img src="<?php print $image['url']; ?>"  alt="<?php print $image['alt']; ?>" />
					</picture>
					
					<p class="caption"><?php print $image['caption']; ?></p>
				</div>

	<?php if (!$gapless): ?>
			</div>
		</div>
	<?php endif; ?>
    
</section>


