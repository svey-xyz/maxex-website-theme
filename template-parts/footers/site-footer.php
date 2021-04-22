<?php
// 
// Site footer
// 
?>
<footer id="footer" class="footer full-width-wrapper block">
  <div class="columns max-width-container">
    <div class="column logos">
      <?php get_template_part('template-parts/nav/logos'); ?>
    </div>
    
    <div class="column sites">
      <?php
      theme_include_menu(27, 'site-link');
      ?>
    </div>
  </div>
</footer>