<?php
/* Template Name: Events */
global $wpdb;
$args = array( 'post_type' => 'parties', 'numberposts' => 4, 'order' => 'ASC' );
$lastposts = get_posts( $args );
get_header();
?>

<!--container start-->
    <section class="home-content">
    	<div class="inner-container">
        	
            <div class="bread-crumbs"><a href="<?php echo home_url();?>">Home</a> >> <?php the_title(); ?></div>
            
            <div id="nav-slider">
                <div class="title">
                    <h2>Parties</h2>
                    <ul id="nav-list" class="nav">
                        <li><a href="#birthday-parties"><?php echo $lastposts[0]->post_title;?></a></li>
                        <li><a href="#fundraisers"><?php echo $lastposts[1]->post_title;?></a></li>
                        <li><a href="#corporate-parties"><?php echo $lastposts[2]->post_title;?></a></li>
                        <li><a href="#more-partys"><?php echo $lastposts[3]->post_title;?></a></li>
                    </ul>
                </div>

                <div class="bg">
                    <span class="blue"></span>
                    <ul class="nav">
                        <li><span class="gray"></span></li>
                        <li><span class="gray"></span></li>
                        <li><span class="gray"></span></li>
                        <li><span class="gray"></span></li>
                        <li><span class="gray"></span></li>
                    </ul>
                </div>

                <div class="nav-slider-containment">
                    <div class="nav-slider">
                        <span class="handle btn-hover">
                            <span class="hover"></span>
                        </span>
                    </div>
                </div>

                <div class="nav-slider-containment">
                    <span class="nav-slider-arrow"></span>
                </div>
            </div>
            
            <div class="mobile-submenu">
            	<h1>Parties</h1>
            	<ul id="nav-list" class="nav">
                    <li class="selected"><a href="#birthday-parties"><?php echo $lastposts[0]->post_title;?></a></li>
                    <li><a href="#fundraisers"><?php echo $lastposts[1]->post_title;?></a></li>
                    <li><a href="#corporate-parties"><?php echo $lastposts[2]->post_title;?></a></li>
                    <li><a href="#more-partys"><?php echo $lastposts[3]->post_title;?></a></li>
                </ul>
            </div>
            <div class="left-sidebar">  <!--left-side bar-->
                <div id="pages">
                    <div id="page-birthday-parties" class="page">
						<?php $current_post_id = $lastposts[0]->ID; 
                            $image_id = get_post_meta($current_post_id, '_thumbnail_id', true);
                            $get_iamge_src = $wpdb->get_results("SELECT * FROM wp_posts WHERE ID = $image_id", ARRAY_A);
                            if(!empty($get_iamge_src)){
                                foreach ($get_iamge_src as $img_src) {
                        ?>
                        <img src="<?php echo $img_src['guid'];?>" />
                        <?php        }
                            }
                        ?>
                        <?php echo $lastposts[0]->post_content;?>		
                    </div>
                    <div id="page-fundraisers" class="page">
						<?php $current_post_id = $lastposts[1]->ID; 
                            $image_id = get_post_meta($current_post_id, '_thumbnail_id', true);
                            $get_iamge_src = $wpdb->get_results("SELECT * FROM wp_posts WHERE ID = $image_id", ARRAY_A);
                            if(!empty($get_iamge_src)){
                                foreach ($get_iamge_src as $img_src) {
                        ?>
                        <img src="<?php echo $img_src['guid'];?>" />
                        <?php        }
                            }
                        ?>
                        <?php echo $lastposts[1]->post_content;?>
                    </div>
                    <div id="page-corporate-parties" class="page">
						<?php $current_post_id = $lastposts[2]->ID; 
                            $image_id = get_post_meta($current_post_id, '_thumbnail_id', true);
                            $get_iamge_src = $wpdb->get_results("SELECT * FROM wp_posts WHERE ID = $image_id", ARRAY_A);
                            if(!empty($get_iamge_src)){
                                foreach ($get_iamge_src as $img_src) {
                        ?>
                        <img src="<?php echo $img_src['guid'];?>" />
                        <?php        }
                            }
                        ?>
                        <?php echo $lastposts[2]->post_content;?>
                    </div>
                    <div id="page-more-partys" class="page">
						<?php $current_post_id = $lastposts[3]->ID; 
                            $image_id = get_post_meta($current_post_id, '_thumbnail_id', true);
                            $get_iamge_src = $wpdb->get_results("SELECT * FROM wp_posts WHERE ID = $image_id", ARRAY_A);
                            if(!empty($get_iamge_src)){
                                foreach ($get_iamge_src as $img_src) {
                        ?>
                        <img src="<?php echo $img_src['guid'];?>" />
                        <?php        }
                            }
                        ?>
                        <?php echo $lastposts[3]->post_content;?>
                    </div>
                </div>
            </div>
            <div class="right-sidebar">  <!--right-sidebar start-->
            	<div id="testimonials">
                    <h2>Party Testimonials</h2>
                    <div class="carousel-nav clearfix">
                      <!-- arrows http://findicons.com/icon/235460/forward?id=388672 -->
                      <img src="<?php echo get_template_directory_uri();?>/images/btn-prev.png" id="prv-testimonial" class="prevbtn">
                      <img src="<?php echo get_template_directory_uri();?>/images/btn-next.png" id="nxt-testimonial" class="nextbtn">
                    </div>
                    <div class="carousel-wrap">
                      <ul id="testimonial-list" class="clearfix">
<?php $loop = new WP_Query( "post_type=rc_testimonial&order=ASC" ); ?>		
 <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <li>
                          <p class="context">"<?php echo substr(strip_tags(get_the_content($post->ID)), 0, 150); ?>..."</p>
                          <p class="credits"><?php echo get_post_meta($post->ID, 'name', true); ?></p>
                        </li>
 <?php endwhile; ?>
 <?php wp_reset_query(); ?>
                      </ul><!-- @end #testimonial-list -->
                    </div><!-- @end .carousel-wrap -->
                  </div>
                <div class="byb-fp-1"><a href="<?php echo site_url();?>/pricing/"><img src="<?php echo get_template_directory_uri();?>/images/book-pright.png" alt=""></a></div>
            </div>  <!--right-sidebar end-->
        </div>
                
    </section>
    <!--container end-->
<?php get_footer();?>