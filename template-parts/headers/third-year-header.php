<?php
	$title = get_field('archive_title', 11877);
	$link = get_permalink(11877);

	if( have_rows('colours', 'option') ) {
		while( have_rows('colours', 'option') ) {
			the_row();

			$header_group = get_sub_field('third_year_header_styles');

			$background_colour = $header_group['thirdyear_header_background_colour'];
			$heading_colour = $header_group['thirdyear_header_heading_colour'];
		}
	}
?>

<div style="background-color:<?php echo $background_colour; ?>;" class="third-year-header">
	<div class="full-width-wrapper">
		<div class="max-width-container">
	 		<a href='<?php echo $link; ?>'><h2 style="color:<?php echo $heading_colour; ?>;"><?php echo $title; ?></h2></a>
		</div>
	</div>
</div>