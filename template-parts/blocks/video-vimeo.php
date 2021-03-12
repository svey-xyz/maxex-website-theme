<?php 
    $video = get_sub_field('video');
?>
<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">

    <div class="column video">
<iframe src="https://player.vimeo.com/video/<?php print $video; ?>" width="560" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>    </div>
    
    
    

</section>