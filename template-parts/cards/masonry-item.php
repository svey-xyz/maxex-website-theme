<div class="masonry-item <?php if($overlay_enabled) { echo 'pop-up'; } ?>" galleryIndex=<?php echo $index ?>>
	<?php if ($cover_enabled): ?>
		<a class="card-link" href="<?php echo $item['link'] ?>" title="<?php echo $item['title'] ?>">
	<?php endif; ?>

    	<div class="card-content">
			
			<?php if($cover_enabled): ?>
				<div class="card-cover">
					<h3><?php echo $item['title']; ?><br></h3>
					<p><?php echo $item['sub']; ?></p>
				</div>
			<?php endif; ?>

			<?php if ($item['image']) : ?>
				<picture class="card-image">
					<img class="lazyload" data-srcset="<?php echo esc_url($item['image']['url']) ?>" alt="<?php echo esc_attr($item['image']['alt']) ?>">
				</picture>
			<?php endif ?>

      		<p class="student-name"><?php echo $item['sub']; ?></p>
    	</div>
  	<?php if ($cover_enabled): ?>
	  	</a>
	<?php endif; ?>
</div>