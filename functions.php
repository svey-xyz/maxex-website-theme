<?php
//
// Theme setup
//

// Add theme support
add_action('after_setup_theme', 'theme_setup');
if (!function_exists('theme_setup_theme')) {
  function theme_setup() {
    
    // load custom editor stylesheet
    add_editor_style('style-admin.css');

    // Title
    add_theme_support('title-tag');

    // HTML5
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    // featured images
    remove_theme_support('post-thumbnails');
    //add_theme_support('post-thumbnails');

    // register image sizes
    add_image_size('laptop', 1400, 900); // TODO rename / regenerate 
  }
}

// Register navigation menus
add_action('after_setup_theme', 'theme_register_menus');
function theme_register_menus() {
  register_nav_menu('header-left-menu', __('Header Left Menu'));
  register_nav_menu('header-right-menu', __('Header Right Menu'));
}

// Remove "Howdy" from the WordPress admin
add_filter('gettext', 'theme_remove_howdy', 10, 2);
function theme_remove_howdy($new, $original) {
  if ('Howdy, %1$s' == $original)
    $new = '%1$s';
  return $new;
}

// Hide the WordPress admin bar
//add_filter('show_admin_bar', '__return_false');

// Streamline <head>
add_action('init', 'theme_cleanup_head');
function theme_cleanup_head() {
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'index_rel_link');
  remove_action('wp_head', 'parent_post_rel_link', 10, 0);
  remove_action('wp_head', 'start_post_rel_link', 10, 0);
  remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
  wp_deregister_script('l10n');

  // Streamline emoji
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('tiny_mce_plugins', 'theme_remove_tinymce_emoji');

  // Streamline REST API
  remove_action('wp_head', 'rest_output_link_wp_head', 10);
  remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
}

// Streamline TinyMCE emojis
function theme_remove_tinymce_emoji($plugins) {
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}

// Streamline stylesheets
add_action('wp_print_styles', 'theme_dequeue_styles', 100); // late ~ after enqueueing
function theme_dequeue_styles() {
  
  // remove Gutenberg block editor stylesheets
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
}

// Add theme stylesheets
add_action('wp_enqueue_scripts', 'theme_stylesheets');
function theme_stylesheets() {

  // Load webfont stylesheets
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,400i,700,700i|Roboto:300,300i,700,700i', false);
  wp_enqueue_style('typekit', 'https://use.typekit.net/mck7mpz.css', false); // ~ Proxima Nova

  // Add theme stylesheet
  wp_enqueue_style('style', get_stylesheet_uri());
}

// Add theme scripts
add_action('wp_enqueue_scripts', 'theme_scripts');
function theme_scripts() {

  // Enqueue JavaScript
  if (!is_admin()) {
    
    // Streamline
    wp_deregister_script('wp-embed');

    // Load jQuery from Google CDN
    wp_deregister_script('jquery');
    wp_register_script('jquery', ('//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'), false, '2.2.4', false);
    wp_enqueue_script('jquery');

    // Add theme scripts
    wp_register_script('plugins', get_template_directory_uri() . '/assets/scripts/plugins-min.js', array('jquery'), '', true);
    wp_enqueue_script('plugins');
    
    wp_register_script('app', get_template_directory_uri() . '/assets/scripts/app-min.js', array('plugins'), '', true);
    wp_enqueue_script('app');
  }
}

// Remove WordPress version from scripts & stylesheets
add_filter('style_loader_src', 'theme_remove_stylesheet_and_script_versions', 9999);
add_filter('script_loader_src', 'theme_remove_stylesheet_and_script_versions', 9999);
function theme_remove_stylesheet_and_script_versions($src) {
  if (strpos($src, 'ver='))
    $src = remove_query_arg('ver', $src);

  return $src;
}

// Custom ACF wysiwyg toolbars
add_filter('acf/fields/wysiwyg/toolbars' , 'theme_acf_toolbars');
function theme_acf_toolbars( $toolbars ) {

	$toolbars['Very Simple' ] = array();
  $toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'underline' );
  
	$toolbars['Simple' ] = array();
	$toolbars['Simple' ][1] = array('bold' , 'italic' , 'underline', 'link' );

	return $toolbars;
}

