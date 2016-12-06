$(document).ready(function(){

  $('.panel-footer').each(function() {

    
      $(this).attr("style", "background-position: " + getRandomBackgroundOffset() +";");
  });

  $('.well').each(function() {
      $(this).attr("style", "background-position: " + getRandomBackgroundOffset() +";");
  });
});

function getRandomArbitrary(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getRandomBackgroundOffset()
{
  return getRandomArbitrary(0, 500) +"px " + getRandomArbitrary(0,500)+ "px;";
}
