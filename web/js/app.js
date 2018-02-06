$(document).ready(function(){
  $('.carousel').carousel();
  $('.carousel.carousel-slider').carousel({fullWidth:true});
  $('.parallax').parallax();
  $('.scrollspy').scrollSpy();
  $('.dropdown').dropdown({
    constrainWidth: false,
    hover: true
  });
  $('.modal').modal();
});
