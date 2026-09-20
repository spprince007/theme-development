<?php

function app_genius_css_file_calling (){
    wp_enqueue_style( 'app-genius-style', get_stylesheet_uri(  ) );
    wp_register_style( 'agp-bootstrap', get_template_directory_uri(  ).'/css/bootstrap.css', array(), '5.3.8', 'all' );
    wp_enqueue_style( 'agp-bootstrap');
    wp_register_style( 'agp-custom-css', get_template_directory_uri(  ).'/css/custom.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'agp-custom-css');
   
    // js file calling 
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'agp-bootstrap', get_template_directory_uri(  ).'/js/bootstrap.js', array(), '5.3.8', 'all');
    wp_enqueue_script( 'main', get_template_directory_uri(  ).'/js/main.js', array(), '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'app_genius_css_file_calling');

// google font enqueue 
function agp_add_google_fonts(){
    wp_enqueue_style( 'agp_google_font', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald:wght@200..700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'agp_add_google_fonts' );