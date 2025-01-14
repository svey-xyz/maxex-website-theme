<?php
// 
// Site header
// 

	$logo_size = get_field('logos', 'option')['logo_size'] . 'px';

	if( have_rows('colours', 'option') ) {
		while( have_rows('colours', 'option') ) {
			the_row();

			$header_group = get_sub_field('main_header_styles');

			$background_colour = $header_group['header_background_colour']; //#313d2c
			$menu_colour = $header_group['menu_background_colour']; //#556353
			$text_colour = $header_group['menu_text_colour'];
			$white_icons = $header_group['use_white_icons'] ? 'white-icons' : '';
			$logo_colour = $header_group['use_white_icons'] ? 'max_ex_logo_white' : 'max_ex_logo_colour';
		}
	 }

	if( have_rows('logos', 'option') ) {
		while( have_rows('logos', 'option') ) {
			the_row();
			$max_ex_logos = get_sub_field('max_ex_logos');
		}
	 }
?>

<header id="header" class="header">
<?php echo $background_colour; ?>
  	<div class="columns">
		<div style="background-color:<?php echo $background_colour; ?>" class="header-wrapper full-width-wrapper">
			<div class="header-content max-width-container">
				<div class="column logo">
					<a href=<?php echo $max_ex_logos['max_ex_logo_link']; ?>>
						<img style="height:<?php echo $logo_size; ?>;" id="logo" src="<?php print $max_ex_logos[$logo_colour] ?>">
					</a>
					<span style="height:<?php echo $logo_size; ?>;" class="menu-toggle <?php echo $white_icons; ?>">&nbsp;</span>
				</div>
			</div>
		</div>

		<div class="menu-wrapper full-width-wrapper">
			<div class="max-width-container">
				<div style="background-color:<?php echo $menu_colour; ?>" class="column menus">
					<?php
					
					theme_include_menu(28, 'mainFunctionNav', TRUE, $text_colour);
					// theme_include_menu(3, 'images');
					?>
				</div>
			</div>
		</div>
	</div>
	
</header>