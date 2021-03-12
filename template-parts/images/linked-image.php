<?php
//
// Linked image
//

$image = get_sub_field('image');
$link = get_sub_field('link');

if ($image) :

  // link
  if ($link) :
  ?>
    <a class="image-link" href="<?php echo esc_url($link) ?>" target="_blank">
  <?php
  endif;

  // caption
  if ($caption) :
  ?>
    <figure class="image-wrapper">
  <?php endif ?>

  <picture class="image">
    <img srcset="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
  </picture>

  <?php if ($link) : ?>
      <figcaption class="image-caption">
        <p>link: <u><?php echo $link ?></u></p>
      </figcaption>
    </figure>
  <?php
  endif;

  if ($link) :
  ?>
    </a>
  <?php
  endif;
endif;
?>