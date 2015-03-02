<?php 

class Category extends WP_Widget {

	function Category() {
		$widget_opts = array( 'description' => __('Use this widget is to show a category') );
		parent::WP_Widget(false, 'Category', $widget_opts);
	}

	function form($instance) {
		$category_id = (isset($instance['category_id'])) ? esc_attr($instance['category_id']) : '';
	?>
		<p>
			<label>Category: 
				<?php wp_dropdown_categories(array('hierarchical' => true, 'selected' => $category_id, 'show_option_none' => false, 'show_option_all' => false, 'name' => $this->get_field_name('category_id'), 'hide_if_empty' => false, 'hide_empty' => false)); ?>
			</label>
		</p>
		
	<?php 
	}

	function update($new_instance, $old_instance){
		return $new_instance;
	}

	function widget($args, $instance) {
		global $post;
		
		$args['category_id'] = (isset($instance['category_id'])) ? $instance['category_id'] : null;				
		$category = get_category($args['category_id']);	

		if($category) :
			echo $args['before_widget'];
			$image_id = get_field('image', 'category_'.$category->term_id);
			$sub_title = get_field('sub_title', 'category_'.$category->term_id);
			$image_url = get_image( $image_id, array( 'width' => 400, 'height' => 220) );
			
			include_module('category-btn', array(
				'url' => get_term_link($category),
				'image_url' => $image_url,
				'name' => $category->name,
				'sub_title' => $sub_title
			));
			echo $args['after_widget'];	
		wp_reset_postdata();
		wp_reset_query();
		endif;
	}
}

register_widget('Category');