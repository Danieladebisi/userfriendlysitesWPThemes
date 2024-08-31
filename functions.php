<?php
function user_friendly_sites_setup() {
    // Add support for featured images and title tag
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

    // Register navigation menu
    register_nav_menus( array(
        'header-menu' => __( 'Header Menu', 'user-friendly-sites' ),
    ) );
}
add_action( 'after_setup_theme', 'user_friendly_sites_setup' );

function user_friendly_sites_customize_register( $wp_customize ) {
    // Add a section for custom theme settings
    $wp_customize->add_section( 'user_friendly_sites_colors', array(
        'title'    => __( 'Theme Colors', 'user-friendly-sites' ),
        'priority' => 30,
    ) );

    // Header Background Color
    $wp_customize->add_setting( 'header_bg_color', array(
        'default'   => '#ffde59',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color_control', array(
        'label'    => __( 'Header Background Color', 'user-friendly-sites' ),
        'section'  => 'user_friendly_sites_colors',
        'settings' => 'header_bg_color',
    ) ) );

    // Footer Background Color
    $wp_customize->add_setting( 'footer_bg_color', array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color_control', array(
        'label'    => __( 'Footer Background Color', 'user-friendly-sites' ),
        'section'  => 'user_friendly_sites_colors',
        'settings' => 'footer_bg_color',
    ) ) );
}
add_action( 'customize_register', 'user_friendly_sites_customize_register' );

function user_friendly_sites_customize_css() {
    ?>
    <style type="text/css">
        header { background-color: <?php echo get_theme_mod( 'header_bg_color', '#ffde59' ); ?>; }
        footer { background-color: <?php echo get_theme_mod( 'footer_bg_color', '#000000' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'user_friendly_sites_customize_css' );

function user_friendly_sites_service_shortcode( $atts, $content = null ) {
    return '<div class="service-item">' . $content . '</div>';
}
add_shortcode( 'service', 'user_friendly_sites_service_shortcode' );

function userfriendlysites_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'userfriendlysites_custom_logo_setup');

function theme_prefix_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'theme_prefix_setup');

function register_my_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

