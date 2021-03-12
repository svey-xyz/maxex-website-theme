<?php
// 
// Project card
//

$student = get_field('project-student');
$image = get_field('project-preview-image');
?>
<article class="card project-card">
  <a class="card-link" href="<?php echo get_permalink() ?>" title="<?php echo esc_attr(get_the_title()) ?>">
    <?php if ($image) : ?>
      <div class="tile card-tile js-tilt">
        <picture class="tile-image">
          <img srcset="<?php echo esc_url($image['url']) ?>" width="900" height="600" alt="<?php echo esc_attr($image['alt']) ?>">
        </picture>
      </div>
    <?php endif ?>
    
    <div class="content card-content">
      <p class="student-name"><?php echo $student ?></p>
    </div>
  </a>
</article>