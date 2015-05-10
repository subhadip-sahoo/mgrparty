<?php
/* Template Name: Services */
$args = array( 'post_type' => 'services', 'numberposts' => 2, 'order' => 'ASC' );
$lastposts = get_posts( $args );
get_header();
?>
<!--container start-->
    <section class="home-content">
    	<div class="inner-container">
            <div class="bread-crumbs"><a href="<?php echo home_url();?>">Home</a> >> <?php the_title(); ?></div>
            <div id="nav-slider" class="services">
                    <div class="title">
                            <h2>Services</h2>
                            <ul id="nav-list" class="nav">
                                <li><a href="#gaming-theater"><?php echo $lastposts[0]->post_title;?></a></li>
                                <li><a href="#laser-tag"><?php echo $lastposts[1]->post_title;?></a></li>
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
            	<h1>Services</h1>
            	<ul id="nav-list" class="nav">
                    <li class="selected"><a href="#gaming-theater"><?php echo $lastposts[0]->post_title;?></a></li>
                    <li><a href="#laser-tag"><?php echo $lastposts[1]->post_title;?></a></li>
                </ul>
            </div>
            <div class="left-sidebar">  <!--left-side bar-->
				<div id="pages">
					<div id="page-gaming-theater" class="page">
						<?php echo $lastposts[0]->post_content;?>
					</div>
					<div id="page-laser-tag" class="page">
						<?php echo $lastposts[1]->post_content;?>
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