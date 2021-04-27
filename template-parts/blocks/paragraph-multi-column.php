<?php 
	$copy = get_sub_field('copy');
	$columns = get_sub_field('columns');
	$line_height = get_sub_field('line_height');
	$constrain = get_sub_field('short_width') ? 'constrain' : '';
	$collapsable = get_sub_field('collapsable') ? 'collapsable' : '';

	$block_id = theme_block_handle() . '-' . get_row_index();
?>

<section id="<?php echo $block_id; ?>" class="full-width-wrapper block <?php echo theme_block_handle() ?>">
	<div class="max-width-container">
		<div class="column <?php echo $constrain . ' ' . $collapsable ?>">
			<div style="line-height: <?php echo $line_height?>;" class="copy col-<?php print $columns; ?>">
				<?php
					list($short_text, $more_text) = explode('<p><!--more--></p>', $copy);
					echo $short_text;

					if ($more_text):
				?>
					<div id="<?php echo $block_id . '-moreText'; ?>" class="collapsible-content"><?php echo $more_text; ?></div>

					<p style="text-align: center;">
						<em id="<?php $block_id . '-readMore'; ?>" block-parent="<?php echo $block_id; ?>" class="read-more">
							Read More...
						</em>
					</p>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>