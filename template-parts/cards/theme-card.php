<?php
	$title = $theme->name;
	$slug = $theme->slug;
	$description = $theme->description;
	$image = get_field('thumbnail', 'general_submission_theme_' . $theme->term_id);
	
?>

<div class="theme-item">
	<a href="?theme=<?php echo $slug; ?>" class="theme-link">
		<picture class="card-image">
			<img class="lazyload" data-srcset="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
		</picture>
		<h3 class="theme-title"><?php echo $title; ?></h3>
	</a>
	<p class="theme-description"><?php echo $description; ?></p>
</div>