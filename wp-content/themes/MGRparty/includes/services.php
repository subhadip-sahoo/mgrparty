<?php
add_action('init', 'services');
function services() {

    $labels = array(

        'name' => __('Services'),

        'singular_name' => __('Service'),

        'add_new' => __('Add New'),

        'add_new_item' => __('Add New Service'),

        'edit_item' => __('Edit Service'),

        'new_item' => __('New Service'),

        'view_item' => __('View Service'),

        'all_items' => __('All Services'),

        'search_items' => __('Search Services'),

        'not_found' => __('No Services found'),

        'not_found_in_trash' => __('No Services found in Trash'),

        'parent_item_colon' => '',

        'menu_name' => __('Services')

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

        'show_in_menu' => true,

        'query_var' => true,

        'rewrite' => array('slug' => 'service'),

        'capability_type' => 'post',

        'has_archive' => true,

        'hierarchical' => false,

        'exclude_from_search' => true,

        'menu_position' => 100,

        'supports' => array('title', 'thumbnail','editor'),

        'can_export' => true,

		

        'register_meta_box_cb' => ''

    );

    register_post_type('services', $args);

    flush_rewrite_rules(false);    

}