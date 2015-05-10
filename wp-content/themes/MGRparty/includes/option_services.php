<?php
function service_meta_box_client_cb($post) {
    wp_nonce_field('service_meta_box_nonce', 'service_meta_box_nonce');    
}
add_action('save_post', 'service_save_client_data');
function service_save_client_data($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)

        return;

    if (!isset($_POST['service_meta_box_nonce']) || !wp_verify_nonce($_POST['service_meta_box_nonce'], 'service_meta_box_nonce'))

        return;

    if (!current_user_can('edit_post'))

        $allowed = array(

            'a' => array(

                'href' => array()

            )

        );   
}