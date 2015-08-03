<?php
	/**
	 * Adds Posts Tabs widget
	 */
	class RAB_Posts_Tabs_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
				'posts_tabs', // Base ID
				__( 'Post tabs', RAB_DOMAIN ), // Name
				array( 'description' => __( 'Appearance list post via tabs', RAB_DOMAIN ), ) // Args
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}
			?>
			  <!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Recent</a></li>
				    <li role="presentation"><a href="#post_popular" aria-controls="post_popular" role="tab" data-toggle="tab">Popular</a></li>
				</ul>

				  <!-- Tab panes -->
				 <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="home">
				    	<?php
				    		$args = array(
				    			'post_type' 	=> 'post',
				    			'post_status' 	=> 'publish',
				    			);
				    		$the_query = new WP_Query($args);
				    		if ( $the_query->have_posts() ):
				    			echo '<ul class="list-post">';
					    		while($the_query->have_posts()):
					    			$the_query->the_post();
					    			echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
					    		endwhile;
					    		echo '</ul>';
					    	endif;
				    	?>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="post_popular">
				    	<?php
				    		$args = array(
				    			'post_type' 	=> 'post',
				    			'post_status' 	=> 'publish',
				    			//'meta_key' 		=> '_post_views',
				    			'orderby'   	=> 'meta_value_num',
				    			'meta_query' 	=>  array(
				                    'relation' => 'OR',
				                    array(
				                        'key' => '_post_views',
				                        'compare' => 'NOT EXISTS',
				                        'value'   => 'completely'
				                    ),
				                    array(
				                        'key' 		=> '_post_views',
				                        'complate' 	=>'!=',
				                       	'value' 		=> '1'
				                    )
				                ),
				    		);
				    		$the_query = new WP_Query($args);
				    		if ( $the_query->have_posts() ):
				    			echo '<ul class="list-post list-post-popular">';
					    		while($the_query->have_posts()):
					    			$the_query->the_post();
					    			echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
					    		endwhile;
					    		echo '</ul>';
					    	endif;
				    	?>

				    </div>
				 </div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', RAB_DOMAIN );
			?>
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

			return $instance;
		}

	} // class Foo_Widget


?>