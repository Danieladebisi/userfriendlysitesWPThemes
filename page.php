<?php get_header(); ?>

<main id="main" class="site-main">
    <?php
    while (have_posts()) : the_post();
        get_template_part('template-parts/content', 'page');
    endwhile;
    ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>