<?php 
$copy = get_sub_field('copy');
$columns = get_sub_field('columns');
$constrain = get_sub_field('short_width');
$line_height = get_sub_field('line_height');
?>
<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="full-width-wrapper block <?php echo theme_block_handle() ?>">
	<div class="max-width-container">
		<div class="column <?php if ($constrain) { echo 'constrain'; } ?>">
			<div style="line-height: <?php echo $line_height?>;" class="copy col-<?php print $columns; ?>">
				<?php print $copy; ?>
			</div>
		</div>
	</div>
</section>