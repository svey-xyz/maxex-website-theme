<?php 
        $copy = get_sub_field('copy');
        $button = get_sub_field('button');
        $link = get_sub_field('link');
        $image = get_sub_field('image');
        $logo = get_sub_field('logo');
        $colour = get_sub_field('colour');
        $alignment = get_sub_field('alignment');
    ?>

<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block full-width-wrapper <?php echo theme_block_handle() ?>">

<div class="column max-width-container <?php print $alignment ?>">
    <div style="background-color:<?php print $colour ?>;" class="colour">
        <?php print $copy ?>
         <?php if($button): ?>
            <p><a class="text-link" href="<?php print $link; ?>"><?php print $button; ?></a></p>
        <?php endif; ?>
          <picture>
            <source srcset="<?php print $logo['sizes']['large']; ?>" media="(max-width: 1024px)">
            <img class="logo" src="<?php print $logo['url']; ?>"  alt="<?php print $logo['alt']; ?>" />
        </picture>
    </div>
    <div class="image">
        <picture>
            <source srcset="<?php print $image['sizes']['medium_large']; ?>" media="(max-width: 640px)">
            <source srcset="<?php print $image['sizes']['large']; ?>" media="(max-width: 1024px)">
            <img src="<?php print $image['url']; ?>"  alt="<?php print $image['alt']; ?>" />
        </picture>
    </div>
   
</div>

</section>
    