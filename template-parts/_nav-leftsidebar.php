<?php

global $post ;

$ancestors = array_reverse( get_post_ancestors( $post->ID) ) ;

( count( $ancestors ) == 0 ) ? $root = $post->ID : $root = $ancestors[ 0 ] ; 

$pages = _pagesGetTree( $root ) ; 

_pagesDisplay( $pages ) ; 

