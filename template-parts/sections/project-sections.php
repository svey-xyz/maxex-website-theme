<?php
// 
// Project sections
//

if (have_rows('projects')) :
  ?>
  <ul class="project-sections js-horizontal-scrolling">
    <?php
    while (have_rows('projects')) :
      the_row();

      $project = get_sub_field('project');

      if ($project) :
        $background_color = get_sub_field('project-background-color');
        //$media = get_sub_field('project-media');

        // project
        $post = $project;        
        setup_postdata($post);

        $student = get_field('project-student');
        ?>
        <li class="project-section"<?php if ($background_color) : ?> style="background-color: <?php echo $background_color ?>"<?php endif ?>>
          
          <?php if (get_row_index() == 1) : ?>
            <header class="max-ex-25-page-header">
              <p class="exhibition-title">Maximum Exposure 25</p>
              <h1 class="page-title">Thesis Exhibition</h1>
            </header>
          <?php
          endif;

          if (have_rows('project-media')) :
            while (have_rows('project-media')) :
              the_row();

              $image = get_sub_field('image');
              $border_type = get_sub_field('border-type');
              $size = get_sub_field('size');

              if ($border_type == 'frame') :
                $frame_aspect = get_sub_field('frame-aspect');
                $frame_color = get_sub_field('frame-color');
                ?>
                <figure class="frame-background size-<?php echo $size ?> aspect-<?php echo $frame_aspect ?> theme-<?php echo $frame_color ?>">
              <?php endif ?>

              <picture class="image<?php if ($border_type == 'none') : ?> size-<?php echo $size ?><?php endif ?>">
                <a href="<?php echo get_the_permalink() ?>">
                  <img srcset="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
                </a>
              </picture>

              <?php if ($border_type == 'frame') : ?>
                </figure>
              <?php
              endif;
              
              if (get_row_index() == 1) :
              ?>
              <div class="content project-content">
                <a href="<?php echo get_the_permalink() ?>">
                  <p class="student-name"><?php echo $student ?></p>
                  <p class="project-title"><?php the_title() ?></p>
                  <p><button class="button theme-white style-outline waves-effect waves-light" type="button">Learn More</button></p>
                </a>
              </div>
              <?php
              endif;
            endwhile;
            ?>
          <?php else : ?>
            <?php // NOTE this shouldn't happen, there should always be at least one piece of featured media ?>
            <div class="content project-content">
              <a href="<?php echo get_the_permalink() ?>">
                <p class="student-name"><?php echo $student ?></p>
                <p class="project-title"><?php the_title() ?></p>
                <p><button class="button theme-white style-outline waves-effect waves-light" type="button">Learn More</button></p>
              </a>
            </div>
          <?php endif ?>

          
        </li>
        <?php
        wp_reset_postdata();
      endif;
    endwhile;
    ?>
  </ul>
<?php endif ?>