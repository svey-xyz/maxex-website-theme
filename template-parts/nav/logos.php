<?php

	$logo_size = get_field('logos', 'option')['logo_size'] . 'px';

	if( have_rows('logos', 'option') ) {
		while( have_rows('logos', 'option') ) {
			the_row();

			$max_ex_logos = get_sub_field('max_ex_logos');
			$ryerson_logos = get_sub_field('ryerson_logos');
		}
	 }
?>

<section class="logo-nav">
	<a href=<?php echo $max_ex_logos['max_ex_logo_link']; ?>>
		<img style="max-height:<?php echo $logo_size; ?>;" id="logo" src="<?php print $max_ex_logos['max_ex_logo_colour'] ?>">
	</a>
	<a href=<?php echo $ryerson_logos['ima_logo_link']; ?>>
		<img style="max-height:<?php echo $logo_size; ?>;" id="logo" src="<?php print $ryerson_logos['ima_logo_colour'] ?>">
	</a>
	<a href=<?php echo $ryerson_logos['ryerson_logo_link']; ?>>
		<img style="max-height:<?php echo $logo_size; ?>;" id="logo" src="<?php print $ryerson_logos['ryerson_logo_colour'] ?>">
	</a>
</section>
