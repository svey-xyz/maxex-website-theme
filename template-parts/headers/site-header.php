<?php
// 
// Site header
// 

$logos = get_field('logos', 'option');
?>

<header id="header" class="header">
  	<div class="columns">
		<div class="full-width-wrapper">
			<div class="header-content max-width-container">
				<div class="column logo">
					<a href="<?php echo get_permalink(16) // Home ?>">
						<img id="logo" src="<?php print $logos['max_ex_logo_white'] ?>">
					</a>
					<span class="menu-toggle">&nbsp;</span>
				</div>
			</div>
		</div>

		<div class="column menus">
			<?php
			theme_include_menu(28, 'mainFunctionNav', TRUE);
			// theme_include_menu(3, 'images');
			?>
		</div>
	</div>
	
</header>