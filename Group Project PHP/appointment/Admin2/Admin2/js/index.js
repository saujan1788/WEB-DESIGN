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