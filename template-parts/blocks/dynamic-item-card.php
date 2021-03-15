<?php 
        $card = get_sub_field('item-card');
        $portrait = $card['portrait'];
        $title = $card['title'];
        $description = $card['description'];
        $button = $card['button'];
        $link = $card['link'];
        $alignment = $card['alignment'];

        // $twothirds = get_sub_field('two-thirds');
        // $gallery = $twothirds['gallery'];
        //print print_r($gallery,TRUE);
    ?>

<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
	<div class="card">
		<div class="column <?php print $alignment ?>">
			<div class="card-image-section">
				<a href="<?php print $link; ?>">
					<picture>
						<source srcset="<?php print $portrait['sizes']['medium_large']; ?>" media="(max-width:2880px)">
						<img src="<?php print $portrait['url']; ?>" alt="<?php print $portrait['alt']; ?>" />
					</picture>
				</a>
			</div>

			<div class="card-title-section">
				<h2 class="item-title"><?php print $title ?></h2>
				<?php if($button): ?>
					<p><a href="<?php print $link; ?>" class="text-link">
						<?php print $button; ?>
					</a></p>
				<?php endif; ?>
			</div>

			<div class="card-description-section">
				<p><?php print $description; ?></p>
			</div>
		</div>
	</div>
</section>
    