<?php 
$headline = get_sub_field('headline');
$copy = get_sub_field('copy');
$link = get_sub_field('link');
$link_style = $link['link-style'];
$alignment = get_sub_field('alignment');
$block_class = $block_class . ' ' . $alignment;    
?>
<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block full-width-wrapper <?php echo theme_block_handle() ?>">
	<div class="max-width-container">
		<div class="column headline">
			<div class="box">
			<h2><?php print $headline; ?></h2>
		
			<?php if($link['label']): ?>
				<?php //print print_r($link,TRUE); ?>
				<a href="<?php print $link['link']; ?>" class="text-link style-<?php echo $link_style ?>"><?php print $link['label']; ?></a>
			<?php endif; ?>
			</div>
		</div>
		
		<div class="column text">
			<div class="box">
				<div class="copy">
					<?php print $copy; ?>
				</div>
			</div>
		</div>
	</div>
    
</section>