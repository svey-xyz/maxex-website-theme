<?php
//
// Template Name: Max Ex 25 – Splash
//

get_header();

$super_heading = get_field('max-ex-25-superheading');
$heading = get_field('max-ex-25-heading');
$text = get_field('max-ex-25-text');

$footer_content = get_field('max-ex-25-footer-content');
?>
<article class="page max-ex-25-splash-page">
  <header class="max-ex-25-splash-header">
    <div class="area-A">
      <div class="countdown-timer js-countdown-timer"></div>
      <figure class="maximum-exposure-25-logo"></figure>
    </div>
    <div class="area-B">
      <div class="content-A">
        <div class="super-heading">
          <?php echo $super_heading ?>
        </div>
        <h1 class="heading"><?php echo $heading ?></h1>
      </div>
      <div class="content-B">
      <p class="text"><?php echo $text ?></p>
      </div>
    </div>
    <div class="area-C">
      <div class="footer-content">
        <?php echo $footer_content ?>
      </div>
      <div class="sponsor-logos">
        <figure class="sponsor-logo scotiabank-contact-photography-festival-logo"></figure>
      </div>
    </div>
    <div class="area-D">
      <?php get_template_part('template-parts/carousels/tiles-carousel') ?>
    </div>
  </header>
</article>
<?php
get_template_part('template-parts/blocks/blocks');
get_footer();
?>