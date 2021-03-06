<?php
	/**
	 * Adds Foo_Widget widget.
	 */
	class RAB_Social_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
				'social_link', // Base ID
				__( 'Social links', RAB_DOMAIN ), // Name
				array( 'description' => __( 'Appearance list social links', RAB_DOMAIN ), ) // Args
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
			$options = RAB_Option::get_option_socials();
			if( is_array( $options) &&  !empty( $options) ){
				echo '<ul class="list-social">';
					foreach ($options as $key => $value) {
						if(empty( $value ))
							continue;
						echo '<li class ="social-icon item-'.$key.'"><a target ="_blank" href="'.esc_url($value).'"><span>'.$key.'</span> </a></li>';
					}
				echo '</ul>';
			}
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