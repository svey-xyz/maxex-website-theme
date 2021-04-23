<?php 
    $category = get_sub_field('category');
    $type = get_sub_field('type');
    
    $date_now = date('Y-m-d H:i:s');
    $date_field = 'event_date';
    
    switch($type){
        case 'all';
        break;
        case 'upcoming':
            $date_args = array(
                'key'			=> $date_field,
                'compare'		=> '>=',
                'value'			=> $date_now,
                'type'			=> 'DATETIME'
            );
            
        break;
        case 'past':
            $date_args = array(
                'key'			=> $date_field,
                'compare'		=> '<=',
                'value'			=> $date_now,
                'type'			=> 'DATETIME'
            );
        break;
    }
    
    global $post;
    if($date_args){
        $category_posts = get_posts(array(
            'posts_per_page' => -1,
            'cat'       => $category,
            'meta_query' => array(
                'relation' => 'AND',
                $date_args,
            ),
        	'order' => 'ASC',
        	'orderby' => 'meta_value',
        	'meta_key' => $date_field,
        	'meta_type' => 'DATE'
        ));
    }else{
        $category_posts = get_posts(array(
            'posts_per_page' => -1,
            'cat' => $category,
        	'order' => 'DESC',
        	'orderby' => 'meta_value',
        	'meta_key' => $date_field,
        	'meta_type' => 'DATE'
        ));
    }

?>
<?php if($category_posts): ?>
<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
    <ul>
    <?php
        $index = 1;
        foreach ( $category_posts as $post ) : 
            setup_postdata( $post );
            $post_title = get_field('post_title');
            $post_excerpt = get_field('post_excerpt');
            $event_date = get_field('event_date');
            $event_time = get_field('event_time');
            $event_location = get_field('event_location');
            $link = get_field('link');
            $link_icon = get_template_directory_uri() . '/assets/images/icon-arrow-right-black-circle.svg';
            
            ?>
            <li>
                <span class="date"><?php print $event_date; ?> <?php if($event_time){ print $event_time; } ?></span>
                <span class="title"><a href="<?php print get_permalink(); ?>"><?php print $post_title; ?></a></span>
                <span class="description"><?php print strip_tags($post_excerpt); ?></span>
                <span class="link"><a href="<?php print $link ?>">
                    <img src="<?php print $link_icon; ?>" alt="View Event Details" />
                </a></span>
            </li>
        <?php
        $index++;
        endforeach;
    ?>
    </ul>
</section>
<?php endif; wp_reset_postdata(); ?>