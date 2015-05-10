<?php
/*
 * Register CPT rc_faq
 *
 */
function rc_faq_setup_post_types() {

	$faq_labels =  apply_filters( 'rc_faq_labels', array(
		'name'                => 'FAQs',
		'singular_name'       => 'FAQ',
		'add_new'             => __('Add New', 'rc_faq'),
		'add_new_item'        => __('Add New FAQ', 'rc_faq'),
		'edit_item'           => __('Edit FAQ', 'rc_faq'),
		'new_item'            => __('New FAQ', 'rc_faq'),
		'all_items'           => __('All FAQs', 'rc_faq'),
		'view_item'           => __('View FAQ', 'rc_faq'),
		'search_items'        => __('Search FAQs', 'rc_faq'),
		'not_found'           => __('No FAQs found', 'rc_faq'),
		'not_found_in_trash'  => __('No FAQs found in Trash', 'rc_faq'),
		'parent_item_colon'   => '',
		'menu_name'           => __('FAQs', 'rc_faq'),
		'exclude_from_search' => true
	) );


	$faq_args = array(
		'labels' 			=> $faq_labels,
		'public' 			=> true,
		'publicly_queryable'=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'query_var' 		=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'hierarchical' 		=> false,
		'supports' 			=> apply_filters('rc_faq_supports', array( 'title' ) ),
	);
	register_post_type( 'rc_faq', apply_filters( 'rc_faq_post_type_args', $faq_args ) );

}

add_action('init', 'rc_faq_setup_post_types');
?>

<?php
/*
 * Add [rc_faq limit="-1"] shortcode
 *
 */add_shortcode("rc_faq", "rc_faq_shortcode");
function rc_faq_shortcode( $atts, $content = null ) {
	
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
	$post_type 		= 'rc_faq';
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
	if( $post_count > 0) :		ob_start();
	
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

