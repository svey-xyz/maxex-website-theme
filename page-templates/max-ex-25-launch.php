<?php
//
// Template Name: Max Ex 25 – Launch page
//

get_header();
get_template_part('template-parts/headers/max-ex-25-local-header');
get_template_part('template-parts/drawers/max-ex-25-drawer');
?>
<article class="page max-ex-25-page">
  <header class="max-ex-25-launch-header">
    <div class="content">
      <h1 class="exhibition-title">Maximum Exposure 25</h1>
      <p class="exhibition-description">For its twenty-fifth iteration, Maximum Exposure will look to the forefront of visual culture and image technologies while continuing its quarter-century legacy of showcasing the very best of IMA's diverse array of student work.</p>
      <p><a class="button style-outline theme-white" href="<?php echo get_permalink(7678) // ~ Max Ex 25 About page ?>">Learn More</a></p>
    </div>
  </header>
  <?php get_template_part('template-parts/blocks/blocks') ?>
</article>
<?php get_footer() ?>