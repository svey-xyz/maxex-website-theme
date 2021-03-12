<?php
// 
// Projects list
//

if (have_rows('projects')) :
  ?>
  <section class="projects-list">
    <ul class="list-items">
      <?php
      while (have_rows('projects')) :
        the_row();

        $project = get_sub_field('project');

        if ($project) :
          $post = $project;
          setup_postdata($post);
          ?>
          <li class="list-item">
            <?php
            $student = get_field('project-student');
            $show_title = get_field('show-title');
            $description = get_field('project-description');
            $media = get_field('project-media'); 
            $layout_type = 'columns';
            
            if (empty($description) && (count($media) == 1)) :
              $layout_type = 'simple';
            endif;
            ?>
            <div class="project-layout height-auto layout-<?php echo $layout_type ?>">
              <div class="content project-content">    
            
                <header class="project-content-header">
                  <?php if ($show_title) : ?>
                    <p class="student-name"><?php echo $student ?></p>
                    <h1 class="project-title"><?php the_title() ?></h1>
                  <?php else : ?>
                    <h1 class="student-name"><?php echo $student ?></h1>
                  <?php endif ?>
                </header>
            
                <?php if ($description) : ?>
                  <div class="product-description">
                    <?php echo $description ?>
                  </div>
                <?php endif ?>
              </div>
            
              <?php if (have_rows('project-media')) : ?>
                <div class="project-media">
                  <?php
                  while (have_rows('project-media')) :
                    the_row();
            
                    switch (get_row_layout()) :
                      case 'images' :
                        get_template_part('template-parts/lists/images-list');
                        break;
                      case 'linked-image' :
                        get_template_part('template-parts/images/linked-image');
                        break;
                      case 'video' :
                        get_template_part('template-parts/embeds/video');
                        break;
                      case 'embed' :
                        get_template_part('template-parts/embeds/embed');
                        break;
                    endswitch;
                  endwhile
                  ?>
                </div>
              <?php endif ?>
            </div>
          </li>
          <?php
          wp_reset_postdata();
        endif;
      endwhile;
      ?>
    </ul>
  </section>
<?php endif ?>