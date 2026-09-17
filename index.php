<?php
// This is template for the displaying header 
?>
<!DOCTYPE html>
<html lang="<?php language_attributes( ); ?>" class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(  ); ?>
    
</head>
<body <?php body_class(  );?>>
    <div id="header-area" class="<?php echo get_theme_mod( 'agp_menu_position' ); ?>"> 
        <div class="container"> 
            <div class="row"> 
                
                <div class="col-md-3"> 
                    <a href="<?php echo home_url( ); ?>">
                        <img src="<?php echo get_theme_mod( 'agp_logo' ); ?>" alt="">
                    </a> 
                </div> 

                <div class="col-md-9"> 
                    
                <?php wp_nav_menu( array('theme_location'=> 'main_menu', 'menu_id'=>'nav', 'container'=>false) ); ?> 

                </div> 
            </div> 
        </div> 
    </div>
    
    <section id="boady-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php the_content( ); ?>
                </div>
            </div>
        </div>
    </section>    

    
        <div id="footer_area">
            <section id="copyright_area">
                <div class="container">
                    <div class="row">
                        <div class="col-m12">
                            <p><?php echo get_theme_mod('agp_copyright_section') ?></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    

<?php wp_footer(  ); ?>
</body>
</html>