<div class="row">
    <div class="container">
        <h2 class="center"> Lĩnh vực kinh doanh </h2>
        <hr width="400px">
        <?php
            $term = get_term_by('slug', 'dich-vu', 'category');
            if($term){
                $term_id = $term->term_id;
                $args = array('category' => $term_id, 'posts_per_page' => 3);
                $dvs = get_posts($args);

                foreach ($dvs as $key => $post) {
                    setup_postdata( $post );
                    echo '<div class="col-md-4 center">';
                    the_post_thumbnail();
                    echo '<h4 class="center"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
                    the_excerpt();
                    echo '</div>';
                }

            }
        ?>
    </div>
</div>