<?php
// My theme function 

// theme title 
add_theme_support( 'title-tag' );

// theme css and jQuery file calling 
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

// theme function 
function agp_customizar_register($wp_customize){

// header area function 
    $wp_customize->add_section( 'agp_header_area', array(
        'title' => __('Header Area', 'prince'),
        'description' => 'If you intersted to update your header area, you can do it here'
    ) );

    $wp_customize->add_setting('agp_logo', array(
        'default'=> get_bloginfo( 'template_directory' ).'/img/logo.png',
    ));

    $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'agp_logo', array(
        'label'=> 'Logo upload',
        'description'=>'You can add and change your logo from here',
        'setting'=>'agp_logo',
        'section'=> 'agp_header_area'
    )));
    
   // Menu Position Option
    $wp_customize->add_section('agp_menu_option', array(
        'title'       => __('Menu Position Option', 'prince'),
        'description' => __('You can change menu position from here', 'prince'),
    ));


    $wp_customize->add_setting('agp_menu_position', array(
        'default'   => 'right_menu',
        'transport' => 'refresh',
    ));


    $wp_customize->add_control('agp_menu_position_control', array(
        'label'       => __('Menu Position', 'prince'),
        'description' => __('Select Your Menu Position', 'prince'),
        'settings'    => 'agp_menu_position',
        'section'     => 'agp_menu_option',
        'type'        => 'radio',
        'choices'     => array(
            'left-menu'   => __('Left Menu', 'prince'),
            'right-menu'  => __('Right Menu', 'prince'),
            'center-menu' => __('Center Menu', 'prince'),
        ),
    ));

   // footer Position Option
    $wp_customize->add_section('agp_footer_option', array(
        'title'       => __('Footer Option', 'prince'),
        'description' => __('You can change or update your footer', 'prince'),
    ));


    $wp_customize->add_setting('agp_copyright_section', array(
        'default'   => '&copy; copyright 2026 | AGP',
    ));


    $wp_customize->add_control('agp_copyright_section', array(
        'label'       => 'Copyright text',
        'description' => 'If need you can update your copyright text from here',
        'settings'    => 'agp_copyright_section',
        'section'     => 'agp_footer_option',
    ));
}

add_action('customize_register','agp_customizar_register' );

// menu register 
register_nav_menu( 'main_menu', __('Main menu', 'prince') );


// Register Menu
register_nav_menu('main_menu', __('Main Menu', 'prince'));


// Walker Menu Description
function agp_nav_description($item_output, $item, $depth, $args) {

    if (!empty($item->description)) {

        $item_output = str_replace(
            '</a>',
            '</a><span class="walker_nav">' . esc_html($item->description) . '</span>',
            $item_output
        );

    }

    return $item_output;
}

add_filter('walker_nav_start_el', 'agp_nav_description', 10, 4);