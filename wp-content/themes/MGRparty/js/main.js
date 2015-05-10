$(document).ready(function(){
	$('a.showtestimonials').click(function () {
            var post_id = $(this).attr('id');
            var themeURL = $(this).attr('name');
            var position = $(this).offset();
            var url = themeURL + '/getPostData.php?post_id=' + post_id;
            //alert(url);
            $.getJSON(url, function(json){
                //alert(json.post_id);
                $('#detailshowtestimonials_1').html(json.html);
                $( ".testimonials_details" ).fadeOut( "slow", function() {
                        $('.testimonials_details').css('top', position.top - 150);
                        $('.testimonials_details').css('left', position.left);					    
                });
                $('.testimonials_details').fadeIn(500);
                $("#overlay").css('display', 'block');
            });
        
   });
	$(document).delegate('.modalclose', 'click', function(){
		$(".testimonials_details").fadeOut(500);
		$("#overlay").css('display', 'none');
	});
	$("#overlay").click(function(){
		$(".testimonials_details").fadeOut(500);
		$("#overlay").css('display', 'none');
	});
	$(document).keypress(function(e) {
       if (e.keyCode == 27) {
           	$(".testimonials_details").fadeOut(500);
                $("#overlay").css('display', 'none');
       }
    });

	

	// Initialize each section
	initHomeHero();
	initSocial();
	initFeaturedCars();
	initServices();
	initShowroom();
	
	// Form Select Input
	if($.fn.select2)
	{
		$("#filter-select, #make-select, #model-select, #year-select").select2();
	}
	
	// Showroom Gallery
	if($.fn.fancybox)
	{
		$('.sh-gallery').fancybox({
			width:1000,
			height:820,
			autoSize:false,
			type:'iframe',
			padding:5,
			margin:5,
			tpl: {
				wrap : '<div class="fancybox-wrap" tabIndex="-1"><div class="lb-logo"></div><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>'
			}
		});
		$('.lightbox-tvshow').fancybox({
			autoSize:true,
			type:'image',
			scrolling: 'no',
			padding:5,
			margin:5
		});
	}

  // Underground email signup
  /*
  $("#undergroundSignupForm").ajaxForm(function(reply){
    reply = JSON.parse(reply);
    switch (parseInt(reply.status)) {
      case 0:
        undergroundSignupThanks();
        break;
      case -1:
        undergroundSignupInvalid();
        break;
      case -2:
      default:
        undergroundSignupError();
        break;
    }
  });
*/
  if ($(".twitter-feed li:not(.active)").length>0) {
    setInterval($(".csstransitions").length ? rotateTweets : rotateTweetsJS,6000);
//    if ($(".csstransitions.csstransforms3d").length==0) {*/
/*      $(".no-csstransitions.twitter-feed li.active").each(function(){
        $(this).css({height:$(this).children(".tweet").height()});
      });*/
/*      $(".twitter-feed li").each(function(){
        $(this).css({"max-height":$(this).children(".tweet").height()});
      });*/
//    }
  }
	
});

$(window).load(function() {
	initHomeSponsors();
	initHomeTestimonials();
	initGallery();
} );

function initHomeHero()
{
	var si = $('#hero-gallery').royalSlider({
    addActiveClass: true,    
    autoScaleSlider: false, 
    autoScaleSliderWidth: 1140,     
    autoScaleSliderHeight: 500,
		transitionSpeed: 1000,
		 //imageScalePadding: 50,
    loop: true,
    slidesSpacing: -75,
		
		autoPlay: {
			// autoplay options go gere
			enabled: true,
			delay: 5000
		},
    
		navigateByClick: false,
		controlNavigation: 'none',
		arrowsNav: true,
		arrowsNavAutoHide: false,
		controlsInside: true,
		sliderDrag: false,
		
		imageAlignCenter: false,
		fadeinLoadedSlide: true,
    globalCaption: false,
    keyboardNavEnabled: true,
		
		video: {
			// video options go gere
			autoHideBlocks: false,
			autoHideArrows: false
		},

    visibleNearby: {
      enabled: true,
      centerArea: 1,
      center: true,
      breakpoint: 0,
      breakpointCenterArea: 0,
      navigateByCenterClick: true
    }
  }).data('royalSlider');

  // link to fifth slide from slider description.
  /*$('.slide4link').click(function(e) {
    si.goTo(4);
    return false;
  });*/
}

function initHomeSponsors()
{
	$('#home-sponsors').carouFredSel({
			auto: false,
			width: '100%',
			scroll: 1,
			prev: '#prev',
			next: '#next',
			swipe: {
				onMouse: false,
				onTouch: true
			},
			items: {
				width: "variable",
				visible: {
					min: 1,
					max: 5
				}
			}
	});
}

function initHomeTestimonials()
{
	$('#home-testimonials').carouFredSel({
			auto: true,
			width: '100%',
			scroll: 1,
			prev: '#prev-t',
			next: '#next-t',
			swipe: {
				onMouse: false,
				onTouch: true
			},
			items: {
				width: "variable",
				visible: {
					min: 1,
					max: 4
				}
			}
	});
}

function initSocial()
{	
	$('#home-social').carouFredSel({
			responsive: true,
			auto: true,
			width: '100%',
			scroll: 1,		
			swipe: {
				onMouse: false,
				onTouch: true
			},
			items: {
				width: 450,
				//	height: '30%',	//	optionally resize item-height
				visible: {
					min: 1,
					max: 6
				}
			}
	});
}

