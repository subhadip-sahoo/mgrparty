<?php
/*
 * Register CPT rc_testimonials
 *
 */
function rc_testimonial_setup_post_types() {

	$testimonial_labels =  apply_filters( 'rc_testimonial_labels', array(
		'name'                => 'Our Testimonials',
		'singular_name'       => 'Our Testimonial',
		'add_new'             => __('Add New', 'rc_testimonial'),
		'add_new_item'        => __('Add New Testimonial', 'rc_testimonial'),
		'edit_item'           => __('Edit Testimonial', 'rc_testimonial'),
		'new_item'            => __('New Testimonial', 'rc_testimonial'),
		'all_items'           => __('All Testimonials', 'rc_testimonial'),
		'view_item'           => __('View Testimonial', 'rc_testimonial'),
		'search_items'        => __('Search Testimonials', 'rc_testimonial'),
		'not_found'           => __('No Testimonials found', 'rc_testimonial'),
		'not_found_in_trash'  => __('No Testimonials found in Trash', 'rc_testimonial'),
		'parent_item_colon'   => '',
		'menu_name'           => __('Testimonials', 'rc_testimonial'),
		'exclude_from_search' => true
	) );


	$testimonials_args = array(
		'labels' 			=> $testimonial_labels,
		'public' 			=> true,
		'publicly_queryable'=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'query_var' 		=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'hierarchical' 		=> false,
		'supports' 			=> apply_filters('rc_friend_supports', array( 'title', 'editor', 'thumbnail' ) ),
		'rewrite' => array('slug' => 'testimonials', 'with_front' => FALSE)
	);
	register_post_type( 'rc_testimonial', apply_filters( 'rc_testimonials_post_type_args', $testimonials_args ) );

}

add_action('init', 'rc_testimonial_setup_post_types');
?>
<?php
add_action('add_meta_boxes', 'testimonial_meta_box_add');

function testimonial_meta_box_add() {
    add_meta_box('kopa-client-edit', 'Meta box', 'testimonial_client_cb', 'rc_testimonial', 'normal', 'high');
}

function testimonial_client_cb($post) {
    $name = get_post_meta($post->ID, 'name', true);
	$excerpt = get_post_meta($post->ID, 'excerpt', true);
	    wp_nonce_field('testimonial_meta_box_nonce', 'testimonial_meta_box_nonce');
    
    ?>
	<p class="kopa_option_box">
        <label for="Client Name" class="kopa-desc" style="vertical-align: top;"><?php _e('Client Name'); ?>:</label>
		<input type="text" name="name" class="kopa-layout-select" value="<?php echo $name; ?>">
        <span></span>
    </p> 
<p class="kopa_option_box">
        <label for="Excerpt" class="kopa-desc" style="vertical-align: top;"><?php _e('Excerpt'); ?>:</label>
		<textarea rows="4" cols="67" id="product_ingredients" type="text" name="excerpt" 
            class="kopa-layout-select"><?php echo $excerpt; ?></textarea> 

        <span></span>
    </p> 

	

    <?php
}
add_action('save_post', 'testimonial_client_data');

function testimonial_client_data($post_id) {

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!isset($_POST['testimonial_meta_box_nonce']) || !wp_verify_nonce($_POST['testimonial_meta_box_nonce'], 'testimonial_meta_box_nonce'))
        return;
    if (!current_user_can('edit_post'))
        $allowed = array(
            'a' => array(
                'href' => array()
            )
        );

   
	if (isset($_POST['name']))
        update_post_meta($post_id, 'name', wp_kses($_POST['name'], $allowed));
	if (isset($_POST['excerpt']))
        update_post_meta($post_id, 'excerpt', wp_kses($_POST['excerpt'], $allowed));
	
}
?>
<?php
/*
 * Add [rc_faq limit="-1"] shortcode
 *
 */
function rc_testimonial_shortcode( $atts, $content = null ) {
	
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
	$post_type 		= 'rc_testimonial';
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

add_shortcode("rc_testimonial", "rc_testimonial_shortcode");