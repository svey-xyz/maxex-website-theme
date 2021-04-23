<?php

	$handle = theme_block_handle();
	$id = $handle . '-' . get_row_index();

?>


<section id="<?php echo $id ?>" class="block  <?php echo $handle ?>">
<div class="full-width-wrapper">
	<div class="max-width-container">
		<div class="embed-container">
			<?php
				$embed_type = get_sub_field('embed_type');

				if ($embed_type == 'oembed') :
					$embed = get_sub_field('embed');

					if ($embed) :
					?>
						<div class="embed">
							<?php echo $embed ?>
						</div>
					<?php
					endif;
				elseif ($embed_type == 'iframe') :
					$iframe = get_sub_field('iframe');

					if ($iframe) :
					?>
						<div class="iframe-wrapper">
							<?php echo $iframe; ?>
						</div>
					<?php
					endif;
				endif;  
			?>
		</div>
	</div>
			</div>
</section>

