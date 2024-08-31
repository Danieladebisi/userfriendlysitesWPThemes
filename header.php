<header>
    <div class="navbar-container">
        <!-- Logo Section -->
        <div class="logo">
            <?php if ( has_custom_logo() ) {
                the_custom_logo();
            } else { ?>
                <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } ?>
        </div>

        <!-- Navigation Menu -->
        <nav class="navbar">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu',
                    'container' => false,
                    'menu_class' => 'navbar-menu',
                ));
            ?>
        </nav>
    </div>
</header>
