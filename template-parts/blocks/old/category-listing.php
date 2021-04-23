<?php 
    $category = get_sub_field('category');
    $buttonlabel = get_sub_field('button');
    global $post;
    $category_posts = get_posts(array(
        'posts_per_page' => -1,
        'cat'       => $category
    ));
?>
<?php if($category_posts): ?>
<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
    <?php
        $index = 1;
        foreach ( $category_posts as $post ) : 
            setup_postdata( $post ); ?>
            <?php
                $featured_post = $post;
                $listing = true;
                $block_class = 'featured-post';
                if($index%2){
                    $alignment = 'left';
                }else{
                    $alignment = 'right';
                }
                $block_id = $block_class  . '-listing-' . $index;
                include('featured-post.inc');
            ?>
        <?php
        $index++;
        endforeach;
    ?>
</section>
<?php endif; wp_reset_postdata(); $listing=false; ?>