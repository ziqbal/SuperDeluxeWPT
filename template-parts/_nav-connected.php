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


?>


        <div class="col-lg-12">
<div class="grid">



<?php

if( $pagerelations ) {

    foreach( $pagerelations as $pagerelation ) {

    $postmeta = get_post_meta( $pagerelation->ID ) ;

    $data = array( ) ;

    for( $i = 1 ; $i < 11 ; $i++ ) {

        $thisData = array( ) ;

        $mkey = $postmeta[ "slideshow_image_{$i}" ] ;
        if(isset($mkey[0]) && $mkey[0]!=''){

            $thisData['image']=wp_get_attachment_image_src($mkey[0],'medium');

        } else {

            break;

        }

        $mkey = $postmeta[ "slideshow_text_{$i}" ] ;
        if(isset($mkey[0]) && $mkey[0]!=''){
            $thisData['text']=$mkey[0];
        }     

        $mkey = $postmeta[ "slideshow_link_{$i}" ] ;
        if(isset($mkey[0]) && $mkey[0]!=''){
            $thisData['link']=$mkey[0];
        }       

        $data[]=$thisData ;      

    }      
    
    _log($data);  

    $imageSRC=$data[0]['image'][0];
    $text = $data[0]['text'];

?>




<div class="grid-item">

<a href="<?=get_permalink($pagerelation)?>">
<img class="img-responsive img-hover" src="<?=$imageSRC?>" alt="">
</a>

<h4>
<a href="<?=get_permalink($pagerelation)?>"><?=$pagerelation->post_title?></a>
</h4>

<p><?=$text?></p>

</div>




<?php




    }

}


wp_reset_postdata();

?>

</div>
</div>


