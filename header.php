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
                      <button id="showRight"><a class="right-off-canvas-toggle menu-icon mobile-toggle" href="#off-canvas-navigation" aria-expanded="false"><span>Menu</span></a> </button>
                    </div>
                </div>

          	</div>
        </div>
        <div class="row bg-white">
          <nav class="menu-main cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">

             <div class="container">
                  <div class="col-md-4">
                      <a href="<?php echo home_url();?>">
                        <img src="http://cdn.wordpresscustomize.com/wp-content/uploads/2014/12/WordPress-Customize-Service.jpg" />
                      </a>
                  </div>
                  <?php wp_nav_menu(array( 'theme_location' => apply_filters( RAB_DOMAIN, 'main_menu' ) ,'menu_class' => 'main-menu ' ,'container_class' => 'menu-main-menu-container col-md-8' ));?>

             </div>

          </nav>
        </div>

        <?php
            if(is_active_sidebar('header')):
                echo '<div class="row">';
                  dynamic_sidebar('header');
                echo '</div>';
            endif;
        ?>
