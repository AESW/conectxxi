var resizeTimer;

jQuery( document ).ready(function() {
	console.log( "Ancho window: " + jQuery(window).width() + " Ancho document : " + jQuery(document).width() + " Alto window : " + jQuery(window).height() + " Alto document : " + jQuery(document).height() );

});

jQuery( window ).resize(function() {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function() {
	 console.log( "Ancho window: " + jQuery(window).width() + " Ancho document : " + jQuery(document).width() + " Alto window : " + jQuery(window).height() + " Alto document : " + jQuery(document).height() );
	 
  });
  

});