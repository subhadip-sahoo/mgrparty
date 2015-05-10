<?php
/*
 * Register CPT rc_friend
 *
 */
function rc_friend_setup_post_types() {
	$faq_labels =  apply_filters( 'rc_friend_labels', array(
		'name'                => 'Our Friends',
		'singular_name'       => 'Our Friend',
		'add_new'             => __('Add New', 'rc_friend'),
		'add_new_item'        => __('Add New Friend', 'rc_friend'),
		'edit_item'           => __('Edit Friend', 'rc_friend'),
		'new_item'            => __('New Friend', 'rc_friend'),
		'all_items'           => __('All Our Friends', 'rc_friend'),
		'view_item'           => __('View Friend', 'rc_friend'),
		'search_items'        => __('Search Our Friends', 'rc_friend'),
		'not_found'           => __('No Friends found', 'rc_friend'),
		'not_found_in_trash'  => __('No Friends found in Trash', 'rc_friend'),
		'parent_item_colon'   => '',
		'menu_name'           => __('Our Friends', 'rc_friend'),
		'exclude_from_search' => true
	) );


	$friend_args = array(
		'labels' 			=> $faq_labels,
		'public' 			=> true,
		'publicly_queryable'=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'query_var' 		=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'hierarchical' 		=> false,
		'supports' 			=> apply_filters('rc_friend_supports', array( 'title', 'thumbnail' ) ),
	);
	register_post_type( 'rc_friend', apply_filters( 'rc_faq_post_type_args', $friend_args ) );

}

add_action('init', 'rc_friend_setup_post_types');
?>

<?php
/*
 * Add [rc_faq limit="-1"] shortcode
 *
 */
function rc_friend_shortcode( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		"limit" => ''
	), $atts));
	
	// Define limit
	if( $limit ) { 
		$posts_per_page = $limit; 
	} else {
		$posts_per_page = '-1';
	}
	
	

	// Create the Query
	$post_type 		= 'rc_friend';
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
		ob_start();
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
	return ob_get_clean();
}

add_shortcode("rc_friend", "rc_friend_shortcode");