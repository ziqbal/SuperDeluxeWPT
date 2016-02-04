<?php


add_action( 'init', '_postCreateTypes' );

function _postCreateTypes( ) {

  register_post_type(

	'primarycontent',
	
    array(

		'labels' => array(
        	'name' => __( 'primaryContent' ) ,
        	'singular_name' => __( 'primaryContent' )
      	) ,
      	'public' => true ,
      	'has_archive' => true ,
    )

  ) ;

  register_post_type(

	'secondarycontent',
	
    array(

		'labels' => array(
        	'name' => __( 'secondaryContent' ) ,
        	'singular_name' => __( 'secondaryContent' )
      	) ,
      	'public' => true ,
      	'has_archive' => true ,
    )

  ) ;  

  register_post_type(

	'tertiarycontent',
	
    array(

		'labels' => array(
        	'name' => __( 'tertiaryContent' ) ,
        	'singular_name' => __( 'tertiaryContent' )
      	) ,
      	'public' => true ,
      	'has_archive' => true ,
    )

  ) ;    

}

//flush_rewrite_rules();


function _pagesHomepage( ) {

	$page = NULL ;

	$pages = _pagesGetByParent( 0 ) ;

	$foundPage = false ;

	foreach($pages as $pk=>$pv){
	    
	    if($pv->post_title=="HOMEPAGE"){

	        $page=$pv;
	        $foundPage=true;

	    }

	}

	return( $page ) ;

}

function _pagesDisplay( $pages ) {

	foreach( $pages as $pk => $page ) {

		$href = get_permalink( $page ) ;
		$title = $page->post_title ;
		$hasChildren = ( property_exists( $page, 'children') && count( $page->children ) > 0 ) ;

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
	    'order' => 'ASC' ,
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


add_action('acf/input/admin_head', 'my_acf_input_admin_head');
function my_acf_input_admin_head() {
?>
<script type="text/javascript">
jQuery(function(){
  jQuery('.acf_postbox').addClass('closed');
});
</script>
<?php
}

if( function_exists( "register_field_group" ) ) {

	$fields = array( ) ;

	for( $i = 1 ; $i < 6 ; $i++ ) {

		$fields[ ] = array(

				"key" => "ss_field_image_{$i}" ,
				"label" => "Image {$i}" ,
				"name" => "slideshow_image_{$i}" ,
				"type" => "image" ,
				"save_format" => "object" ,
				"preview_size" => "thumbnail" ,
				"library" => "all" ,

		) ;

		$fields[ ] = array(

				"key" => "ss_field_text_{$i}" ,
				"label" => "Text {$i}",
				'name' => "slideshow_text_{$i}",
				"type" => "text",
				"default_value" => '',
				"placeholder" => '',
				"prepend" => '',
				"append" => '',
				"formatting" => 'html',
				"maxlength" => '',			

		) ;		

		$fields[ ] = array(

				"key" => "ss_field_link_{$i}" ,
				"label" => "Link {$i}",
				'name' => "slideshow_link_{$i}",
				"type" => "text",
				"default_value" => '',
				"placeholder" => '',
				"prepend" => '',
				"append" => '',
				"formatting" => 'html',
				"maxlength" => '',			

		) ;		

	}


	register_field_group(array (
		'id' => 'acf-imagegroup',
		'title' => 'Content Group 1',
		'fields' => $fields ,
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),

			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'primarycontent',
					'order_no' => 0,
					'group_no' => 1,
				),
			),

		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));


	register_field_group(array (
		'id' => 'acf_page',
		'title' => 'Page',
		'fields' => array (
			array (
				'key' => 'field_56b1c39e4dd0a',
				'label' => 'Page',
				'name' => 'pagerelation',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 1,
			),

		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'primarycontent',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'secondarycontent',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'tertiarycontent',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 3,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



