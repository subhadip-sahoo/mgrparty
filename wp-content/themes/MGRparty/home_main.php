<?php  global $post;
    $gallery_data = get_post_meta( $post->ID, 'gallery_data', true );
	
		 if ( isset( $gallery_data['image_url'] ) ) 
    {
	$main=($gallery_data['image_url']);
	
	
	
	?>
<style>
.bypt-tout-1 a .show1 {
	position:absolute;
	top:-10px;
	left:-10px;
	display:block;
	width:315px;
	height:372px;
	background:url(<?php echo $main[0]; ?>) no-repeat !important;
	-webkit-backface-visibility: hidden;
	transform: scale(.87,.87) rotate(5deg);
	-ms-transform: scale(.87,.87) rotate(5deg); /* IE 9 */
	-webkit-transform: scale(.87,.87) rotate(5deg); /* Safari and Chrome */
	-webkit-transition: all 0.2s linear;
	-moz-transition: all 0.2s linear;
	-ms-transition: all 0.2s linear;
	-o-transition: all 0.2s linear;
	transition: all 0.2s linear;
	z-index:2;
}
.bypt-tout-1 a .show3{
	position:absolute;
	top:60px;
	left:131px;
	display:block;
	width:342px;
	height:249px;
	background:url(<?php echo $main[1]; ?>) no-repeat 0 0 !important;
	margin:0 0 0 0;
	-webkit-backface-visibility: hidden;
	transform: scale(.87,.87);
	-ms-transform: scale(.87,.87); /* IE 9 */
	-webkit-transform: scale(.87,.87); /* Safari and Chrome */
	-webkit-transition: all 0.2s linear;
	-moz-transition: all 0.2s linear;
	-ms-transition: all 0.2s linear;
	-o-transition: all 0.2s linear;
	transition: all 0.2s linear;
	z-index: 4;
}
.fran-opp a .frshow2{
	position:absolute;
	top:2px;
	right:10px;
	display:block;
	width:339px;
	height:272px;
	background:url(<?php echo $main[2]; ?>) no-repeat !important;
	-webkit-backface-visibility: hidden;
	transform: scale(.87,.87) rotate(-2deg);
	-ms-transform: scale(.87,.87) rotate(-2deg); /* IE 9 */
	-webkit-transform: scale(.87,.87) rotate(-2deg); /* Safari and Chrome */
	-webkit-transition: all 0.2s linear;
	-moz-transition: all 0.2s linear;
	-ms-transition: all 0.2s linear;
	-o-transition: all 0.2s linear;
	transition: all 0.2s linear;
	z-index:2;
}
.fran-opp a .frshow1{
	position:absolute;
	top:8px;
	left: -16px;
	display:block;
	width:300px;
	height:300px;
	background:url(<?php echo $main[3]; ?>) no-repeat !important;
	-webkit-backface-visibility: hidden;
	transform: scale(.87,.87) rotate(5deg);
	-ms-transform: scale(.87,.87) rotate(5deg); /* IE 9 */
	-webkit-transform: scale(.87,.87) rotate(5deg); /* Safari and Chrome */
	-webkit-transition: all 0.2s linear;
	-moz-transition: all 0.2s linear;
	-ms-transition: all 0.2s linear;
	-o-transition: all 0.2s linear;
	transition: all 0.2s linear;
	z-index:2;
}
.fran-opp a .frshow3{
	position:absolute;
	top: -5px;
	left:105px;
	display:block;
	width:311px;
	height:300px;
	background:url(<?php echo $main[4]; ?>) no-repeat 0 0 !important;
	margin:0 0 0 0;
	-webkit-backface-visibility: hidden;
	transform: scale(.87,.87);
	-ms-transform: scale(.87,.87); /* IE 9 */
	-webkit-transform: scale(.87,.87); /* Safari and Chrome */
	-webkit-transition: all 0.2s linear;
	-moz-transition: all 0.2s linear;
	-ms-transition: all 0.2s linear;
	-o-transition: all 0.2s linear;
	transition: all 0.2s linear;
	z-index:3;
}
.fran-opp a .frshow2{
	position:absolute;
	top:10px;
	right:12px;
	display:block;
	width:302px;
	height:314px;
	background:url(<?php echo $main[5]; ?>) no-repeat !important;
	-webkit-backface-visibility: hidden;
	transform: scale(.87,.87) rotate(-5deg);
	-ms-transform: scale(.87,.87) rotate(-5deg); /* IE 9 */
	-webkit-transform: scale(.87,.87) rotate(-5deg); /* Safari and Chrome */
	-webkit-transition: all 0.2s linear;
	-moz-transition: all 0.2s linear;
	-ms-transition: all 0.2s linear;
	-o-transition: all 0.2s linear;
	transition: all 0.2s linear;
	z-index:2;
}
</style>
<?php } ?>
<div class="top-container">
            	<div class="bypt-tout-1">
                  <a href="#" target="_blank">
                    <div class="bg"></div>
                    <div class="show1"></div>            
                    <div class="show3"></div>
                    <div class="show2"></div>
                    <div class="btn">Book Your Party Today</div>
                  </a>
                </div>
                <div class="mario-pic">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="fran-opp">
                  <a href="http://mgrfranchise.com/" target="_blank">
                    <div class="bg"></div>
                    <div class="frshow1"></div>            
                    <div class="frshow3"></div>
                    <div class="frshow2"></div>
                    <div class="btn">Book Your Party Today</div>
                  </a>
                </div>
            </div>