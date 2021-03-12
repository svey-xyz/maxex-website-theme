<?php
// 
// Button link
//

$button_link = get_field('button-link');
$button_label = get_field('button-label');

if ($button_link && $button_label) :
?>
<a class="button style-outline theme-black" href="<?php echo esc_url($button_link) ?>" target="_blank"><?php echo $button_label ?></a>
<?php endif ?>