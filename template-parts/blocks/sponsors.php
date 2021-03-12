<?php 
$images = get_sub_field('sponsors');
$text = get_sub_field('text');
$size = 'full';
//print print_r($image,TRUE);
?>
<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">

 
    <div class="column image">
        <p><?php print $text; ?></p>
    <?php
        if( $images ): ?>
        <ul>
            <?php foreach( $images as $image ): ?>
                <li>
                	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
        
    </div>
    
</section>