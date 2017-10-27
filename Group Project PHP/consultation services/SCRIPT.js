
var m = document.getElementById('myModal');

var span = document.getElementsByClassName("close")[0];


document.getElementById("myBtn").onclick = function() {m.style.display = "block";}


span.onclick = function() {m.style.display = "none";}


window.onclick = function(event) {if (event.target == m) {m.style.display = "none";}}






var elements = $('.modal-overlay, .modal');

$('#btn-sign').click(function(){
    elements.addClass('active');
});

$('.close-modal').click(function(){
    elements.removeClass('active');
});
/*˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜*/
var element = $('.modal-overlay2, .modal2');

$('#btn-sign1').click(function(){
    element.addClass('active');
});

$('.close-modal2').click(function(){
    element.removeClass('active');
});
/*˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜*/
var element1 = $('.modal-overlay3, .modal3');

$('#btn-sign2').click(function(){
    element1.addClass('active');
});

$('.close-modal3').click(function(){
    element1.removeClass('active');
});
/*˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜˜*/
var element2 = $('.modal-overlay4, .modal4');

$('#btn-sign3').click(function(){
    element2.addClass('active');
});

$('.close-modal4').click(function(){
    element2.removeClass('active');
});


