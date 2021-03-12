<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
    <?php 
        $image = get_sub_field('full_width_image');
        //print print_r($image,TRUE);
        ?>
 
    <div class="column image">
        <?php print print_r($image['sizes'],TRUE); ?>
        <picture>
            <source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width: 640px)">
            <source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1024px)">
            <source srcset="<?php print $image['sizes']['laptop']; ?>" media="(min-width: 1400px)">
            <img src="<?php print $image['url']; ?>"  alt="<?php print $image['alt']; ?>" />
        </picture>
        
        <p class="annotation"><?php print $image['alt']; ?></p>
    </div>
    
    
    
    
</section>