<footer>
    <div class="footer-widgets">
        <?php if (is_active_sidebar('footer-1')) : ?>
            <?php dynamic_sidebar('footer-1'); ?>
        <?php endif; ?>
    </div>
    <div class="site-info">
        <p>&copy; <?php echo date('Y'); ?> User Friendly Sites. All rights reserved.</p>
        <div class="social-links">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">LinkedIn</a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>