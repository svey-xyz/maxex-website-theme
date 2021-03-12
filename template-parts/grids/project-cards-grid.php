<?php
// 
// Project cards grid
//

if (have_rows('projects')) :
  ?>
  <section class="cards-grid project-cards-grid">
    <ul class="grid-items">
      <?php
      while (have_rows('projects')) :
        the_row();

        $project = get_sub_field('project');

        if ($project) :
          $post = $project;
          setup_postdata($post);
          ?>
          <li class="grid-item">
            <?php get_template_part('template-parts/cards/project-card') ?>
          </li>
          <?php
          wp_reset_postdata();
        endif;
      endwhile;
      ?>
    </ul>
  </section>
<?php endif ?>