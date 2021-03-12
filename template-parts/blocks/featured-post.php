<?php 
    if(!$listing){
        $featured_post = get_sub_field('featured_post');
        $alignment = get_sub_field('alignment');
        $buttonlabel = get_sub_field('buttonlabel');
    }
    
    $block_class = $block_class . ' ' . $alignment;
    //print print_r($featured_post,TRUE);
    
    //post title & excerpt
    $post_title = get_field('post_title',$featured_post->ID);
    $post_excerpt = get_field('post_excerpt',$featured_post->ID);
    
    //image sizes
    $image_url = get_the_post_thumbnail_url( $featured_post->ID,'full');
    $image_medium = get_the_post_thumbnail_url( $featured_post->ID,'medium');
    $image_medium_large = get_the_post_thumbnail_url( $featured_post->ID,'medium_large');
    $image_large = get_the_post_thumbnail_url( $featured_post->ID,'large');
    
    //thumbnail ID class
    $image_thumbnail_id = get_post_thumbnail_id( $featured_post->ID );
    
    //alt tag
    $image_alt = get_post_meta($image_thumbnail_id, '_wp_attachment_image_alt', true);
    
?>
<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">

    <div class="column image">
        <div class="box js-tilt" >
        <a href="<?php print get_permalink($featured_post->ID); ?>">
        <picture>
            <source srcset="<?php print $image_medium_large; ?>" media="(max-width: 640px)">
            <source srcset="<?php print $image_medium_large; ?>" media="(max-width: 1920px)">
            <img src="<?php print $image_url; ?>"  alt="<?php print $image_alt; ?>" />
        </picture>
       <p class="annotation"><?php print $image_alt; ?></p>
       </a>
       </div>
    </div>
    
    <div class="column copy <?php print $alignment; ?>">
        <div class="box">
        <h2><?php print $post_title; ?></h2>
        <?php print $post_excerpt; ?>
        <?php if($buttonlabel): ?>
        <p><a href="<?php print get_permalink($featured_post->ID); ?>" class="text-link"><?php print $buttonlabel; ?></a></p>
        <?php endif; ?>
        </div>
    </div>
    
</section>