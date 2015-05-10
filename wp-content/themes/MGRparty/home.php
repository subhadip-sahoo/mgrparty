<?php
/* Template Name: Home */
 get_header(); 
 global $post;
 ?>
 <?php include (TEMPLATEPATH . '/slider.php'); ?>
<section class="home-content">
<div class="container">
 <!--container top start-->
<div class="top-container">
<div class="bypt-tout-1">
<a href="<?php echo site_url();?>/pricing/" title="Book Your Party Today">
<div class="bg"></div>
<div class="show1"></div>            
<div class="show3"></div>
<div class="show2"></div>
<div class="btn">Book Your Party Today</div>
</a>
</div>
<div class="mario-pic">
 <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );?>" />
</div>
<div class="fran-opp">
<a href="http://mgrfranchise.com/" target="_blank" title="Franchise Opportunaties">
<div class="bg"></div>
<div class="frshow1"></div>            
<div class="frshow3"></div>
<div class="frshow2"></div>
<div class="btn">Franchise Opportunaties</div>
</a>
</div>
</div>
 <!--container top end-->
<div class="why-mgr">
 <?php the_content(); ?>
</div>
 <!--Client Testimonials start-->
<div class="client-test">
<h2>Party Testimonials</h2>
<!-- <div id="detailshowtestimonials_1" class="testimonials_details">						        	
<a href="javascript:void(0);" class="modalclose">X</a>
<div>18 August 2013</div> 
<p>By : Shauneen Beukes</p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem </p>
</div>-->
<ul id="home-testimonials">  
 <?php $loop = new WP_Query( "post_type=rc_testimonial&order=ASC" ); ?>		
 <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>		
<li>
    <div><?php the_time('j F, Y ') ?></div>
    <p>By : <?php echo get_post_meta($post->ID, 'name', true); ?></p>
    <p><?php echo get_post_meta($post->ID, 'excerpt', true); ?>...</p>
    <a href="javascript:void(0);"  class="showtestimonials" id="<?php echo $post->ID;?>" name="<?php echo get_template_directory_uri();?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/read-more-1.png" alt=""></a>
</li>
 <?php endwhile; ?>
 <?php wp_reset_query(); ?>
</ul>
<div class="clearfix"></div>
    <a id="prev-t" class="prev" href="#">&lt;</a>
    <a id="next-t" class="next" href="#">&gt;</a>
</div>
 <!--Client Testimonials end-->
 <!--Our Friends start-->
<div id="social-feed">
   <ul id="home-social"> 
       <?php apiData();?>
   </ul>
</div>
 <!--Our Friends end-->
</div>
 <!--social media start-->
<div class="container">
    <div class="our-fri">
    <h2>Our Friends</h2>
    <ul id="home-sponsors">
     <?php
     $loop = new WP_Query( "post_type=rc_friend&order=ASC" );	
     ?>
     <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>	
     <?php if (has_post_thumbnail( $post->ID ) ): ?>
     <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <li><img src="<?php echo $image[0]; ?>" /></li>
     <?php endif; ?>
     <?php endwhile; ?>
     <?php wp_reset_query(); ?>	
    </ul>
    <div class="clearfix"></div>
    <a id="prev" class="prev" href="#">&lt;</a>
    <a id="next" class="next" href="#">&gt;</a>
    </div>
</div>
 <!--social media end-->
</section>
 <?php get_footer(); ?>