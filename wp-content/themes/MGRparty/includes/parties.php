<?php
add_action('init', 'parties');
function parties() {

    $labels = array(

        'name' => __('Parties'),

        'singular_name' => __('Party'),

        'add_new' => __('Add New'),

        'add_new_item' => __('Add New Party'),

        'edit_item' => __('Edit Party'),

        'new_item' => __('New Party'),

        'view_item' => __('View Party'),

        'all_items' => __('All Parties'),

        'search_items' => __('Search Parties'),

        'not_found' => __('No Parties found'),

        'not_found_in_trash' => __('No Parties found in Trash'),

        'parent_item_colon' => '',

        'menu_name' => __('Parties')

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

        'show_in_menu' => true,

        'query_var' => true,

        'rewrite' => array('slug' => 'party'),

        'capability_type' => 'post',

        'has_archive' => true,

        'hierarchical' => false,

        'exclude_from_search' => true,

        'menu_position' => 100,

        'supports' => array('title', 'thumbnail','editor'),

        'can_export' => true,

		

        'register_meta_box_cb' => ''

    );

    register_post_type('parties', $args);

    flush_rewrite_rules(false);    

}