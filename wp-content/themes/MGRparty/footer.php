<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<footer class="footer">
<!--footer top start-->
<div class="footer-top">
<div class="footer-cont">
<div class="glow"></div>
<div class="events">
<h3>Events</h3>
  <!-- footer menu 1 -->                 
<?php $args = array(
  'theme_location'  => 'primary',
  'menu'            => 'footer1', 
  'container'       => '', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => '', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => '');
?>
<?php wp_nav_menu( $args );  ?>
  <!-- footer menu 2 -->             	
<?php $args = array(
  'theme_location'  => 'primary',
  'menu'            => 'footer2', 
  'container'       => '', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => '', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => '');
?>
<?php wp_nav_menu( $args );  ?>
  <!-- footer menu 3 --> 
<?php $args = array(
  'theme_location'  => 'primary',
  'menu'            => 'footer3', 
  'container'       => '', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => '', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => '');
?>
<?php wp_nav_menu( $args );  ?>
  <!-- footer menu 4 --> 
<?php $args = array(
  'theme_location'  => 'primary',
  'menu'            => 'footer4', 
  'container'       => '', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => '', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => '');
?>
<?php wp_nav_menu( $args );  ?>
</div>
<div class="con-w">
<h3>Connect with</h3>
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Social Icon ') ) : ?>
 <?php endif; ?>
<a href="<?php bloginfo('url') ;?>">
<div class="f-contact">
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Logo ') ) : ?>
 <?php endif; ?>
</div>
</a>
<div class="footer-menu">
<?php $args = array(
  'theme_location'  => 'primary',
  'menu'            => 'footer-page', 
  'container'       => '', 
  'container_class' => '', 
  'container_id'    => '',
  'menu_class'      => '', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<ul>%3$s</ul>',
  'depth'           => 0,
  'walker'          => '');
?>
<?php wp_nav_menu( $args );  ?>	
</div>
</div>
</div>
</div>
 <!--footer top end-->
 <!--footer bottom start-->
<div class="footer-bottom">
<div class="footer-cont">
<div class="ft-ribbon"></div>
<div class="footer-bt-left">
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Text ') ) : ?>
 <?php endif; ?>
</div>
<div class="footer-bt-right">
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Copyright Text ') ) : ?>
 <?php endif; ?>
</div>
</div>
</div>
 <!--footer bottom end-->
</footer>
 <!--footer end-->
</div>  
 <!--wrapper end-->
<div id="detailshowtestimonials_1" class="testimonials_details"></div>
<div id="overlay"></div>
 <?php wp_footer(); ?>
 <!--toPopup start-->
<div id="toPopup"> <!-- Don't change this id name -->

    <div class="close"></div><!-- Don't change this class name -->

    <span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span><!-- Don't change this class name -->


        <div class="open_post_bg_in">

            <h2>Contact Us</h2> 

            <div id="popup_content"> <!--your content start--><!-- Don't change this id name -->

                <p id="add_career_result"></p>

                <section class="tabs">
                    <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
                    <label for="tab-1" class="tab-label-1 radio-tab">TELL US HOW WE DID</label>
            
                    <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
                    <label for="tab-2" class="tab-label-2 radio-tab">LOOKING FOR A JOB</label>
            
                    <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
                    <label for="tab-3" class="tab-label-3 radio-tab">SUGGESTIONS AND FEEDBACK</label>
                    
                    <div class="clear-shadow"></div>
				
                    <div class="content-pop-box">
                        <div class="content-1 slide-con">
                            <?php echo do_shortcode('[contact-form-7 id="259" title="Buisness form" html_id="buisness_form"]');?>
                        </div>
                        <div class="content-2 slide-con">
							<?php echo do_shortcode('[contact-form-7 id="261" title="Submit resume" html_id="submit_resume_form"]');?>                            
                        </div>
                        <div class="content-3 slide-con">
                            <?php echo do_shortcode('[contact-form-7 id="260" title="Hi" html_id="hi_form"]');?>
                        </div>                        
                    </div>
                </section>
                
                <div class="contact-footer">
                	<h3>Oh, there we are!</h3>
                    <div class="contact-info">
                    	<div class="map"><iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Mobile+Gaming+Revolution&amp;aq=&amp;sll=28.06471,-82.465439&amp;sspn=0.424135,0.529404&amp;ie=UTF8&amp;hq=Mobile+Gaming+Revolution&amp;hnear=&amp;ll=28.095001,-82.501488&amp;spn=0.424135,0.529404&amp;t=m&amp;output=embed"></iframe></div>
                        <div class="vcard">
                        	<a href="<?php echo home_url();?>"><img src="<?php echo get_template_directory_uri();?>/images/logo-1920.png" alt=""></a>
                            <p>PO BOX 342153 Tampa Fl 33694</p>
                            <p>p: 855-9- GameOn</p>
                            <p>f: 855-774-2276</p>
                            <p>e:Info@MGRparty.com</p>
                    	</div>
                    </div>
                    <div class="social-card">
                    	<h4>Find us on:</h4>
                        <ul>
                            <li><a href="https://www.facebook.com/MGRpartyTampa"><img src="<?php echo get_template_directory_uri();?>/images/facebook-icon.png" alt="">Facebook</a></li>
                            <li><a href="https://twitter.com/MGRpartyTampa"><img src="<?php echo get_template_directory_uri();?>/images/twitter-icon.png" alt="">Twitter</a></li>
                            <li><a href="http://www.youtube.com/user/mobilegaminglounge"><img src="<?php echo get_template_directory_uri();?>/images/you-tube-icon.png" alt="">Youtube</a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/images/pic-icon.png" alt="">Instagram</a></li>
                        </ul>
                    </div>
                </div>

            </div> <!--your content end-->

        </div>
    

</div> <!--toPopup end-->

<div class="loader"></div>

<div id="backgroundPopup"></div>
</body>
</html>