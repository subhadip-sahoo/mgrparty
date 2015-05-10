<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
 <section class="home-content">
    	<div class="inner-container">       	
            <div class="bread-crumbs"><a href="<?php echo home_url();?>">Home</a> >> Not Found</div>           
            <!--left content start-->
            <div class="left-content">
               
                    <h1><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentytwelve' ); ?></h1>
					


<p><?php _e( 'We`re sorry, but the page you are looking for doesn`t exist.', 'twentytwelve' ); ?></p>
				<p>Please check entered address and try again or <a href="<?php echo home_url();?>">Home Page</a></p>
               
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