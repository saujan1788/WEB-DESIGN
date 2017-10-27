// Menu

$(".more, .overlay").on('click', function() {
  $(".menu, .overlay").toggleClass("active");
});

// Tabs & Windows

$(".tab.one").on('click', function() {
  $(".slider").removeClass("right");
  $(".tags").removeClass("active");
  $(".main").removeClass("disabled")
});

$(".tab.two").on('click', function() {
  $(".slider").addClass("right");
  $(".tags").addClass("active");
  $(".main").addClass("disabled")
  $(".main").removeClass("current")
});

