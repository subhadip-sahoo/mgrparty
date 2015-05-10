<?php
/*
 * Register CPT rc_booking
 *
 */
function rc_booking_setup_post_types() {

	$booking_labels =  apply_filters( 'rc_booking_labels', array(
		'name'                => 'Bookings',
		'singular_name'       => 'Booking',
		'add_new'             => __('Add Info for zip code', 'rc_booking'),
		'add_new_item'        => __('Add New Info for zip code', 'rc_booking'),
		'edit_item'           => __('Edit Info for zip code', 'rc_booking'),
		'new_item'            => __('New Info for zip code', 'rc_booking'),
		'all_items'           => __('All Info for zip code', 'rc_booking'),
		'view_item'           => __('View Info for zip code', 'rc_booking'),
		'search_items'        => __('Search Info for zip code', 'rc_booking'),
		'not_found'           => __('No Info for zip code found', 'rc_booking'),
		'not_found_in_trash'  => __('No Info for zip code found in Trash', 'rc_booking'),
		'parent_item_colon'   => '',
		'menu_name'           => __('Bookings', 'rc_booking'),
		'exclude_from_search' => true
	) );


	$booking_args = array(
		'labels' 			=> $booking_labels,
		'public' 			=> true,
		'publicly_queryable'=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'query_var' 		=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'hierarchical' 		=> false,
		'supports' 			=> apply_filters('rc_booking_supports', array( 'title', 'editor', 'thumbnail' ) ),
	);
	register_post_type( 'rc_booking', apply_filters( 'rc_booking_post_type_args', $booking_args ) );

}

add_action('init', 'rc_booking_setup_post_types');
?>
<?php
add_action('add_meta_boxes', 'kopa_client_meta_box_add');

function kopa_client_meta_box_add() {
    add_meta_box('kopa-client-edit', 'Meta box', 'kopa_meta_box_client_cb', 'rc_booking', 'normal', 'high');
}

function kopa_meta_box_client_cb($post) {
    $name = get_post_meta($post->ID, 'name', true);
	$phone = get_post_meta($post->ID, 'phone', true);
	$email = get_post_meta($post->ID, 'email', true);
	$zip = get_post_meta($post->ID, 'zip', true);
    wp_nonce_field('client_meta_box_nonce', 'client_meta_box_nonce');
    
    ?>
	<p class="kopa_option_box">
        <label for="Zip" class="kopa-desc" style="vertical-align: top;"><?php _e('zip'); ?>:</label>
		<input type="text" name="zip" class="kopa-layout-select" value="<?php echo $zip; ?>">
        <span></span>
    </p> 
<p class="kopa_option_box">
        <label for="Name" class="kopa-desc" style="vertical-align: top;"><?php _e('Name'); ?>:</label>
		<input type="text" name="name" class="kopa-layout-select" value="<?php echo $name; ?>">
        <span></span>
    </p> 
	
	<p class="kopa_option_box">
        <label for="Phone" class="kopa-desc" style="vertical-align: top;"><?php _e('Phone'); ?>:</label>
		<input type="text" name="phone" class="kopa-layout-select" value="<?php echo $phone; ?>">
        <span></span>
    </p> 
	<p class="kopa_option_box">
        <label for="Email" class="kopa-desc" style="vertical-align: top;"><?php _e('Email'); ?>:</label>
		<input type="text" name="email" class="kopa-layout-select" value="<?php echo $email; ?>">
        <span></span>
    </p>
	

    <?php
}
add_action('save_post', 'kopa_save_client_data');

function kopa_save_client_data($post_id) {

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!isset($_POST['client_meta_box_nonce']) || !wp_verify_nonce($_POST['client_meta_box_nonce'], 'client_meta_box_nonce'))
        return;
    if (!current_user_can('edit_post'))
        $allowed = array(
            'a' => array(
                'href' => array()
            )
        );

   
	if (isset($_POST['name']))
        update_post_meta($post_id, 'name', wp_kses($_POST['name'], $allowed));
	if (isset($_POST['phone']))
        update_post_meta($post_id, 'phone', wp_kses($_POST['phone'], $allowed));
	if (isset($_POST['email']))
        update_post_meta($post_id, 'email', wp_kses($_POST['email'], $allowed));
	if (isset($_POST['zip']))
        update_post_meta($post_id, 'zip', wp_kses($_POST['zip'], $allowed));
}
?>
<?php
/*
 * Add [rc_faq limit="-1"] shortcode
 *
 */
function rc_booking_shortcode( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		"limit" => ''
	), $atts));
	
	// Define limit
	if( $limit ) { 
		$posts_per_page = $limit; 
	} else {
		$posts_per_page = '-1';
	}
	
	ob_start();

	// Create the Query
	$post_type 		= 'rc_booking';
	$orderby 		= 'menu_order';
	$order 			= 'ASC';
				
	$query = new WP_Query( array ( 
								'post_type'      => $post_type,
								'posts_per_page' => $posts_per_page,
								'orderby'        => $orderby, 
								'order'          => $order,
								'no_found_rows'  => 1
								) 
						);
	
	//Get post type count
	$post_count = $query->post_count;
	$i = 1;
	
	// Displays FAQ info
	if( $post_count > 0) :
	
		// Loop
		while ($query->have_posts()) : $query->the_post();
		?>
		
		<h3 class="rc_faq_title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3>
		<p ><?php echo get_the_content(); ?></p>

		<?php
		$i++;
		endwhile;
		
	endif;
	
	// Reset query to prevent conflicts
	wp_reset_query();
	
	?>
	
	<?php
	
	return ob_get_clean();

}

add_shortcode("rc_faq", "rc_faq_shortcode");