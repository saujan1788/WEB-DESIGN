
/*------------Slick carousel---------------------------*/
$('.multiple-items').slick({
	swipe: true,
    focusOnSelect:true,
	arrows: true,
	infinite: true,
	clickToShow: 1,
	autoplay: true,
	autoplaySpeed:1500,
	adaptiveHeight: true,
	dots: true,

	fade: true,
	mobileFirst:true,
	cssEase: 'linear'


});
/*----------------Responsive menu-----------------------------*/
document.querySelector( "#nav-toggle" ).addEventListener( "click", function() {
  this.classList.toggle( "active" );
   $(".main-navigation").toggleClass('open');
    $('.multiple-items').fadeToggle();   
});

$(".dropdown-touch").hide();
$('.drop').on("click",function(){
	$('.dropdown-touch').fadeToggle();
});


/*		Press Escape Key To Exit Responsive menu*/
$(document).keydown(function(e) {
    if (e.keyCode == 27) {
        $(".main-navigation").fadeToggle();
    }
});


/*		Code to hide scrollable container when in hamburger menu*/

$("#nav-toggle").on('click', function(){
	
        if($('body').css('overflow')!="hidden"){
            $('body').css('overflow', 'hidden'); 
        }
        else{
            $('body').css('overflow', 'scroll'); 
        }
});




/*			Code to keep footer at the bottom of the viewport when there is not enough content*/

  $(document).ready(function() {
   
   var docHeight = $(window).height();
   var footerHeight = $('.footer').height();
   var footerTop = $('.footer').position().top + footerHeight;
   
   if (footerTop < docHeight) {
    $('.footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
   }
  });

/******************************************************************************************************************************/
/*````````````````````````````````````````````````````````````````````````````````````````````````````````````````````````````*/




/******************************************************************************************************************************/







/*-----------------------------------WireFrame adjustment according to viewport-----------------------------------------*/

 function adjustIframes()
{
  $('iframe').each(function(){
    var
    $this       = $(this),
    proportion  = $this.data( 'proportion' ),
    w           = $this.attr('width'),
    actual_w    = $this.width();
    
    if ( ! proportion )
    {
        proportion = $this.attr('height') / w;
        $this.data( 'proportion', proportion );
    }
  
    if ( actual_w != w )
    {
        $this.css( 'height', Math.round( actual_w * proportion ) + 'px' );
    }
  });
}
$(window).on('resize load',adjustIframes);