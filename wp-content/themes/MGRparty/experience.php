<?php
/* Template Name: Experience Page */
 get_header(); ?> 
 <section class="home-content">
    	<div class="inner-container">       	
            <div class="bread-crumbs"><a href="<?php bloginfo('url'); ?>">Home</a> >> <?php the_title(); ?></div>           
            <!--left content start-->
            <div class="left-content">
            	<h1><?php the_title(); ?></h1>
				<?php the_post_thumbnail();?>
                <?php global $post;
                    echo $post->post_content;
                ?>
            </div>			
            <!--left content end-->           

            <!--right content start-->
			
           <?php include (TEMPLATEPATH . '/inner_sidebar.php'); ?> 

            <!--right content end-->           
        </div>

        

        <!--social media start-->

        <div id="social-feed">

			<ul id="home-social">

				 <?php apiData();?>

			</ul>

		</div>

        <!--social media end-->
    </section>
<?php get_footer(); ?>