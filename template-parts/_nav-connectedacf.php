<?php 


$related_articles = get_posts(array(
    'post_type' => 'acontent',
    'meta_query' => array(
        array(
            'key' => 'rel', // name of custom field
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE'
        )
    )
));

if( $related_articles ): 
    foreach( $related_articles as $article ): 

    // Do something to display the articles. Each article is a WP_Post object.
    // Example:

    echo $article->post_title;  // The post title
the_field('date', $article->ID); 

    endforeach;
endif;

wp_reset_postdata();

