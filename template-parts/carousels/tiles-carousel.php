<?php
//
// Images carousel
//
if (have_rows('images-carousel')) :
  ?>
  <section class="carousel tiles-carousel size-fullscreen js-carousel js-auto-advance">
    <div class="carousel-items-wrapper">
      <ul class="carousel-items">
        <?php
        while (have_rows('images-carousel')) :
          the_row();
          ?>
          <li class="carousel-item">
            <?php get_template_part('template-parts/tiles/tile') ?>
          </li>
        <?php endwhile ?>
      </ul>

      <?php // get_template_part('template-parts/nav/carousel-nav') ?>
      <div id="carousel-progress-bar" class="carousel-progress-bar js-progress-bar"></div>
    </div>
  </section>
<?php endif ?>