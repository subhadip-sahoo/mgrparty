<?php
/* Template Name: Gallery */
global $wpdb;
$image_path = ABSPATH.'/wp-content/gallery';
$image_url = site_url().'/wp-content/gallery';
get_header();
?>
<section class="home-content">
    	<div class="inner-container gallary">
        	
            <div class="bread-crumbs"><a href="<?php echo home_url();?>">Home</a> >> <?php the_title();?></div>
            
            <h1>Gallery</h1>
            
            <!--left content start-->
            <div id="featured-builds">
            	<div>
<?php
$all_galleries = $wpdb->get_results("SELECT * FROM wp_ngg_gallery", ARRAY_A);
if(!empty($all_galleries)){
    foreach ($all_galleries as $all_gallerie) {
        $preview_pic = $wpdb->get_results("SELECT * FROM wp_ngg_pictures WHERE pid = ".$all_gallerie['previewpic'], ARRAY_A);
        if(!empty($preview_pic)){
            foreach ($preview_pic as $pic) {
?>
                    <div class="f-car active" id="<?php echo $all_gallerie['name'];?>">
                      <div class="car-img"><img src="<?php echo $image_url;?>/<?php echo $all_gallerie['name'];?>/<?php echo $pic['filename'];?>" alt="<?php echo $pic['alttext'];?>"></div>
                      <div class="car-details">
                        <p>Featured build</p>
                        <h2><?php echo $all_gallerie['title'];?></h2>
                      </div>
                      <div class="view-gallery">
                        <a class="sh-gallery" href="#">View Gallery<span>&gt;&gt;</span></a>
                      </div>
                    </div>
<?php
            }
        }
    }
}
?>                                    
                </div>
            
            	<div class="t-car">
                  <ul id="featured-thumbs">
<?php
$count = 1;
$all_galleries = $wpdb->get_results("SELECT * FROM wp_ngg_gallery", ARRAY_A);
if(!empty($all_galleries)){
    foreach ($all_galleries as $all_gallerie) {
        $preview_pic = $wpdb->get_results("SELECT * FROM wp_ngg_pictures WHERE pid = ".$all_gallerie['previewpic'], ARRAY_A);
        if(!empty($preview_pic)){
            foreach ($preview_pic as $pic) {
                $count++;
?>                      
                    <li>
                      <a class="car <?php echo ($count > 2)?'':'active';?>" href="#<?php echo $all_gallerie['name'];?>">
                        <img src="<?php echo $image_url;?>/<?php echo $all_gallerie['name'];?>/thumbs/thumbs_<?php echo $pic['filename'];?>" alt="<?php echo $pic['alttext'];?>">
                        <div class="t-overlay"></div>
                      </a>
                    </li>
<?php
            }
        }
    }
}
?>                    
                  </ul>
                  <div class="clearfix"></div>
                  <a id="prev" class="prev" href="#">&lt;</a>
                  <a id="next" class="next" href="#">&gt;</a>
                </div>
            </div>
            <!--right content end-->
            
        </div>
        
    </section>
<?php get_footer();?>