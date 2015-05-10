<?php
function party_meta_box_client_cb($post) {
    wp_nonce_field('party_meta_box_nonce', 'party_meta_box_nonce');    
}
add_action('save_post', 'party_save_client_data');
function party_save_client_data($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)

        return;

    if (!isset($_POST['party_meta_box_nonce']) || !wp_verify_nonce($_POST['party_meta_box_nonce'], 'party_meta_box_nonce'))

        return;

    if (!current_user_can('edit_post'))

        $allowed = array(

            'a' => array(

                'href' => array()

            )

        );   
}