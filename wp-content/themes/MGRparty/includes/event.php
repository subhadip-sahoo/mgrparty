<?php

add_action('init', 'event');

function event() {
    $labels = array(
        'name' => __('Events'),
        'singular_name' => __('Event'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New Event'),
        'edit_item' => __('Edit Event'),
        'new_item' => __('New Event'),
        'view_item' => __('View Event'),
        'all_items' => __('All Events'),
        'search_items' => __('Search Events'),
        'not_found' => __('No Events found'),
        'not_found_in_trash' => __('No Events found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => __('Events')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'event'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => true,
        'menu_position' => 100,
        'supports' => array('title', 'thumbnail','editor'),
        'can_export' => true,
		
        'register_meta_box_cb' => ''
    );

    register_post_type('events', $args);
    flush_rewrite_rules(false);    
}