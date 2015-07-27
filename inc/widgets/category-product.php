<?php
/**
 * display list category product.
 * @author : danng
 * @version : 1.0
  */
class RAB_Widget_Product_Categories extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'rab_product_categories', // Base ID
			__( 'Product Categories', RAB_DOMAIN ), // Name
			array( 'description' => __( 'List Product categories', RAB_DOMAIN ), ) // Args
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

		$list_args = $instance;
		extract($instance);
		extract($args);
		echo $before_widget;
		if( !empty( $title ) )
				echo $before_title .$title. $after_title;
		$list_args = array(  'title_li' =>'', 'taxonomy' => 'product_cat', 'hide_empty' => false );

		echo '<div class="block-menu-category">';
		echo '<ul id="menu-danh-muc-san-pham" class="mcategory">';

			wp_list_categories(  $list_args );

		echo '</ul>';
		echo '</div>';
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( $instance ,  array('title' => 'Categories'));
		extract($instance);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title',RAB_DOMAIN); ?> : </label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

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

}

?>
