<section id="<?php echo $id ?>" maintainOrder="<?php echo $overlayEnabled ?>" class="block <?php echo $handle ?>">
	<div class="grid-sizer"></div>
	<?php
		$index = 0;
		foreach( $masonry_items as $item ):
			include( locate_template('template-parts/cards/masonry-item.php', false, false ));
			$index++;
		endforeach;
	?>
</section>