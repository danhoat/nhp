<div class="row">
    <div class="container">
        <h2 class="center"> Các lĩnh vực kinh doanh </h2>
        <hr width="400px">
        <?php
            $term = get_term_by('slug', 'dich-vu', 'category');
            if($term){
                $term_id = $term->term_id;
                $args = array('category' => $term_id);
                $dvs = get_posts($args);

                foreach ($dvs as $key => $post) {
                    setup_postdata( $post );
                    echo '<div class="col-md-4 center">';
                    the_post_thumbnail();
                    the_title();
                    the_excerpt();
                    echo '</div>';
                }

            }
        ?>
    </div>
</div>