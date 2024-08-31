<?php
/*
Template Name: Home Page
*/

get_header(); ?>

<section id="hero">
    <h1>Welcome to User Friendly Sites</h1>
    <p>Your partner in building user-friendly, SEO-optimized websites.</p>
    <a href="<?php echo site_url('/contact'); ?>" class="btn">Get Started</a>
</section>

<section id="services">
    <h2>Our Services</h2>
    <p>We specialize in web development, SEO, and website management.</p>
    <!-- Add service descriptions here -->
</section>

<?php get_footer(); ?>
