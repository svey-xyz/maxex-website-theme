<?php 
$colour = get_sub_field('colour');
$copy = get_sub_field('copy');
$button = get_sub_field('button');
$link = get_sub_field('link');
$link_style = get_sub_field('link-style');
?>

<section id="<?php echo theme_block_handle() . '-' . get_row_index() ?>" class="block <?php echo theme_block_handle() ?>">
  <div class="block-body">
    <div class="block-body-part block-body-part-A" style="background-color:<?php echo $colour ?>">
      <?php
      echo $copy;
      
      if ($button) :
      ?>
        <a class="text-link style-<?php echo $link_style ?>" href="<?php echo esc_url($link) ?>"><?php echo $button ?></a>
      <?php endif ?>
    </div> 
    <div class="block-body-part block-body-part-B">
      <?php // Facebook Page Social Plugin ?>
      <div class="fb-page" data-href="https://www.facebook.com/functionmagazine/" data-tabs="timeline" data-width="500" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
        <blockquote cite="https://www.facebook.com/functionmagazine/" class="fb-xfbml-parse-ignore">
          <a href="https://www.facebook.com/functionmagazine/">Function Magazine</a>
        </blockquote>
      </div>
    </div>
  </div>
</section>