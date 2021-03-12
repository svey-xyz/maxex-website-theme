<?php
// 
// Site footer
// 
?>
<footer id="footer" class="footer block">
  <div class="columns">
    <div class="column social">
      <?php theme_include_menu(4, 'social') ?>
    </div>
    
    <div class="column menus">
      <?php
      theme_include_menu(2, 'main', TRUE);
      theme_include_menu(3, 'main');
      ?>
    </div>
  </div>
</footer>