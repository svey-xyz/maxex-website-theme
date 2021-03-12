<?php
//
// Embed
//

$embed_type = get_sub_field('embed-type');

if ($embed_type == 'oembed') :
  $embed = get_sub_field('embed');

  if ($embed) :
  ?>
  <div class="embed">
    <?php echo $embed ?>
  </div>
  <?php
  endif;
elseif ($embed_type == 'iframe') :
  $iframe = get_sub_field('iframe');

  if ($iframe) :
  ?>
  <div class="iframe-wrapper">
    <?php echo $iframe; ?>
  </div>
  <?php
  endif;
endif;  
?>