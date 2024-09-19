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
?>
<?php
function wporg_register_taxonomy_course() {
    
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Categories' ),
        'parent_item_colon' => __( 'Parent Categories:' ),
        'edit_item'         => __( 'Edit Categories' ),
        'update_item'       => __( 'Update Categories' ),
        'add_new_item'      => __( 'Add New Categories' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, 
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'collection_category' ),
        'show_in_rest'      => true,
    );
    
    register_taxonomy( 'collection_category', array( 'collection' ), $args );
}
add_action( 'init', 'wporg_register_taxonomy_course' );