<?php

$_args = array(

    'sort_column' => 'menu_order',
    'order'=>'ASC',
    'hierarchical' => 0 ,
    'child_of' => 0,
    'parent' => 0,
    'post_type' => 'page',
    'post_status' => 'publish'

) ; 

$_pages = get_pages( $_args ) ; 

?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

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

    <?php foreach( $_pages as $_pk=>$_pv ) { ?>

    <li>
        <a href="<?= get_permalink( $_pv) ?>"><?= $_pv->post_title ?></a>
    </li>    

    <?php } ?>

    </ul>

    </div>

</div>

</nav>
