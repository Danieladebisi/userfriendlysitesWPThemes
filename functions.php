<?php
function user_friendly_sites_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'user-friendly-sites'),
        'footer' => __('Footer Menu', 'user-friendly-sites'),
    ));

    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'user_friendly_sites_setup');

function user_friendly_sites_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'user-friendly-sites'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'user-friendly-sites'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer', 'user-friendly-sites'),
        'id'            => 'footer-1',
        'description'   => __('Add footer widgets here.', 'user-friendly-sites'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'user_friendly_sites_widgets_init');

function user_friendly_sites_scripts() {
    wp_enqueue_style('user-friendly-sites-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap', array(), null);
    wp_enqueue_script('user-friendly-sites-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'user_friendly_sites_scripts');

// Custom excerpt length
function user_friendly_sites_custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'user_friendly_sites_custom_excerpt_length', 999);

// Custom excerpt more
function user_friendly_sites_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'user_friendly_sites_custom_excerpt_more');

// Custom comment form fields
function user_friendly_sites_comment_form_fields($fields) {
    $commenter = wp_get_current_commenter();
    $req       = get_option('require_name_email');
    $aria_req  = ($req ? " aria-required='true'" : '');

    $fields['author'] = '<p class="comment-form-author"><label for="author">' . __('Name', 'user-friendly-sites') . ($req ? ' <span class="required">*</span>' : '') . '</label>' .
                        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>';

    $fields['email'] = '<p class="comment-form-email"><label for="email">' . __('Email', 'user-friendly-sites') . ($req ? ' <span class="required">*</span>' : '') . '</label>' .
                       '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>';

    $fields['url'] = '<p class="comment-form-url"><label for="url">' . __('Website', 'user-friendly-sites') . '</label>' .
                     '<input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>';

    return $fields;
}
add_filter('comment_form_default_fields', 'user_friendly_sites_comment_form_fields');

// Custom pagination
function user_friendly_sites_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'  => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total'   => $wp_query->max_num_pages,
    ));
}

// Custom template tags
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates
require get_template_directory() . '/inc/extras.php';

// Customizer additions
require get_template_directory() . '/inc/customizer.php';