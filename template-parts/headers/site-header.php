<?php
// 
// Site header
// 

$logos = get_field('logos', 'option');
?>
<div id="header-padding" class="header-padding"></div>

<header id="header" class="header full-width-wrapper">
  	<div class="columns">
	  	<div class="header-content max-width-container">
    		<div class="column logo">
      			<a href="<?php echo get_permalink(16) // Home ?>">
        			<img id="logo" src="<?php print $logos['function_logo_black'] ?>">
      			</a>
     			 <span class="menu-toggle">&nbsp;</span>
			</div>
		</div>
    	
		<div class="column menus">
			<?php
			theme_include_menu(2, 'mainFunctionNav', TRUE);
			// theme_include_menu(3, 'images');
			?>
		</div>
	</div>
	
</header>