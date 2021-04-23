<?php
$layouts = array('post_layout', 'page_layout');

foreach ($layouts as $layout) :
  	if (have_rows($layout)) :
    	while (have_rows($layout)) :
      		the_row();

			get_template_part('template-parts/blocks/' . theme_block_handle());

    	endwhile;
  	endif;
endforeach;