<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>

<header id="site-header" class="site-header">
    <div class="container">
        <div class="logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
        </div>

		<nav id="main-nav">
    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
</nav>

        <div class="header-search">
            <?php get_search_form(); ?>
        </div>
    </div>
</header>
    
</body>
</html>