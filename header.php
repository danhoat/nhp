<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title><?php wp_title( '|', true, 'right' ); ?></title>
	    <?php wp_head();?>
	  	</head>
  	<body <?php body_class();?>>
        <div class="row full-row top-row">

            <div class="container ">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <?php if (  get_header_image()  != '' ) { ?>
                            <a href="<?php echo home_url();?>">    <img src="<?php echo get_header_image() ; ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" /> </a>
                      <?php } ?>
                      <button id="showRight"><a class="right-off-canvas-toggle menu-icon mobile-toggle" href="#off-canvas-navigation" aria-expanded="false"><span>Menu</span></a> </button>
                    </div>
                </div>

          	</div>
        </div>
        <nav class="menu-main cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">

           <div class="container">

                <?php wp_nav_menu(array( 'theme_location' => apply_filters( RAB_DOMAIN, 'main_menu' ) ,'menu_class' => 'main-menu' ,'container_class' => 'menu-main-menu-container' ));?>
           </div>

        </nav>

        <?php
            if(is_active_sidebar('header')):
                echo '<div class="row">';
                  dynamic_sidebar('header');
                echo '</div>';
            endif;
        ?>
