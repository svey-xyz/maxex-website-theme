<?php
//
// Template Name: Site Portal
// 
	get_header(); //needed to properly load styling

	$portal_1 = get_field('portal_options_1');
	$portal_2 = get_field('portal_options_2');
	$portal_3 = get_field('portal_options_3');

?>

<div class="portal-page">
	<div id="portal-container" class="portal-container">
		<?php get_template_part('template-parts/cards/portal-item-card', 'portal-1', $portal_1) ?>
		<?php get_template_part('template-parts/cards/portal-item-card', 'portal-2', $portal_2) ?>
		<?php get_template_part('template-parts/cards/portal-item-card', 'portal-3', $portal_3) ?>
	</div>
</div>

<?php get_footer() ?>