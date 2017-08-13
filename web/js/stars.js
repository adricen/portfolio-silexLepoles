$( document ).ready(function() {
   /* ----- les fonctions randoms ----- */
function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}

/* ----- fonction de creation des etoiles ----- */
function create_Star(){
  var blur = "filter: blur("+getRandomArbitrary(0,2)+"px);";
  var size = getRandomArbitrary(0, 15)+'px';
  var $etoile = $('<div></div>');
  var topPosition = getRandomArbitrary(0, 100);

  /* processing */
  $etoile = $etoile.addClass("star").append( $("<div></div><div></div>") );
  
  $etoile.attr( "style", "left:  "+getRandomArbitrary(0, 100)+"%;top:"+getRandomArbitrary(0, 100)+"%;width:"+size+";height:"+size+";"+blur + 'animation-duration: '+ getRandomArbitrary(2, 10) +'s; ');

  // envois de l'etoile dans le DOM

  var genStar = $('#etoiles');

  // $(genStar).append( $etoile );
  $( $etoile ).appendTo( $(genStar) ).delay(6000)
        .queue(function() {
            $(this).remove();
        });
}
setInterval( function(){
  create_Star()
}, 100);


});
