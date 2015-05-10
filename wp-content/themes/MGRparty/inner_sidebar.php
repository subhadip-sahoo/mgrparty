<div class="right-content">
            	<div class="client-testimonial">
                	<h2>Party Testimonials</h2>
                    <ul id="home-testimonials">          	
                        <?php $loop = new WP_Query( "post_type=rc_testimonial&order=ASC" ); ?>		
 <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>		
<li>
<p>"<?php echo substr(strip_tags(get_the_content($post->ID)), 0, 160); ?>..."</p>
<p><?php echo get_post_meta($post->ID, 'name', true); ?></p>
</li>
 <?php endwhile; ?>
 <?php wp_reset_query(); ?>
                    </ul>
                    <div class="clearfix"></div>
                    <a id="prev-t" class="prev" href="#">&lt;</a>
                    <a id="next-t" class="next" href="#">&gt;</a>
                </div>
				
            	<div class="byb-fp-1"><a href="<?php echo site_url();?>/pricing/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/book-pright.png" alt=""></a></div>
                <div class="byb-fp-2"><a href="http://mgrfranchise.com/" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/fran-opp-right.png" alt=""></a></div>
            </div>