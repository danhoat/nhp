<div class="row">
    <div class="container">
        <h2 class="center"> Sản phẩm nổi bật </h2>
        <hr width="400px">
        <?php
            $args = array( 'hide_empty'=> 0);
            $terms = get_terms('product_cat', $args);
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                foreach ($terms as $term) {
                    echo '<div class="col-md-3 center">';

                        $id = $term->term_id;
                        $thumbnail_id = get_woocommerce_term_meta( $id, 'thumbnail_id', true );

                        if ( $thumbnail_id ) {
                            $image = wp_get_attachment_thumb_url( $thumbnail_id );
                        } else {
                            $image = wc_placeholder_img_src();
                        }
                        $image = str_replace( ' ', '%20', $image );

                        echo '<img src="' . esc_url( $image ) . '" alt="' . __( 'Thumbnail', 'rab_domain' ) . '" class="wp-post-image"  width="250" />';

                        echo "<h4><a href='".get_term_link($term)."'>".$term->name."</a></h4>";
                        echo $term->description;

                    echo '</div>';
                }
            }
        ?>
    </div>
</div>