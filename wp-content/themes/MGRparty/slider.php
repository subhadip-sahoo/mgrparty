<div class="home-slider">  
 <!--home slider start-->
<div id="hero">
<div id="hero-gallery" class="royalSlider rsDefault visibleNearby">
<?php $loop = new WP_Query( "post_type=pdf_resource&order=ASC" ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

 <div class="rsContent">
 <div class="slide"> 
 <div class="slider-text">	
 <?php $aa= get_the_ID(); ?>
 <?php $post_id = get_the_id(); ?>   
<?php echo get_field('text_1', $post_id, false); ?>

 <p><?php //echo get_field('text_3', $post_id, false); ?> </p>  
 </div> 
 <a href="<?php echo get_field('banner_link', $post_id, false); ?>" target="_blank">
 <img class="rsImg" data-rsw="1140" data-rsh="500" src="<?php echo the_field('image', $post_id, false); ?>"></a> 
 </div> 
 <div class="infoBlock rsABlock" data-fade-effect="true" data-move-offset="10" data-move-effect="bottom" data-delay="200" data-speed="200">     
 <?php if(get_field('banner_link', $post_id, false)==''){ ?>
 <div class="btn-hero">   
 <form action="http://mgrassistant.com/External/Utils/franByZip.aspx" method="get">       
 <label>Availability and Pricing</label>     
 <p>
 <input type="text" value="" placeholder="Zip Code" id="zip" name="zip" class="textbox" autocomplete="off"/>
 <input id="submit-button" type="submit" value="Search" class="search">
<input type="hidden" id="landing" name="landing" value="<?php bloginfo('url') ;?>/results/"/>
 </p>  
 </form>      
 </div>  
<?php } ?> 
 </div>          
 </div>  
 <?php endwhile; ?> 
 <?php wp_reset_query(); ?>                    
</div>
</div>
</div> 