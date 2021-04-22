<?php
// 
// Site header
// 

// $logos = get_field('logos', 'option');

	 if( have_rows('logos', 'option') ) {
		while( have_rows('logos', 'option') ) {
			the_row();

			$max_ex_logos = get_sub_field('max_ex_logos');
		}
	 }
?>

<header id="header" class="header">
  	<div class="columns">
		<div class="header-wrapper full-width-wrapper">
			<div class="header-content max-width-container">
				<div class="column logo">
					<a href="/">
						<img id="logo" src="<?php print $max_ex_logos['max_ex_logo_black'] ?>">
					</a>
					<span class="menu-toggle">&nbsp;</span>
				</div>
			</div>
		</div>

		<div class="menu-wrapper full-width-wrapper">
			<div class="max-width-container">
				<div class="column menus">
					<?php
					theme_include_menu(28, 'mainFunctionNav', TRUE);
					// theme_include_menu(3, 'images');
					?>
				</div>
			</div>
		</div>
	</div>
	
</header>