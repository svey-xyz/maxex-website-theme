<?php
//
// Image tile
//

$image = get_sub_field('image');
$mobile_image = get_sub_field('mobile-image');

// content
$title = get_sub_field('title');
$creator = get_sub_field('creator');
$year = get_sub_field('year');
$creator_link = get_sub_field('creator-link');

if (!empty($image)) :
?>
<div class="tile image-tile">
  <picture class="tile-image">

    <?php if (!empty($mobile_image)) : ?>
      <source srcset="<?php echo $image['url'] ?>" media="(min-width: 720px)">
      <img srcset="<?php echo $mobile_image['url'] ?>" alt="<?php echo $image['alt'] ?>">
    <?php else : ?>
      <img srcset="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
    <?php endif ?>
  </picture>

  <div class="content tile-content">
    <p>&apos;<?php echo $title ?>&apos;, <a href="<?php echo esc_url($creator_link) ?>"><?php echo $creator ?></a>, <?php echo $year ?></p>
  </div>
</div>
<?php endif ?>