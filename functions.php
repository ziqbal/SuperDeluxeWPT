<?php


function _pagesDisplay( $pages ) {

	foreach( $pages as $pk => $page ) {

		$href = get_permalink( $page ) ;
		$title = $page->post_title ;
		$hasChildren = ( isset( $page->children ) && count( $page->children ) > 0 ) ;

	    print( "<a href='{$href}' class='list-group-item'>{$title}</a>\n" ) ;

	    if( $hasChildren ) {

	    	print( "<div class='_navcollapsable'>\n" ) ;

			_pagesDisplay( $page->children ) ; 

	    	print( "</div>\n" ) ;

		}

	} 

}

function _pagesGetTree( $x ) {

	$pages = _pagesGetByParent( $x ) ;

	foreach( $pages as $pk => $pv ) {

	    $children = _pagesGetByParent( $pv->ID ) ;

	    foreach( $children as $chk => $chv ) {

	        $children[ $chk ]->children = _pagesGetByParent( $chv->ID ) ;

	    }

	    $pages[ $pk ]->children = $children ;

	}

	return( $pages ) ;

}

function _pagesGetByParent( $x ) {

	$args = array(

	    'sort_column' => 'menu_order' ,
	    'order'=>'ASC' ,
	    'hierarchical' => 0 ,
	    'child_of' => 0 ,
	    'parent' => $x ,
	    'post_type' => 'page' ,
	    'post_status' => 'publish' ,

	) ; 

	$pages = get_pages( $args ) ; 

	return( $pages ) ;

}

function _log( $msg ) {

	error_log( "\n".var_export( $msg , true ) ) ;

} 
