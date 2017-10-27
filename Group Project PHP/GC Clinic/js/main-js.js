/*=====================Toggle Page Wrap Using Pure JavaScript==========================*/
//Exelent little functions to use any time when class modification is needed
function hasClass(ele, cls) {
    return !!ele.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
}

function addClass(ele, cls) {
    if (!hasClass(ele, cls)) ele.className += " " + cls;
}

function removeClass(ele, cls) {
    if (hasClass(ele, cls)) {
        var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
        ele.className = ele.className.replace(reg, ' ');
    }
}

//Add event from js the keep the marup clean
function init() {
    document.getElementById("menu-toggle").addEventListener("click", toggleMenu);
}

//The actual fuction
function toggleMenu() {
    var ele = document.getElementsByTagName('body')[0];
    if (!hasClass(ele, "open")) {
        addClass(ele, "open");
    } else {
        removeClass(ele, "open");
    }
}

//Prevent the function to run before the document is loaded
document.addEventListener('readystatechange', function() {
    if (document.readyState === "complete") {
        init();
    }
});

/*============================================================================================*/

 /* $('.menu-toggle').on('click', function() {
  if( !($('.menu-toggle').addClass('button-toggle')) ){  
    $('.menu-toggle').addClass('button-toggle');
  }

  });

*/
/*=====================Toggle Hamburger Icon==========================*/

(function () {
    $('.hamburger-menu').on('click', function() {
        $('.bar').toggleClass('animate');
    })
})();

/*============================================================================================*/





/*=====================Resize function to toggle buttons on nav fire==========================*/

    /*function windowSize() {
      windowHeight = window.innerHeight ? window.innerHeight : $(window).height();
      windowWidth = window.innerWidth ? window.innerWidth : $(window).width();

    }

    windowSize();

    $(window).resize(function() {
      windowSize();
      console.log('width is :', windowWidth, 'Height is :', windowHeight);
      if (windowWidth < 768) {

      }

    });
*/



/*=================================Admin===========================================================*/


// Menu

$(".overlay").on('click', function() {
  $(".overlay").toggleClass("active");
});

// Tabs & Windows

$(".tab.one").on('click', function() {
  $(".slider").removeClass("right");
  $(".reg").removeClass("active");
  $(".users").removeClass("disabled")
});

$(".tab.two").on('click', function() {
  $(".slider").addClass("right");
  $(".reg").addClass("active");
  $(".users").addClass("disabled")
  $(".users").removeClass("current")
});



/*=====================Modal Window==========================*/




var elements = $('.modal-overlay, .modal');

$('.btn-sign').click(function(){
    elements.addClass('active');
});

$('.close-modal').click(function(){
    elements.removeClass('active');
});




var elements2 = $('.login-overlay, .modal-login');

$('.btn-login').click(function(){
    elements2.addClass('active');
});

$('.close-modal').click(function(){
    elements2.removeClass('active');
});









/*=====================Sticky Footer==========================*/


    function autoHeight() {
        var h = $(document).height() - $('body').height();
        if (h > 0) {
            $('.footer').css({
                marginTop: h
            });
        }
    }
    $(window).on('load', autoHeight);



