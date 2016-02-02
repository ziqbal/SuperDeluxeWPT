<?php

$connected = new WP_Query( array(

  'connected_type' => 'acontent_to_pages' ,
  'connected_items' => $post->ID ,
  'nopaging' => true ,

) ) ;


if ( $connected->have_posts( ) ) :

?>

aContent
<ul>
<?php while ( $connected->have_posts( ) ) : $connected->the_post( ) ; ?>

    <li><a href="<?php the_permalink( ) ; ?>"><?php the_title( ) ; ?></a></li>

<?php endwhile ; ?>

</ul>

<?php 

wp_reset_postdata();
endif ;

?>

