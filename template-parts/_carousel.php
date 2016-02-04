<?php

$page = _pagesHomepage( ) ;

if( $page ) {

    $postmeta = get_post_meta( $page->ID ) ;

    $data = array( ) ;

    for( $i = 1 ; $i < 11 ; $i++ ) {

        $thisData = array( ) ;

        $mkey = $postmeta[ "slideshow_image_{$i}" ] ;
        if(isset($mkey[0]) && $mkey[0]!=''){

            $thisData['image']=wp_get_attachment_image_src($mkey[0],'full');

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

}


?>

<header id="myCarousel" class="carousel slide carousel-fade">

<?php if(count($data)>1){ ?>

    <ol class="carousel-indicators">
}
<?php
    foreach($data as $dk=>$dv){
        $cl='';
        if($dk==0) $cl='active';
?>
        <li data-target="#myCarousel" data-slide-to="<?=$dk?>" class="<?=$cl?>"></li>

<?php
    }
?>
    </ol>

<?php } ?>    



    <div class="carousel-inner">


<?php
    foreach($data as $dk=>$dv){
        $cl='';
        $caption=$dv['text'];
        if($dv['link']!=''){
            $caption="<a href='".$dv['link']."'>$caption</a>";
        }
        if($dk==0) $cl='active';
?>
        <div class="item <?=$cl?>">
            <div class="fill" style="background-image:url('<?=$dv['image'][0]?>');"></div>
            <div class="carousel-caption">
                <h2><?=$caption?></h2>
            </div>
        </div>

<?php
    }
?>


    </div>

<?php if(count($data)>1){ ?>


    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>

    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>

<?php
    }
?>
</header>

