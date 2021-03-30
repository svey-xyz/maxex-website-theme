<?php 
        $image = get_sub_field('image');
        $textgroup = get_sub_field('text-group');
        $headline = $textgroup['headline'];
        $copy = $textgroup['copy'];
        $buttonlink = $textgroup['button_link'];
        $buttonlabel = $textgroup['button_label'];
        $link_style =  $textgroup['link-style'];
        $columns = $textgroup['columns'];
        $aboveheadline = $textgroup['above_headline'];
        $alignment = get_sub_field('alignment');
        $block_class = $block_class . ' ' . $alignment;
        //print print_r($alignment,TRUE);
?>

<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block full-width-wrapper <?php echo theme_block_handle() ?>">

	<div class="max-width-container align-image-<?php echo $alignment ?>">
		<div class="column image">
			<div class="box" >
			<picture>
				<source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width: 640px)">
				<source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1024px)">
				<img src="<?php print $image['url']; ?>"  alt="<?php print $image['alt']; ?>" />
			</picture>

			<?php if ($image_alt) : ?>
			<p class="annotation"><?php print $image_alt; ?></p>
			<?php endif ?>

		</div>
		</div>
		<div class="column copy <?php print $alignment; ?>">
			<div class="box">
			<?php if($aboveheadline): ?>
			<p class="aboveheadline"><?php print $aboveheadline; ?></div>
			<?php endif; ?>
			<h2><?php print $headline; ?></h2>

			<?php if ($copy) : ?>
				<p class="col-<?php print $columns; ?>"><?php print $copy; ?></p>
			<?php endif ?>

			<?php if($buttonlabel): ?>
			<p><a href="<?php print $buttonlink; ?>" class="text-link style-<?php echo $link_style ?>"><?php print $buttonlabel; ?></a></p>
			<?php endif; ?>
			</div>
		</div>
	</div>
    
    
</section>