<?php
/*
Plugin Name: My Plugin
*/

function mt_register_collections_post_type() {

    $args = array(
        'label'               => 'Collections',
        'public'              => true,
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'         => true,
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => 'fardiga-mixar' )
    );

    register_post_type( 'collection', $args );

}
add_action( 'init', 'mt_register_collections_post_type' );