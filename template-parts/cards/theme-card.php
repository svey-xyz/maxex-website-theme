<?php
	$title = $theme->name;
	$slug = $theme->slug;
	$description = $theme->description;
	$image = get_field('thumbnail', 'general_submission_theme_' . $theme->term_id);
	
?>

<a href="?theme=<?php echo $slug; ?>" class="theme-item">
	<picture class="card-image">
		<img class="lazyload" data-srcset="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
	</picture>
	<p class="theme-title"><?php echo $title; ?></p>
	<p class="theme-title"><?php echo $description; ?></p>
</a>