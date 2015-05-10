$(function(){
	
  // vars for testimonials carousel
  var $txtcarousel = $('#testimonial-list');
  var txtcount = $txtcarousel.children().length;
  var wrapwidth = (txtcount * 415) + 415; // 400px width for each testimonial item
  $txtcarousel.css('width',wrapwidth);
  var animtime = 750; // milliseconds for clients carousel

  // prev & next btns for testimonials
$(document).delegate('#prv-testimonial','click', function(){
  var $last = $('#testimonial-list li:last');
  $last.remove().css({ 'margin-left': '-415px' });
  $('#testimonial-list li:first').before($last);
  $last.animate({ 'margin-left': '0px' }, animtime);
});
 
$(document).delegate('#nxt-testimonial','click', function(){
  var $first = $('#testimonial-list li:first');
  $first.animate({ 'margin-left': '-415px' }, animtime, function() {
    $first.remove().css({ 'margin-left': '0px' });
    $('#testimonial-list li:last').after($first);
  }); 
});

var $clientcarousel = $('#clients-list');
  var clients = $clientcarousel.children().length;
  var clientwidth = (clients * 140); // 140px width for each client item 
  $clientcarousel.css('width',clientwidth);
  
  var rotating = true;
  var clientspeed = 2500;
  var seeclients = setInterval(rotateClients, clientspeed);
  
  $(document).on({
    mouseenter: function(){
      rotating = true; // turn off rotation when hovering
    },
    mouseleave: function(){
      rotating = true;
    }
  }, '#clients');
  
  function rotateClients() {
    if(rotating != false) {
      var $first = $('#testimonial-list li:first');
      $first.animate({ 'margin-left': '-30%' }, 600, function() {
        $first.remove().css({ 'margin-left': '0px' });
        $('#testimonial-list li:last').after($first);
      });
    }
  }
});