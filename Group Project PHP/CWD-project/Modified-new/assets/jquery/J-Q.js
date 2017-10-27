
$('.multiple-items').slick({
	swipe: true,
    focusOnSelect:true,
	arrows: true,
	infinite: true,
	clickToShow: 1,
	/*
	autoplay: true,
	autoplaySpeed:1500,*/
	adaptiveHeight: true,
	dots: true,

	fade: true,
	mobileFirst:true,
	cssEase: 'linear'


});
$(".main-flex").hide();
$(document).ready(function(){
    $(".button").click(function(){
    
        $(".main-flex").show();
    });
});


/*		Responsive menu jquery*/


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

 





document.querySelector( "#nav-toggle" ).addEventListener( "click", function() {
  this.classList.toggle( "active" );
   $(".main-navigation").toggleClass('open');
    $('.multiple-items').fadeToggle();
});