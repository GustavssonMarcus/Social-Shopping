<?php
function mitt_tema_setup() {
    // Lägg till stöd för utvald bild
    add_theme_support('post-thumbnails');

    // Registrera meny
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mitt-tema'),
        'footer' => __('Footer Menu', 'mitt-tema'),
    ));

    // Lägg till stöd för titel-taggen
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'mitt_tema_setup');
