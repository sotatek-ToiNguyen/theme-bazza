<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

<?php

if ( function_exists('wp_body_open') ) {
	wp_body_open();
}

?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bazaar-lite' ); ?></a>

<div id="wrapper">
	
    <div id="header-wrapper">
    
        <header id="header">
        
            <div class="container">
            
                <div class="row">
                
                    <div class="col-md-2">
            
                        <div id="logo">
                        
							<?php bazaarlite_get_logo(); ?> 
                                            
                        </div>
                        
                    </div>

					<?php 
						
						if ( bazaarlite_is_woocommerce_active() && bazaarlite_setting('wip_woocommerce_header_cart') == "on" ) :
							
							$menu_class="col-md-9";
							
							echo '<div class="col-md-1 right">';
		
								bazaarlite_header_cart();
							
							echo '</div>';
							
						else:
	
							$menu_class="col-md-10";

						endif;

					?>

                    <div class="<?php echo $menu_class; ?>">

                        <button class="menu-toggle" aria-controls="mainmenu" aria-expanded="false" type="button">
                            <span aria-hidden="true"><?php esc_html_e( 'Menu', 'bazaar-lite' ); ?></span>
                            <span class="dashicons" aria-hidden="true"></span>
                        </button>

                        <nav id="mainmenu" class="<?php echo bazaarlite_setting('wip_menu_layout'); ?>">

                            <?php 
                                                
                                wp_nav_menu( array(
                                    'theme_location' => 'main-menu',
                                    'container' => 'false'
                                )); 
                                                
                            ?>
                        
                        </nav>
                        	
                    </div>
                    
                </div>
                
            </div>  
            
        </header>
    
    </div>
    
<?php 

	if ( is_front_page() ) {

		if ( bazaarlite_setting('wip_enable_slideshow') == 'on' || !bazaarlite_setting('wip_enable_slideshow') )
			do_action('bazaarlite_header_slideshow');
	
	} else {
	
		do_action('bazaarlite_get_breadcrumb'); 

	}
	
?>