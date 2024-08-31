<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class="logo">
        <?php if ( has_custom_logo() ) {
            the_custom_logo();
        } else { ?>
            <h1><?php bloginfo('name'); ?></h1>
        <?php } ?>
    </div>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Case Studies</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">What We Do</a></li>
        </ul>
    </nav>
</header>

