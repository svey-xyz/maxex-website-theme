<?php
//
// Template Name: Max Ex 25 – Projects (list)
//

get_header();
get_template_part('template-parts/headers/max-ex-25-local-header');
get_template_part('template-parts/drawers/max-ex-25-drawer');
?>
<article class="page max-ex-25-page">
  <?php
  get_template_part('template-parts/headers/max-ex-25-page-header');
  get_template_part('template-parts/lists/projects-list');
  ?>
</article>
<?php get_footer() ?>