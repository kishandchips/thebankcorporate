<?php 
class Links extends WP_Widget_Links {

	public function __construct() {
		$widget_ops = array('description' => __( "Your links" ) );
		parent::__construct('links', __('Links'), $widget_ops);
	}

	public function widget( $args, $instance ) {

		$show_description = isset($instance['description']) ? $instance['description'] : false;
		$show_name = isset($instance['name']) ? $instance['name'] : false;
		$show_rating = isset($instance['rating']) ? $instance['rating'] : false;
		$show_images = isset($instance['images']) ? $instance['images'] : true;
		$category = isset($instance['category']) ? $instance['category'] : false;
		$orderby = isset( $instance['orderby'] ) ? $instance['orderby'] : 'name';
		$order = $orderby == 'rating' ? 'DESC' : 'ASC';
		$limit = isset( $instance['limit'] ) ? $instance['limit'] : -1;

		$before_widget = preg_replace( '/id="[^"]*"/', 'id="%id"', $args['before_widget'] );

		/**
		 * Filter the arguments for the Links widget.
		 *
		 * @since 2.6.0
		 *
		 * @see wp_list_bookmarks()
		 *
		 * @param array $args An array of arguments to retrieve the links list.
		 */
		wp_list_bookmarks( apply_filters( 'widget_links_args', array(
			'title_before' => $args['before_title'], 'title_after' => $args['after_title'],
			'category_before' => $before_widget, 'category_after' => $args['after_widget'],
			'show_images' => $show_images, 'show_description' => $show_description,
			'show_name' => $show_name, 'show_rating' => $show_rating,
			'category' => $category, 'class' => 'linkcat widget',
			'orderby' => $orderby, 'order' => $order,
			'limit' => $limit,
		) ) );
	}
}

register_widget('Links');
