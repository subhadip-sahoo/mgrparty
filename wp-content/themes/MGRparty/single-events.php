<?php get_header(); ?> 
 <section class="home-content">
    	<div class="inner-container">       	
            <div class="bread-crumbs"><a href="<?php echo home_url();?>/events/">Events</a> >> <?php the_title(); ?></div>           
            <!--left content start-->
            <div class="left-content">
                <?php while ( have_posts() ) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile; // end of the loop. ?>
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