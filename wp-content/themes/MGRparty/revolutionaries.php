<?php
/* Template Name: Revolutionaries */
get_header();
global $post;
?>
<!--container start-->
    <section class="home-content">
    	<div class="inner-container">
        	
            <div class="bread-crumbs"><a href="<?php echo home_url();?>">Home</a> >> <?php the_title(); ?></div>
            
            <div id="nav-slider" class="sprite-revolu">
                <div class="title">
                    <h2>Revolutionaries</h2>
                    <ul id="nav-list" class="nav">
                        <li><a href="#meet-the-blitizens">MEET THE TEAM</a></li>
                        <li><a href="#fundraisers">STALK US</a></li>
                    </ul>
                </div>

                <div class="bg">
                    <span class="blue"></span>
                    <ul class="nav">
                        <li><span class="gray"></span></li>
                        <li><span class="gray"></span></li>
                        <li><span class="gray"></span></li>
                        <li><span class="gray"></span></li>
                        <li><span class="gray"></span></li>
                    </ul>
                </div>

                <div class="nav-slider-containment">
                    <div class="nav-slider">
                        <span class="handle btn-hover">
                            <span class="hover"></span>
                        </span>
                    </div>
                </div>

                <div class="nav-slider-containment">
                    <span class="nav-slider-arrow"></span>
                </div>
            </div>
            
            <div class="mobile-submenu">
            	<h1>Parties</h1>
            	<ul id="nav-list" class="nav">
                    <li class="selected"><a href="#meet-the-blitizens">MEET THE TEAM</a></li>
                    <li><a href="#fundraisers">STALK US</a></li>
                </ul>
            </div>
            
            <div id="pages">
                <div id="page-meet-the-blitizens" class="page">
                    <div class="filters">
                        <ul>
                            <li class="filter-show-all"><a href="#all">SHOW ALL</a></li>
<?php
	$categories = get_terms('revolutionary_category', 'orderby=id&order=ASC&hide_empty=1');
   foreach ( $categories as $category ) {	
?>
                            <li class="filter-leadership <?php if($category->slug == 'leadership'){echo 'selected';}?>"><a href="#<?php echo $category->slug;?>"><?php echo $category->name;?></a></li>
<?php
   }
wp_reset_postdata();
?>
                        </ul>
                    </div>
                        <div id="blitizens-grid">
                                <ul>
<?php
$args = array( 'post_type' => 'revolutionaries');
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
        $post_id = get_the_ID();
$taxonomy = 'revolutionary_category';
$terms = get_the_terms($post->ID,$taxonomy);
?>
                                    <li id="blitizen-0" class="blitizen all <?php if ( $terms && !is_wp_error( $terms ) ) : foreach ( $terms as $term ) { echo $term->slug;} endif;?>">
                                        <a href="<?php echo home_url();?>/revolutionaries/#meet-the-blitizens:jvazquez" id="jvazquez">
                                            <span class="card">
                                                <span class="front face">
                                                    <span class="info">
                                                        <span class="name fr"><?php echo get_field('revolutionary_name', $post_id, false); ?></span>
                                                        <span class="title fr"><?php echo get_field('designation', $post_id, false); ?></span>
                                                    </span>
                                                    <span class="overlay"></span>
                                                    <img src="<?php echo the_field('photograph', $post_id, false); ?>" alt="" />
                                                </span>
                                                <!--<span class="back face"></span>-->
                                            </span>
                                        </a>
                                        <div class="bio">
                                            <h3 class="name fr"><?php echo get_field('revolutionary_name', $post_id, false); ?></h3>
                                            <h4 class="title fr"><?php echo get_field('designation', $post_id, false); ?></h4>
                                            <div class="about">
                                                <h5 class="fr">Work</h5>
                                                <p><?php echo get_field('work', $post_id, false); ?></p>
                                                <h5 class="fr">Life</h5>
                                                <p><?php echo get_field('life', $post_id, false); ?></p>
                                            </div>
                                        </div>
                                    </li>
