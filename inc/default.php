<?php

// theme title 
add_theme_support( 'title-tag' );

// thumbnil image area 
add_theme_support('post-thumbnails', array('page', 'post'));

add_image_size( 'post-thumbnails', 970, 350, true );

// except to 40 word

function agp_excerpt_more($more){
    return '<br> <br><a class="read-more" href="'.get_permalink( get_the_ID(  ) ).'">'.'Read More'.'</a>';
}

add_filter('excerpt_more', 'agp_excerpt_more');

function agp_excerpt_lenght($lenghth){
    return 40;
} 

add_filter( 'excerpt_length', 'agp_excerpt_lenght', 999);