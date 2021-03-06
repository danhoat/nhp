<?php
/**
 * index template default
 */
?>
<?php get_header(); ?>

<div class="container main-page">
    <div class="row">
        <?php get_sidebar();?>
        <div class="col-lg-9 main-content">
            <div class="entry-page">

                <?php

                do_action("rab_before_loop");

                if(have_posts()):
                    echo '<h1 class="title">'.get_the_title().'</h1>';
                    the_post();
                    echo '<div class="content">';
                        the_content();
                    echo '</div>';
                else :
                    get_template_part('template/none' );

                endif;

                ?>
                <?php do_action("rab_after_loop") ?>

            </div> <!-- .endtry end !-->

        </div>
    </div> <!-- .row !-->

</div> <!-- End main-content!-->

<?php get_footer();?>