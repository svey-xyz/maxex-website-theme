<?php 

        $card = get_sub_field('item-card');
        $image = $card['image'];
        $title = $card['title'];
        $description = $card['description'];
        $button = $card['button'];
        $link = $card['link'];
        $alignment = $card['alignment'];

        //print print_r($gallery,TRUE);
    ?>

<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
	<div class="full-width-wrapper">
	<div class="card max-width-container accent-colour">
		<div class="column <?php print $alignment ?>">
			<div class="card-image-section">
				<a href="<?php print $link; ?>">
					<picture>
						<source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width:2880px)">
						<img src="<?php print $image['url']; ?>" alt="<?php print $image['alt']; ?>" />
					</picture>
				</a>
			</div>

			<div class="card-title-section">
				<a href="<?php print $link; ?>"><h2 class="item-title accent-text"><?php print $title ?></h2></a>
				<p class="accent-text"><?php print $description; ?></p>
			</div>
		</div>
	</div>
</div>
</section>
    