function initFeaturedCars()
{
	$('#featured-thumbs').carouFredSel({
		auto: false,
		direction: 'up',
		width: '269px',
		height: '535px',
		scroll: 1,
		prev: '#prev',
		next: '#next',
		mousewheel: false,
		swipe: {
			onMouse: false,
			onTouch: true
		}
	});
}

function initServices()
{
	$('.service').css({padding: 0});
	var $container, switchTab, $dragger;
	$dragger = $(".show-me");
	$container = $('.services-select');

	switchTab = function() {
		var $this, center_offset, tab_center, $old, $target, target_height;
		$this = $(this);
		tab_center = $this.position().left + $this.width() / 2;
		center_offset = tab_center - $dragger.width() / 2;
		$old = $(".service.active");
		$target = $($this.find("a").attr("href"));
		target_height = $target.height() + 210;

		$dragger.animate({
			left: center_offset
		});

		if($old.length) $('.services-select').css('height', 210 + $old.height());
		$old.add($target).css('position', 'absolute');

		if(0 === $old.length) $old = $('.service:first');

		$container.stop().animate({height: target_height}, { step: function() { $(this).css('overflow', 'visible'); } });
		$old.fadeOut(function() {
			$(this).removeClass("active");
			$target.fadeIn(function() {
				$('.service.active').removeClass('.active').stop().fadeOut();
				$(this).addClass("active");
			});
		});
		$(this).addClass('active').siblings().removeClass('active');

		return false;
	};
	
	$(".show-me").draggable({
		containment: "parent",
		axis: "x"
	});
	
	$(".ui-droppable").droppable({
		drop: switchTab
	}).click(switchTab);
	
	$(".ui-droppable:first-child a").trigger('click');
}

function initGallery()
{
	$('#showroom-gallery').royalSlider({
    fullscreen: {
      enabled: false
    },
    controlNavigation: 'thumbnails',
    autoScaleSlider: true, 
    autoScaleSliderWidth: 1000,     
    autoScaleSliderHeight: 720,
    loop: false,
    imageScaleMode: 'fit-if-smaller',
    imageAlignCenter: true,
    navigateByClick: true,
    numImagesToPreload:2,
    arrowsNav:false,
    sliderDrag: false,
    arrowsNavAutoHide: true,
    arrowsNavHideOnTouch: true,
    keyboardNavEnabled: true,
    fadeinLoadedSlide: true,
    globalCaption: true,
    globalCaptionInside: false,
    thumbs: {
      spacing: 18,
      appendSpan: true,
      firstMargin: true,
      paddingBottom: 4
    }
  });

	setTimeout(function() {
		$('#showroom-gallery').royalSlider('updateSliderSize', true);
	}, 100);
}

function initShowroom() {
	var $cars = $('#featured-builds .car').click( function() {
		$(this).addClass('active').parent().siblings().find('.active').removeClass('active');

		var $target = $($(this).attr('href')).fadeIn();
		
		$target.siblings('.f-car').fadeOut()
		$target.find('.car-img').css ({left: -115, opacity: 0});
		$target.find('.car-details').css ({top: 689, opacity: 0});
		$target.find('.car-img').delay(400).animate( {left: -15, opacity: 1}, { duration: 800, easing: 'easeOutExpo'});
		$target.find('.car-details').delay(400).animate( {top: 629, opacity: 1}, { duration: 800, easing: 'easeOutExpo'});
		$target.find('.car-lights').hide().delay(900).fadeIn();
		$target.find('.view-gallery').hide().delay(600).fadeIn();
	} );


	if($(location.hash).length)
		$cars.filter('[href="'+location.hash+'"]').click();
	else
		$cars.first().click();
}
/*
function undergroundClickToSubmit(e) {
  if (e.preventDefault) e.preventDefault();
  $(".sign-up form").submit();
  return false;
}
function undergroundSignupThanks() {
  $(".sign-up .sign-up-form-wrapper").addClass('thanks');
  $(".sign-up form .help-block").removeClass('visible');
}
function undergroundSignupInvalid() {
  $(".sign-up form .help-block.invalid").addClass('visible');
}
function undergroundSignupError() {
  $(".sign-up form .help-block.error").addClass('visible');
}
function rotateTweets() {
  var twitterFeed = $(".twitter-feed ul"),
      lastInactive = twitterFeed.find("li:not(.active):last"),
      lastActive = twitterFeed.find("li.active:last"),
      firstActive = twitterFeed.find("li.active:first");
  lastInactive.insertBefore(firstActive);
  setTimeout(function(){lastInactive.addClass('active');lastActive.removeClass('active');},1);
}
function rotateTweetsJS() {
  var twitterFeed = $(".twitter-feed ul"),
      lastInactive = twitterFeed.find("li:not(.active):last"),
      lastActive = twitterFeed.find("li.active:last"),
      firstActive = twitterFeed.find("li.active:first");
  lastInactive.insertBefore(firstActive);
//  lastInactive.slideDown(1000,function(){lastInactive.addClass('active');});
  lastInactive.css({"display":"block",opacity:0,"margin-top":-120}).animate({opacity:1,"margin-top":0},1000,function(){lastInactive.addClass('active');});
//  lastActive.slideUp(1000,function(){lastActive.removeClass('active');});
  lastActive.animate({opacity:0,"margin-top":-120},1000,function(){lastActive.removeClass('active').css("display","none");});
}
*/