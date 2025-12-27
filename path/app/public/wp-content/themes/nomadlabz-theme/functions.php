<?php
/**
 * NomadLabz Theme Functions
 *
 * @package NomadLabz
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Setup
function nomadlabz_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'nomadlabz'),
    ));
}
add_action('after_setup_theme', 'nomadlabz_setup');

// Enqueue Scripts and Styles
function nomadlabz_scripts() {
    // Tailwind CSS (compiled)
    wp_enqueue_style('nomadlabz-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');
    
    // GSAP
    wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), '3.12.5', true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap'), '3.12.5', true);
    wp_enqueue_script('gsap-scrollto', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js', array('gsap'), '3.12.5', true);
    
    // Theme JavaScript
    wp_enqueue_script('nomadlabz-main', get_template_directory_uri() . '/assets/js/main.js', array('gsap', 'gsap-scrolltrigger', 'gsap-scrollto'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('nomadlabz-main', 'nomadlabzData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('nomadlabz-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'nomadlabz_scripts');

// Register Custom Post Types
function nomadlabz_register_post_types() {
    // Services Post Type
    register_post_type('service', array(
        'labels' => array(
            'name' => __('Services', 'nomadlabz'),
            'singular_name' => __('Service', 'nomadlabz'),
            'add_new' => __('Add New Service', 'nomadlabz'),
            'add_new_item' => __('Add New Service', 'nomadlabz'),
            'edit_item' => __('Edit Service', 'nomadlabz'),
            'new_item' => __('New Service', 'nomadlabz'),
            'view_item' => __('View Service', 'nomadlabz'),
            'search_items' => __('Search Services', 'nomadlabz'),
            'not_found' => __('No services found', 'nomadlabz'),
            'not_found_in_trash' => __('No services found in trash', 'nomadlabz'),
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
    ));
    
    // Solutions Post Type
    register_post_type('solution', array(
        'labels' => array(
            'name' => __('Solutions', 'nomadlabz'),
            'singular_name' => __('Solution', 'nomadlabz'),
            'add_new' => __('Add New Solution', 'nomadlabz'),
            'add_new_item' => __('Add New Solution', 'nomadlabz'),
            'edit_item' => __('Edit Solution', 'nomadlabz'),
            'new_item' => __('New Solution', 'nomadlabz'),
            'view_item' => __('View Solution', 'nomadlabz'),
            'search_items' => __('Search Solutions', 'nomadlabz'),
            'not_found' => __('No solutions found', 'nomadlabz'),
            'not_found_in_trash' => __('No solutions found in trash', 'nomadlabz'),
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-lightbulb',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'nomadlabz_register_post_types');

// Theme Customizer
function nomadlabz_customize_register($wp_customize) {
    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#4bffb9',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color (Neon Mint)', 'nomadlabz'),
        'section' => 'colors',
        'settings' => 'primary_color',
    )));
    
    // Logo Upload
    $wp_customize->add_setting('custom_logo_upload', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo_upload', array(
        'label' => __('Logo', 'nomadlabz'),
        'section' => 'title_tagline',
        'settings' => 'custom_logo_upload',
    )));
}
add_action('customize_register', 'nomadlabz_customize_register');

// Output Custom CSS
function nomadlabz_customizer_css() {
    $primary_color = get_theme_mod('primary_color', '#4bffb9');
    ?>
    <style type="text/css">
        :root {
            --color-primary: <?php echo esc_attr($primary_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'nomadlabz_customizer_css');

// Helper function to get logo URL
function nomadlabz_get_logo_url() {
    $custom_logo = get_theme_mod('custom_logo_upload');
    if ($custom_logo) {
        return esc_url($custom_logo);
    }
    // Check if custom logo is set via WordPress customizer
    $logo_id = get_theme_mod('custom_logo');
    if ($logo_id) {
        $logo = wp_get_attachment_image_src($logo_id, 'full');
        if ($logo) {
            return esc_url($logo[0]);
        }
    }
    // Default logo path (from theme assets)
    $default_logo = get_template_directory_uri() . '/assets/images/logo.svg';
    // Check if file exists, otherwise use PNG
    if (file_exists(get_template_directory() . '/assets/images/logo.svg')) {
        return $default_logo;
    }
    return get_template_directory_uri() . '/assets/images/logo.png';
}

// Excerpt length
function nomadlabz_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'nomadlabz_excerpt_length');

// Add custom body classes
function nomadlabz_body_classes($classes) {
    if (is_page()) {
        $classes[] = 'page-' . get_post_field('post_name', get_post());
    }
    return $classes;
}
add_filter('body_class', 'nomadlabz_body_classes');

// Add custom classes to menu items
function nomadlabz_nav_menu_css_class($classes, $item, $args) {
    if ($args->theme_location === 'primary') {
        $classes[] = 'group';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'nomadlabz_nav_menu_css_class', 10, 3);

// Add custom classes to menu links
function nomadlabz_nav_menu_link_attributes($atts, $item, $args) {
    if ($args->theme_location === 'primary') {
        $atts['class'] = 'text-white hover:text-primary transition-colors duration-300 relative inline-block';
        // Add underline effect via CSS class
        $atts['data-menu-link'] = 'true';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'nomadlabz_nav_menu_link_attributes', 10, 3);


