<?php
/* Template Name: Pricing Page */
 get_header(); ?> 
<style> 
 .textbox { 
    -webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 5px; 
    border: 1px solid #848484; 
    outline:0; 
    height:25px; 
    width: 275px; 
	margin-top:12px;
 } 
 
 .search{
  background: none repeat scroll 0 0 #00C2F3;
    border: medium none;
    color: #FFFFFF;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    margin-right: 1%;
    padding: 4px 12px;
    text-transform: uppercase;
 }
</style> 

 <section class="home-content">
    	<div class="inner-container">       	
            <div class="bread-crumbs"><a href="<?php bloginfo('url'); ?>">Home</a> >> <?php the_title(); ?></div>           
            <!--left content start-->
            <div class="left-content">
            	<h1><?php the_title(); ?></h1>
				<div>
				<h4>Get Local Pricing and Request More Information</h4>
				<p>In order to get pricing and booking information for your area, we need to know where you are located.</p>
				<p>Please enter your ZIP/Postal Code below:</p>
                <label for="zipField">Your Zip Code:</label>
				<form action="http://mgrassistant.com/External/Utils/franByZip.aspx" method="get">



<p>

<input type="text" value="" placeholder="Zip Code" id="zip" name="zip" class="textbox" autocomplete="off"/>

<input id="submit-button" type="submit" value="Search" class="search">

<input type="hidden" id="landing" name="landing" value="<?php bloginfo('url') ;?>/results/"/>

</form>
<span><img src="<?php bloginfo('stylesheet_directory');?>/images/pricing-2.png" /></span>
				</div>
				


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