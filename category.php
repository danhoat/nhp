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
                <header class="archive-header ">
                    <h1 class="archive-title title"><?php echo single_cat_title( '', false ); ?></h1>
                    <?php
                        global  $cat;
                        $term = get_queried_object();
                    ?>
                    <?php if ( category_description() ) : // Show an optional category description ?>
                        <div class="archive-meta col-lg-12">
                        <?php echo category_description(); ?>
                        <?php
                            if ( current_user_can ( 'manage_options') )
                            echo '<a href="'.admin_url('edit-tags.php?action=edit&taxonomy='.$term->taxonomy.'&tag_ID='.$term->term_id.'&post_type=post').'" >'.__('Edit',RAB_DOMAIN).'</a>';
                        ?>
                        </div>
                    <?php endif; ?>

                </header><!-- .archive-header -->

                <?php
                if(is_active_sidebar('top_content')){
                    echo '<div class="row">';
                    dynamic_sidebar('top_content');
                    echo '</div>';
                }
                do_action("rab_before_loop");

                if(have_posts()):

                    while(have_posts()): the_post();

                        get_template_part( 'content','dich-vu' );

                    endwhile;
                    rab_pagination();

                else :
                    get_template_part('template/none' );

                endif;

                ?>
                <?php do_action("rab_after_loop") ?>

            </div> <!-- .endtry end !-->

        </div> <!-- end . col-lg-9 !-->
    </div>
    <?php //get_template_part('template/block-partner' ); ?>

</div> <!-- End main-content!-->

<?php get_footer();?>