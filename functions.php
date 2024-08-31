<?php
function user_friendly_sites_setup() {
    // Add support for various WordPress features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'user-friendly-sites'),
    ));

    // Register widget areas
    function user_friendly_sites_widgets_init() {
        register_sidebar(array(
            'name' => __('Sidebar', 'user-friendly-sites'),
            'id' => 'sidebar-1',
            'description' => __('Add widgets here.', 'user-friendly-sites'),
            'before_widget' => '<section class="widget">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'name' => __('Footer', 'user-friendly-sites'),
            'id' => 'footer-1',
            'description' => __('Add widgets here.', 'user-friendly-sites'),
            'before_widget' => '<section class="widget">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
    }
    add_action('widgets_init', 'user_friendly_sites_widgets_init');
}
add_action('after_setup_theme', 'user_friendly_sites_setup');

// Enqueue styles and scripts
function user_friendly_sites_scripts() {
    wp_enqueue_style('user-friendly-sites-style', get_stylesheet_uri());
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap', false);
}
add_action('wp_enqueue_scripts', 'user_friendly_sites_scripts');
?>