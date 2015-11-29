<?php
  /**
  * Template Name: Front template
  */
?>
<?php get_header(); ?>
<?php global $number_column, $col_bootrap, $content_class, $theme_layout; ?>

<?php
    if(is_active_sidebar('home_top_full')){
        echo '<div class="row home-top">';
            dynamic_sidebar('home_top_full');
        echo '</div>';
    }
?>
<?php //get_template_part('template/grid','product' ); ?>
<?php get_template_part( 'template/grid', 'category' ); ?>
<?php get_template_part( 'template/grid', 'services' ); ?>
<?php get_template_part( 'template/row', 'aboutus' ); ?>

<?php get_footer();?>