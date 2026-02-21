<?php
/**
 * EGovt Theme Functions
 *
 * @package EGovt
 */

// Theme version
if (!defined('EGOVT_VERSION')) {
    define('EGOVT_VERSION', '1.0.0');
}

/**
 * Theme Setup
 */
function egovt_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable post thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 9999);

    // Add custom image sizes
    add_image_size('egovt-event', 600, 400, true);
    add_image_size('egovt-news', 600, 350, true);
    add_image_size('egovt-council', 400, 500, true);
    add_image_size('egovt-highlight', 800, 600, true);

    // HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));

    // Responsive embeds
    add_theme_support('responsive-embeds');

    // Block editor styles
    add_theme_support('editor-styles');
    
    // Check if editor style file exists before adding
    if (file_exists(get_template_directory() . '/css/editor-style.css')) {
        add_editor_style('css/editor-style.css');
    }

    // Wide alignment
    add_theme_support('align-wide');

    // Custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'egovt'),
        'footer'  => __('Footer Menu', 'egovt'),
    ));
}
add_action('after_setup_theme', 'egovt_setup');

/**
 * Enqueue scripts and styles
 */
function egovt_scripts() {
    // Theme stylesheet
    wp_enqueue_style('egovt-style', get_stylesheet_uri(), array(), EGOVT_VERSION);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // Theme JavaScript - Check if file exists
    $js_file = get_template_directory() . '/js/theme.js';
    if (file_exists($js_file)) {
        wp_enqueue_script('egovt-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), EGOVT_VERSION, true);
        
        // Pass AJAX URL to JavaScript
        wp_localize_script('egovt-script', 'egovt_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('egovt_nonce'),
        ));
    }

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'egovt_scripts');

/**
 * Register widget areas
 */
function egovt_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'egovt'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'egovt'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'egovt'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in footer column 1.', 'egovt'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'egovt'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in footer column 2.', 'egovt'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'egovt'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in footer column 3.', 'egovt'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'egovt_widgets_init');

/**
 * Custom excerpt length
 */
function egovt_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'egovt_excerpt_length');

/**
 * Custom excerpt more
 */
function egovt_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'egovt_excerpt_more');

/**
 * Add custom classes to navigation menu items
 */
function egovt_nav_menu_css_class($classes, $item) {
    if (in_array('current-menu-item', $classes) || in_array('current_page_item', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'egovt_nav_menu_css_class', 10, 2);

/**
 * Load additional files only if they exist
 */
$inc_files = array(
    '/inc/template-functions.php',
    '/inc/custom-widgets.php'
);

foreach ($inc_files as $file) {
    $file_path = get_template_directory() . $file;
    if (file_exists($file_path)) {
        require_once $file_path;
    }
}
