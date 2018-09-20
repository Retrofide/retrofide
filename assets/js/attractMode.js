$('document').ready(function(){});

$(function() {
var images = ['1.jpg', '2.jpg', '3.jpg'];
 $('#backgroundContainer').css({'background-image': 'url(assets/images/bg/' + images[Math.floor(Math.random() * images.length)] + ')'});
 });
