<?php
	$main_stylesheet = get_field('colours', 'option')['site_styles'];
	$stylesheet_ref = $main_stylesheet;
	$sub_style_set = false;

	$page_ID = get_the_ID();
	$post_type = get_post_type();
	// $is_that_page = 'No it is not';

	if( have_rows('colours', 'option') ) {
		while( have_rows('colours', 'option') ) {
			the_row();

			if (have_rows('page_styles')) {
				while (have_rows('page_styles')) {
					the_row();
					$style_type = get_sub_field('style_type');

					if ($style_type == 'page') {
						$style_page_id = get_sub_field('page')->ID;
						
						if ($style_page_id == $page_ID) {
							$stylesheet_ref = get_sub_field('styles');
							$sub_style_set = true;
						}
					} elseif ($style_type == 'project') {
						$style_post_type = get_sub_field('project_type');
						
						if ($style_post_type == $post_type) {
							$stylesheet_ref = get_sub_field('styles');
							$sub_style_set = true;
						}
					}
				}
			}
		}
	}

	// Set any values that were left blank on the sub style sheet with values from main style sheet
	if ($sub_style_set) {
		foreach ($main_stylesheet as $style => $value) {		
			if (!$stylesheet_ref[$style]) {	
				$stylesheet_ref[$style] = $value;
			}
		}
	}
	
	

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head() ?>

	<style type = "text/css"> 

		<?php
			$test_var = '';
			$typefaces = array();

			foreach ($stylesheet_ref['typefaces'] as $typeface):
				$font_type = $typeface['font_type'];

				$typefaces[$font_type]['typeface_link'] = $typeface['typeface_link'];
				$typefaces[$font_type]['font_family'] = $typeface['font_family'];
// $test_var = 'made it';

			// if (have_rows($stylesheet_ref['typefaces'])):
			// 	$test_var = 'made it';
			// 	while (have_rows($stylesheet_ref['typefaces'])):
					
			// 		the_row();
			// 		$font_type = get_sub_field('font_type');
			// 		echo $font_type;
			// 		$typefaces[$font_type]['typeface_link'] = get_sub_field('typeface_link');
			// 		$typefaces[$font_type]['font_family'] = get_sub_field('font_family');
		?>
				@import url('<?php echo $typefaces[$font_type]['typeface_link'] ?>');

		<?php
				endforeach;
		?>
		

		body {
			<?php if ($stylesheet_ref['background_image']): ?>
				background-image: url(<?php echo $stylesheet_ref['background_image']; ?>);
				background-position: top left;
			<?php endif; ?>
			<?php if ($stylesheet_ref['background_image_tile']): ?>
				background-repeat: repeat;
			<?php else: ?>
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: fixed;
			<?php endif;?>
			
			background-color: <?php echo $stylesheet_ref['background_colour']; ?>; 
		}

		.accent-colour {
			background-color: <?php echo $stylesheet_ref['accent_colour']; ?>!important; 
			color: <?php echo $stylesheet_ref['accent_text_colour']; ?>!important;
			border-color: <?php echo $stylesheet_ref['accent_text_colour']; ?>!important;
		}

		.accent-text {
			color: <?php echo $stylesheet_ref['accent_text_colour']; ?>!important;
		}

		h1, h2 {
			font-family: <?php echo $typefaces['heading']['font_family']; ?> !important;
			color: <?php echo $stylesheet_ref['heading_colour']; ?>; 
		}

		label, h3, h4, h5, h6 {
			font-family: <?php echo $typefaces['sub_heading']['font_family']; ?> !important;
			color: <?php echo $stylesheet_ref['sub_heading_colour']; ?>; 
		}

        p { 
			font-family: <?php echo $typefaces['paragraph']['font_family']; ?> !important;
        	color: <?php echo $stylesheet_ref['paragraph_colour']; ?>; 
        }

		a {
			color: <?php echo $stylesheet_ref['link_colour']; ?>; 
		}
    </style> 

</head>
<body style="background-color:<?php echo $primary_background_colour; ?>; color:<?php echo $primary_text_colour; ?>" <?php body_class() ?>>
	<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<main>
		<?php echo $test_var; ?>