<?php
//
// Images list
//

$images = get_sub_field('images');

if ($images) :
?>
<div class="images-list">
  <ul class="list-items">
    <?php
    foreach ($images as $image) :
      $caption = $image['caption'];
      ?>
      <li class="list-item">
        <?php if ($caption) : ?>
          <figure class="image-wrapper">
        <?php endif ?>

        <picture class="image">
          <img srcset="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
        </picture>

        <?php if ($caption) : ?>
            <figcaption class="image-caption">
              <p><?php echo esc_html($caption) ?></p>
            </figcaption>
          </figure>
        <?php endif ?>
      </li>
    <?php endforeach ?>
  </ul>
</div>
<?php endif ?>