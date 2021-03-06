<?php
    /**
     * index template default
     */

?>
<?php get_header(); ?>
<?php global $number_column, $col_bootrap, $content_class, $theme_layout; ?>
<div class="row full-row">
    <div class="container main-page">
     <div class=" main-content">
        <div class="row">
            <?php  ra_sidebar();?>
            <?php
            if( !empty($content_class) )
                echo '<div class="'.$content_class.'">';
            if ($theme_layout != 'one-column')
                echo '<div class="entry-page">';
            ?>
            <?php
            do_action("rab_before_loop");
            echo '<h1 class="archive-title">'. single_cat_title("", false) .'</h1>';
            if(have_posts()):
                $i = 0;

                while(have_posts()): the_post();

                    if( $i % $number_column == 0)
                        $class =$col_bootrap." col-left-product";

                    else if($i % $number_column == $number_column -1)
                        $class = $col_bootrap."col-right-product";

                    else
                        $class =$col_bootrap.'col-center-product';

                    $format     = apply_filters("post_format_default",get_post_format() );
                    get_template_part( 'content', $format );
                    $i ++;

                endwhile;
               // rab_pagination();

            else :
                get_template_part('template/none' );

            endif;
             if ($theme_layout != 'one-column')
                echo '</div> <!-- entry-pag !-->';
            ?>
            <?php do_action("rab_after_loop") ?>
            <?php
            if( !empty($content_class) )
                echo '</div>';
            ?>

            </div>
        </div> <!--end .row !-->


    </div> <!-- End main-content!-->
</div> <!-- full row !-->

<?php get_footer();?>