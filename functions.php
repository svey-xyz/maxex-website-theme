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

	//
  	// Project Types
	//
	global $project_types;
	$project_types = ['thesis_project', 'third_year_project'];

	foreach ($project_types as $project_type) {
		$project_name = ucwords(str_replace('_', ' ', $project_type));

		$labels = array(
			'name'                  => $project_name . 's',
			'singular_name'         => $project_name,
			'menu_name'             => $project_name . 's',
			'name_admin_bar'        => $project_name,
			'archives'              => $project_name . ' Archives',
			'attributes'            => $project_name . ' Attributes',
			'parent_item_colon'     => 'Parent ' . $project_name . ':',
			'all_items'             => 'All ' . $project_name .'s',
			'add_new_item'          => 'Add New ' . $project_name,
			'add_new'               => 'Add New',
			'new_item'              => 'New ' . $project_name,
			'edit_item'             => 'Edit ' . $project_name,
			'update_item'           => 'Update ' . $project_name,
			'view_item'             => 'View ' . $project_name,
			'view_items'            => 'View ' . $project_name . 's',
			'search_items'          => 'Search ' . $project_name,
			'not_found'             => 'Not found',
			'not_found_in_trash'    => 'Not found in Trash',
			'featured_image'        => 'Featured Image',
			'set_featured_image'    => 'Set featured image',
			'remove_featured_image' => 'Remove featured image',
			'use_featured_image'    => 'Use as featured image',
			'insert_into_item'      => 'Insert into ' . $project_name,
			'uploaded_to_this_item' => 'Uploaded to this ' . $project_name,
			'items_list'            => $project_name . 's list',
			'items_list_navigation' => $project_name . 's list navigation',
			'filter_items_list'     => 'Filter' . $project_name . 's list',
		);
		
		$args = array(
			'label'                 => $project_name,
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
		
		register_post_type($project_type, $args);
	}

	register_taxonomy(  
        'project_year',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        $project_types,        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Project Year',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'project_year', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}

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


/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
	global $pagenow;
	global $submenu_file;
	global $project_types;

	$taxonomy = 'project_year';
	$q_vars = &$query->query_vars;

	foreach($project_types as $post_type ) {
		
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$submenu_file = 'edit.php?post_type='.$post_type.'&project_year='.$q_vars[$taxonomy];
			
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;	
		}
	}
}

// Add sub menus for years to every project type
function wp332896_folder_menu() {
	global $project_types;

    foreach($project_types as $project_type) {
		$post_type = get_post_type_object($project_type);
		$menu_slug = $post_type->name;
		$menu_name = $post_type->labels->name;

		$years = get_terms(array(
			'taxonomy' => 'project_year',
			'hide_empty' => false,
		));

		if  ($years) {
			foreach ($years  as $year ) {
				$project_submenu_slug = 'edit.php?post_type='.$menu_slug.'&project_year='.$year->term_id;
				add_submenu_page('edit.php?post_type='.$menu_slug, $year->name, $year->name, 'edit_posts', $project_submenu_slug);
			}
		} 
    }
 }

add_action('admin_menu', 'wp332896_folder_menu');