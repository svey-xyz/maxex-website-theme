<?php 
        $portal = $args;
        $image = $portal['background_image'];
        $title = $portal['site_title'];
        $description = $portal['site_description'];
        $link = $portal['site_link'];

        // print print_r($portal,TRUE);
?>

<a class="portal-item" href="<?php print $link; ?>">
	<div class="background-image">
		<picture>
			<source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width:2880px)">
			<img src="<?php print $image['url']; ?>" alt="<?php print $image['alt']; ?>" />
		</picture>
	</div>

	<div class="image-cover"></div>

	<div class="portal-text">
		<h2 class="portal-title"><?php print $title ?></h2>
		<p class="portal-description"><?php print $description ?></p>
	</div>
</a>