<?php
/*  Being custom post types */

add_action('init', 'pdf_resources_register');

function pdf_resources_register() {

    $labels = array(
        'name' => _x('Header Image', 'post type general name'),
        'singular_name' => _x('Header Image', 'post type singular name'),
        'add_new' => _x('Add Header Image', 'PDF Resource'),
        'add_new_item' => __('Add New Header Image'),
        'edit_item' => __('Edit Header Image'),
        'new_item' => __('New Header Image'),
        'view_item' => __('View Header Image'),
        'search_items' => __('Search Header Image'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','thumbnail'),
        'rewrite' => array('slug' => 'header_mage', 'with_front' => FALSE)
      ); 

    register_post_type( 'pdf_resource' , $args );
}




    /*  End custom post types */