

$( function( ) {

	$( '.carousel' ).carousel( {

	    interval : 5000
	     
	} ) ;	


	$( '._navcollapsable' ).hide( ) ;

	$( document ).find( 'a' ).each( function( ) {

		if( window.location.href == $( this ).attr( 'href' ) ) {

			$( this ).parent().show( ).parent( ).show( ) ;
			$( this ).next( 'div' ).show( ) ;

		}

	} ) ;	



} ) ;


