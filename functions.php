<?php
function user_friendly_sites_setup() {
    // Add support for featured images
    add_theme_support( 'post-thumbnails' );
    
    // Add support for title tag
    add_theme_support( 'title-tag' );

    // Register navigation menu
    register_nav_menus( array(
        'header-menu' => __( 'Header Menu', 'user-friendly-sites' ),
    ) );
}
add_action( 'after_setup_theme', 'user_friendly_sites_setup' );

function user_friendly_sites_scripts() {
    // Enqueue style
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'user_friendly_sites_scripts' );


// Widget Area
// Widget Area
// Widget Area
// Widget Area
// Widget Area
function user_friendly_sites_widgets_init() {
    register_sidebar( array(
        'name'          => 'Main Sidebar',
        'id'            => 'main-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'user_friendly_sites_widgets_init' );
