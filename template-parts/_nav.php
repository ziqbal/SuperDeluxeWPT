<?php

$pages = _pagesGetByParent( 0 ) ;

foreach( $pages as $pk => $page ) {
    $pages[ $pk ]->children = _pagesGetByParent( $page->ID ) ;
}


?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

<div class="container">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= site_url( )?>"><?php echo get_bloginfo( 'name' ); ?></a>
    </div>



    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


    <ul class="nav navbar-nav navbar-right">

    <?php

        foreach( $pages as $pk => $pv ) {

            $hasChildren = ( property_exists( $pv, 'children') && ( count( $pv->children ) > 0 ) ) ;

            $cl = "" ;
            $dt = "" ;
            $sym = "" ;

            if( $hasChildren ) {

                $cl = "dropdown-toggle" ;
                $dt = "dropdown" ;
                $sym = "caret" ;

            }

    ?>

    <li>

        <a class='<?=$cl?>' data-toggle='<?=$dt?>' href="<?= get_permalink( $pv) ?>">
        <?= $pv->post_title ?>
        <span class='<?=$sym?>'></span>
        </a>
        <?php
            if($hasChildren){
                print("<ul class='dropdown-menu'>");
                foreach($pv->children as $chk => $chv){
                   print("<li><a href='".get_permalink($chv)."'>".$chv->post_title."</a></li>"); 

                }
                print("</ul>");
            }
        ?>

    </li>    

    <?php } ?>

    </ul>

    </div>

</div>

</nav>
