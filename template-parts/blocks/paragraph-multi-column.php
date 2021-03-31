<?php 
$copy = get_sub_field('copy');
$columns = get_sub_field('columns');
?>
<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="full-width-wrapper block <?php echo theme_block_handle() ?>">
	<div class="max-width-container">
		<div class="column">
			<div class="copy col-<?php print $columns; ?>">
				<?php print $copy; ?>
			</div>
		</div>
	</div>
</section>