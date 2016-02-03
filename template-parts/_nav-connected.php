<?php 


$pagerelations = get_posts( array(

    'post_type' => 'primarycontent' ,

    'meta_query' => array(

        array(

            'key' => 'pagerelation' , 
            'value' => '"' . get_the_ID( ) . '"',
            'compare' => 'LIKE'
        )

    )

) ) ;

if( $pagerelations ) {

    foreach( $pagerelations as $pagerelation ) {

        print("<a href='".get_permalink($pagerelation)."'>".$pagerelation->post_title."</a>");


    }

}


wp_reset_postdata();

