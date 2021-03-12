<?php
//
// Embed
//

$embed = get_sub_field('video');

if ($embed) :

  // vimeo?
  if (strpos($embed, 'player.vimeo.com') !== false) :

    // find iframe src
    preg_match('/src="(.+?)"/', $embed, $src_matches);
    $embed_src = $src_matches[1];

    // add URL params
    $url_params = array(
      'byline' => false,
      'portrait' => false,
      'responsive' => true,
      'title' => false
    );
    $custom_embed_source = add_query_arg($url_params, $embed_src);
    $embed = str_replace($embed_src, $custom_embed_source, $embed);



    // add iframe attributes
    $attributes = 'frameborder="0"';
    $embed = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $embed);
  endif;
  ?>
  <div class="embed">
    <?php echo $embed ?>
  </div>
<?php endif ?>