<?php
add_action('init', 'revolutionaries');
function revolutionaries() {

    $labels = array(

        'name' => __('Revolutionaries'),

        'singular_name' => __('Revolutionary'),

        'add_new' => __('Add New'),

        'add_new_item' => __('Add New Revolutionary'),

        'edit_item' => __('Edit Revolutionary'),

        'new_item' => __('New Revolutionary'),

        'view_item' => __('View Revolutionary'),

        'all_items' => __('All Revolutionaries'),

        'search_items' => __('Search Revolutionaries'),

        'not_found' => __('No Revolutionaries found'),

        'not_found_in_trash' => __('No Revolutionaries found in Trash'),

        'parent_item_colon' => '',

        'menu_name' => __('Revolutionaries')

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

        'show_in_menu' => true,

        'query_var' => true,

        'rewrite' => array('slug' => 'revolutionary'),

        'capability_type' => 'post',

        'has_archive' => true,

        'hierarchical' => false,

        'exclude_from_search' => true,

        'menu_position' => 100,

        'supports' => array('title'),
        
        'can_export' => true,
        
        'register_meta_box_cb' => ''
    );

    register_post_type('revolutionaries', $args);
    
    $taxonomy_category_args = array(
        'public' => true,
        'hierarchical' => true,
        'labels' => array(
            'name' => __('Revolutionary Categories', 'taxonomy general name'),
            'singular_name' => __('Category', 'taxonomy singular name'),
            'search_items' => __('Search Category'),
            'popular_items' => __('Popular Revolutionaries'),
            'all_items' => __('All Revolutionaries'),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __('Edit Revolutionary'),
            'update_item' => __('Update Revolutionary'),
            'add_new_item' => __('Add New Revolutionary'),
            'new_item_name' => __('New Revolutionary Name'),
            'separate_items_with_commas' => __('Separate categories with commas'),
            'add_or_remove_items' => __('Add or remove category'),
            'choose_from_most_used' => __('Choose from the most used categories'),
            'menu_name' => __('Revolutionary Categories')
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '',
        'query_var' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'revolutionary_category')
    );

    register_taxonomy('revolutionary_category', 'revolutionaries', $taxonomy_category_args);

    #TAXONOMY TAG
    $taxonomy_tag_args = array(
        'public' => true,
        'hierarchical' => false,
        'labels' => array(
            'name' => __('Revolutionary Tags', 'taxonomy general name'),
            'singular_name' => __('Tag', 'taxonomy singular name'),
            'search_items' => __('Search Tag'),
            'popular_items' => __('Popular Tags'),
            'all_items' => __('All Tags'),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __('Edit Tag'),
            'update_item' => __('Update Tag'),
            'add_new_item' => __('Add New Tag'),
            'new_item_name' => __('New Tag Name'),
            'separate_items_with_commas' => __('Separate tags with commas'),
            'add_or_remove_items' => __('Add or remove tag'),
            'choose_from_most_used' => __('Choose from the most used tags'),
            'menu_name' => __('Revolutionary Tags')
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '',
        'query_var' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'revolutionary_tag')
    );

    register_taxonomy('revolutionary_tag', 'revolutionaries', $taxonomy_tag_args);

    flush_rewrite_rules(false);    
}