<?php
endwhile;
wp_reset_postdata();
?>
                                </ul>
                                <div id="bio-wrapper">
                                        <a href="#" class="btn-close fr">close<span class="btn-plus-more"></span></a>
                                        <div id="bio"></div>
                                </div>
                        </div>
                </div>
                <div id="page-fundraisers" class="page stalk-us">
                <!--map details start-->
                    <section class="revol-tabs">
                        <input id="stalk-us-tab-1" type="radio" name="radio-stalk" class="tab-selector-1" checked="checked" />
                        <label for="stalk-us-tab-1" class="tab-label-1 radio-tab">Company HQ</label>
                
                        <input id="stalk-us-tab-2" type="radio" name="radio-stalk" class="tab-selector-2" />
                        <label for="stalk-us-tab-2" class="tab-label-2 radio-tab">Tampa,Fl</label>
                
                        <input id="stalk-us-tab-3" type="radio" name="radio-stalk" class="tab-selector-3" />
                        <label for="stalk-us-tab-3" class="tab-label-3 radio-tab">Land O' Lakes, Fl</label>
                    
                        <input id="stalk-us-tab-4" type="radio" name="radio-stalk" class="tab-selector-4" />
                        <label for="stalk-us-tab-4" class="tab-label-4 radio-tab">Seattle, Washington</label>
						<div class="clear-shadow"></div>                        
                        <div class="content-pop-box">
                            <div class="content-1 slide-con">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3520.0157647145393!2d-82.53140499999999!3d28.085061999999997!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c2c07025788b71%3A0x8bdc0fe29eb34fb6!2s4917+Ehrlich+Rd!5e0!3m2!1sen!2sin!4v1393933513832"></iframe>
                            </div>
                            <div class="content-2 slide-con">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d225466.97452566464!2d-82.45419995!3d27.996298699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c2b782b3b9d1e1%3A0xa75f1389af96b463!2sTampa%2C+FL!5e0!3m2!1sen!2sin!4v1393939805095"></iframe>
                                
                            </div>
                            <div class="content-3 slide-con">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56252.407031841125!2d-82.44806390000007!3d28.214134450000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c2bb2de32d3337%3A0x8c723509b9335acd!2sLand+O&#39;+Lakes%2C+FL!5e0!3m2!1sen!2sin!4v1393939882612"></iframe>
                            </div>
                            <div class="content-4 slide-con">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d172133.14576322195!2d-122.33584225000001!3d47.61484805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5490102c93e83355%3A0x102565466944d59a!2sSeattle%2C+WA!5e0!3m2!1sen!2sin!4v1393939934283"></iframe>
                            </div>
						</div>
                    </section>
                    <!--map details end-->
                    
                    <!--map details results start-->
                    <div class="map-result">
                    	<div class="map-result-desk"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since</p></div>
                        <div class="map-result-rank">
                        	<ul>
                            	<li class="rank-1">
                                	<span class="map-tittle">.Starbucks.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-2">
                                	<span class="map-tittle">.Los Angeles International</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-3">
                                	<span class="map-tittle">.Harry's Cafe.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-4">
                                	<span class="map-tittle">.Tender Greens.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-5">
                                	<span class="map-tittle">.Disneyland.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-6">
                                	<span class="map-tittle">.Banzai Bowls.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-7">
                                	<span class="map-tittle">.Boston Logan International</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-8">
                                	<span class="map-tittle">.Top Round Roast Beef.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-9">
                                	<span class="map-tittle">.LA Fitness.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                            </ul>
                            <ul>
                            	<li class="rank-10">
                                	<span class="map-tittle">.Metro Gold Line - Chinatown</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-11">
                                	<span class="map-tittle">.Dream U.S. Tae Kwon Do.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-12">
                                	<span class="map-tittle">.Seattle-Tacoma International </span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-13">
                                	<span class="map-tittle">.Pono Burger.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-14">
                                	<span class="map-tittle">.ShopHouse Southeast Asian</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-15">
                                	<span class="map-tittle">.Nékter Juice Bar.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-16">
                                	<span class="map-tittle">.Swingers.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-17">
                                	<span class="map-tittle">.Porto's Bakery & Cafe.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-18">
                                	<span class="map-tittle">.Poquito Mas.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                            </ul>
                            <ul>
                            	<li class="rank-19">
                                	<span class="map-tittle">.Las Vegas McCarran International </span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-20">
                                	<span class="map-tittle">.Mastro's Steakhouse.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-21">
                                	<span class="map-tittle">.Townhouse.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-22">
                                	<span class="map-tittle">.Legal Sea Foods-Prudential Center.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-23">
                                	<span class="map-tittle">.Central SAPC.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-24">
                                	<span class="map-tittle">.Gate B.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-25">
                                	<span class="map-tittle">.Ellis Park Race Track.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-26">
                                	<span class="map-tittle">.The Otheroom.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                                <li class="rank-27">
                                	<span class="map-tittle">.The Island Hotel & Resort.</span>
                                    <span class="map-bar">&nbsp;</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--map details results end-->
            </div>
        </div>
    </div>
    </section>
    <!--container end-->
<?php get_footer();?>