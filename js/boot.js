

$( function( ) {

	$( '.carousel' ).carousel( {

	    interval : 5000
	     
	} ) ;	


	$( '._navcollapsable' ).hide( ) ;

	$( '._leftsidebar' ).find( 'a' ).each( function( ) {

		if( window.location.href == $( this ).attr( 'href' ) ) {

			$( this ).parent().show( ).parent( ).show( ) ;
			$( this ).next( 'div' ).show( ) ;

		}

	} ) ;	




} ) ;


$(window).load(function(){

	$('.grid').masonry({
	itemSelector: '.grid-item',
	columnWidth: 200,
	});	

});