// Custom ACF wysiwyg resize.
add_action('acf/input/admin_footer', 'theme_PREFIX_apply_acf_modifications');
function theme_PREFIX_apply_acf_modifications() {
?>
  <style>
    .acf-editor-wrap iframe {
      min-height: 0;
    }
  </style>
  <script>
    (function($) {
      // (filter called before the tinyMCE instance is created)
      acf.add_filter('wysiwyg_tinymce_settings', function(mceInit, id, $field) {
        // enable autoresizing of the WYSIWYG editor
        mceInit.wp_autoresize_on = true;
        return mceInit;
      });
      // (action called when a WYSIWYG tinymce element has been initialized)
      acf.add_action('wysiwyg_tinymce_init', function(ed, id, mceInit, $field) {
        // reduce tinymce's min-height settings
        ed.settings.autoresize_min_height = 100;
        // reduce iframe's 'height' style to match tinymce settings
        $('.acf-editor-wrap iframe').css('height', '100px');
      });
    })(jQuery)
  </script>
<?php
}

// favicon
add_action('wp_head', 'theme_favicon');
function theme_favicon() {
  echo '<link rel="icon" href="' . get_template_directory_uri() . '/assets/images/icons/favicon.ico">';
}

// ACF options page
if (function_exists('acf_add_options_page')) {

	$parent = acf_add_options_page(array(
		'page_title' => 'Sitewide Theme Settings',
		'menu_title' => 'Theme Settings',
		'redirect'   => false
	));
}

// mime
add_filter('upload_mimes', 'theme_cc_mime_types');
function theme_cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

// Register Custom Post Types
add_action('init', 'theme_custom_post_types', 0);
function theme_custom_post_types() {

	//
  // Projects
	//

	$labels = array(
		'name'                  => 'Projects',
		'singular_name'         => 'Project',
		'menu_name'             => 'Projects',
		'name_admin_bar'        => 'Project',
		'archives'              => 'Project Archives',
		'attributes'            => 'Project Attributes',
		'parent_item_colon'     => 'Parent Project:',
		'all_items'             => 'All Projects',
		'add_new_item'          => 'Add New Project',
		'add_new'               => 'Add New',
		'new_item'              => 'New Project',
		'edit_item'             => 'Edit Project',
		'update_item'           => 'Update Project',
		'view_item'             => 'View Project',
		'view_items'            => 'View Projects',
		'search_items'          => 'Search Project',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Project',
		'uploaded_to_this_item' => 'Uploaded to this Project',
		'items_list'            => 'Projects list',
		'items_list_navigation' => 'Projects list navigation',
		'filter_items_list'     => 'Filter Projects list',
	);
	
	$args = array(
		'label'                 => 'Project',
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'revisions', 'custom-fields'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-star-filled',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post'
	);
	
	register_post_type('project', $args);
}

/*
// Register Custom Taxonomies
add_action('init', 'theme_custom_taxonomies', 0);
function theme_custom_taxonomies() {

	//
  // Exhibitions
	//

	$labels = array(
		'name'                       => 'Exhibitions',
		'singular_name'              => 'Exhibition',
		'menu_name'                  => 'Exhibitions',
		'all_items'                  => 'All Exhibitions',
		'parent_item'                => 'Parent Exhibition',
		'parent_item_colon'          => 'Parent Exhibition:',
		'new_item_name'              => 'New Exhibition Name',
		'add_new_item'               => 'Add New Exhibition',
		'edit_item'                  => 'Edit Exhibition',
		'update_item'                => 'Update Exhibition',
		'view_item'                  => 'View Exhibition',
		'separate_items_with_commas' => 'Separate exhibitions with commas',
		'add_or_remove_items'        => 'Add or remove exhibitions',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Exhibitions',
		'search_items'               => 'Search Exhibitions',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No exhibitions',
		'items_list'                 => 'Exhibitions list',
		'items_list_navigation'      => 'Exhibitions list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
  );
  
  register_taxonomy('exhibitions', array('project'), $args);
}
*/

// menu utility
function theme_include_menu($menu_id, $menu_class, $depth = null) {
  include(locate_template('template-parts/nav/menu-nav.php', false, false ));
}

// utils.
function theme_block_handle() {
  return str_replace('_', '-', get_row_layout());
}

function theme_page_class() {
  global $post;
  if (isset($post))
    $page_class = $post->post_name . '-' . $post->post_type;
  return $page_class;
}

// utility shortcut to theme image assets directory
function theme_images() {
  echo get_template_directory_uri() . '/assets/images';
}

add_filter('excerpt_more', 'theme_excerpt_more');
function theme_excerpt_more($more) {
  return '&hellip;';
}