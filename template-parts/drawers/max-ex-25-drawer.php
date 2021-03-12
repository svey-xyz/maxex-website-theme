<?php
// 
// Max Ex 25 drawer
//
?>
<nav class="drawer max-ex-25-drawer">
  <header class="drawer-header">
    <a href="<?php echo get_permalink(get_page_by_path('/max-ex/mx25')) ?>">
      <figure class="max-ex-25-logo"></figure>
    </a>

    <button class="icon-button close-button js-drawer-button" data-drawer="max-ex-25-drawer">
      <figure class="icon close-white-icon">
        <span class="a11y-text">Close</span>
      </figure>
    </button>
  </header>

  <div class="drawer-content">
    <?php
    wp_nav_menu(array(
      'menu' => 'max-ex-25-primary',
      'container' => 'div',
      'container_class' => 'list-menu style-primary',
      'container_id' => '',
      'menu_class' => 'menu-items',
      'menu_id' => '',
      'echo' => true,
      'items_wrap' => '<ul class="%2$s">%3$s</ul>',
      'depth' => 0
    ));

    wp_nav_menu(array(
      'menu' => 'max-ex-25-secondary',
      'container' => 'div',
      'container_class' => 'list-menu style-secondary',
      'container_id' => '',
      'menu_class' => 'menu-items',
      'menu_id' => '',
      'echo' => true,
      'items_wrap' => '<ul class="%2$s">%3$s</ul>',
      'depth' => 0
    ));
    ?>
  </div>

  <footer class="drawer-footer">
    <a href="<?php echo get_permalink(16) // Home ?>">
      <figure class="function-logo theme-white"></figure>
    </a>
  </footer>
</nav>