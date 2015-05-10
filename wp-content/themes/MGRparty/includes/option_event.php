<?php
add_action('add_meta_boxes', 'event_meta_box_add');

function event_meta_box_add() {
    add_meta_box('event-client-edit', 'Meta box', 'event_meta_box_client_cb', 'events', 'normal', 'high');
}

function event_meta_box_client_cb($post) {
    $title = get_post_meta($post->ID, 'title', true);
	$product_ingredients = get_post_meta($post->ID, 'product_ingredients', true);
    wp_nonce_field('event_meta_box_nonce', 'event_meta_box_nonce');
    
    ?>
    
    <p class="kopa_option_box">
        <label for="Event Title" class="kopa-desc" style="vertical-align: top;"><?php _e('Event Title'); ?>:</label>
       	<textarea rows="4" cols="67" id="product_information" type="text" name="title" 
            class="kopa-layout-select"><?php echo $title; ?></textarea> 
        <span></span>
    </p> 
	
	

    <?php
}

add_action('save_post', 'event_save_client_data');

function event_save_client_data($post_id) {

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!isset($_POST['event_meta_box_nonce']) || !wp_verify_nonce($_POST['event_meta_box_nonce'], 'event_meta_box_nonce'))
        return;
    if (!current_user_can('edit_post'))
        $allowed = array(
            'a' => array(
                'href' => array()
            )
        );

   
	if (isset($_POST['title']))
        update_post_meta($post_id, 'title', wp_kses($_POST['title'], $allowed));
	
}
  
