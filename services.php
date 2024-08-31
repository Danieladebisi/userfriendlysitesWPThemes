<?php
/*
Template Name: Services Page
*/

get_header(); ?>

<section id="services">
    <h2>Our Services</h2>
    <p>We offer a range of services to meet your web development and SEO needs.</p>

    <!-- Use shortcodes to add services -->
    <?php echo do_shortcode('[service]Web Development[/service]'); ?>
    <?php echo do_shortcode('[service]SEO Optimization[/service]'); ?>
    <?php echo do_shortcode('[service]Website Management[/service]'); ?>
</section>

<?php get_footer(); ?>
