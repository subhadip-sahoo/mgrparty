<?php
/*
Template Name: Events Page
*/
 get_header(); ?> 
 <style>
 .accord-content { display:none; }
 
.accord-header {
    border: 1px solid #f1f1f1;
    padding: 5px;
	margin-top:7px;
}

.accord-content{
border: 1px solid #eee;
    padding: 7px;
	margin-top:7px;
	margin-bottom:7px;
}
 </style>
    
    
 <section class="home-content">
    	<div class="inner-container">
        	
            <div class="bread-crumbs"><a href="<?php bloginfo('url'); ?>">Home</a> >> <?php the_title(); ?></div>
            
            <!--left content start-->
            <div class="left-content">
            	<h1><?php the_title(); ?></h1>
				<?php $loop = new WP_Query( "post_type=events&order=ASC" ); ?>		
 <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


          <div class="accordion">
    <div class="accord-header"><?php echo get_post_meta($post->ID, 'title', true); ?></div>
    <div class="accord-content"><?php the_content(); ?></div>
      </div>  
  <?php endwhile; ?>
 <?php wp_reset_query(); ?>	  
            </div>
			
            <!--left content end-->
            
            <!--right content start-->
           <?php include (TEMPLATEPATH . '/inner_sidebar.php'); ?> 
            <!--right content end-->
            
        </div>
        
        <!--social media start-->
        <div id="social-feed">
			<ul id="home-social">
				 <?php apiData();  ?> 
			</ul>
		</div>
        <!--social media end-->
        
    </section>
	 <?php 
 get_footer(); ?>