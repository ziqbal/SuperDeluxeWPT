<?php

global $post ;

$ancestors = array_reverse( get_post_ancestors( $post->ID) ) ;

//_log(count( $ancestors ) );

( count( $ancestors ) < 2 ) ? $root = $post->ID : $root = $ancestors[ 1 ] ; 

$pages = _pagesGetTree( $root ) ; 

print("<div class='_leftsidebar'>");
_pagesDisplay( $pages ) ; 
print("</div>");

