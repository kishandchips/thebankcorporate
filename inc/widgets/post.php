<?php 

class Post extends WP_Widget {

	function Post() {
		$widget_opts = array( 'description' => __('Use this widget is to show a post by it\'s position or by it\'s name.') );
		parent::WP_Widget(false, 'Post', $widget_opts);
	}

	function form($instance) {

		$offset = (isset($instance['offset'])) ? esc_attr($instance['offset']) : '1';
		$category_id = (isset($instance['category_id'])) ? esc_attr($instance['category_id']) : '';
		$post_id = (isset($instance['post_id'])) ? esc_attr($instance['post_id']) : '';
		$size = (isset($instance['size'])) ? esc_attr($instance['size']) : 'small';
		$custom_query = new WP_Query( array('no_found_rows' => true, 'post_type' => array('post'), 'order' => 'DESC', 'post_status' => 'publish', 'posts_per_page' => 50)); 
	?>
		<p>
			<label>Select post number&nbsp;&nbsp;<input class="widefat" style="width: 40px;" name="<?php echo $this->get_field_name('offset') ?>" type="text" value="<?php echo $offset; ?>" /></label>
			&nbsp;&nbsp;
			<label>in&nbsp;&nbsp;
				<?php wp_dropdown_categories(array('hierarchical' => true, 'selected' => $category_id, 'show_option_none' => 'Current', 'show_option_all' => 'All', 'name' => $this->get_field_name('category_id'))); ?>
			</label>
		</p>
		<p>
		 <?php if ( $custom_query->have_posts() ) : ?>
			
			<label>or a specific post:
				<select name="<?php echo $this->get_field_name('post_id'); ?>" style="width: 170px;">
					<option value="">--None--</option>
					<?php while ( $custom_query->have_posts() ) : $custom_query->the_post();  ?>
					<option value="<?php echo get_the_ID() ?>"  <?php if(get_the_ID() == $post_id) echo 'selected'; ?> ><?php the_title(); ?></option>
					<?php endwhile; ?>
				</select>
			</label>
		<?php endif; ?>
		</p>
		<hr />
		<p>
			<label>Size: 
				<select name="<?php echo $this->get_field_name('size'); ?>" >
					<option value="small" <?php if($size == 'small') echo 'selected'; ?>>Small</option>
					<option value="medium" <?php if($size == 'medium') echo 'selected'; ?>>Medium</option>
					<option value="large" <?php if($size == 'large') echo 'selected'; ?>>Large</option>
				</select>
			</label>
		</p>
	<?php 
	}

	function update($new_instance, $old_instance){
		return $new_instance;
	}

	function widget($args, $instance) {
		global $post;

		$location = $args['id'];
		$args['offset'] = ($instance['offset']) ? intval($instance['offset']) - 1 : 0;
		$args['category_id'] = (isset($instance['category_id']) && $instance['category_id'] != 0) ? $instance['category_id'] : '';		
		$args['size'] = (isset($instance['size'])) ? $instance['size'] : 'small';
		$args['post_id'] = (isset($instance['post_id'])) ? $instance['post_id'] : null;

		$options = array('posts_per_page' => 1, 'post_type' => array('post'), 'orderby' => 'date', 'order' => 'DESC', 'post_status' => 'publish');
		if($args['post_id']){
			$options['p'] = $args['post_id'];
		} else {
			$options['offset'] = $args['offset'];
			if($args['category_id']){
				$options['category__in'] = array($args['category_id']);
			}
		}

		$custom_query = new WP_Query($options);

		if ( $custom_query->have_posts() ) :
			echo $args['before_widget'];
			$i = 0;
			while ( $custom_query->have_posts() ) : $custom_query->the_post();
				switch($args['size']) {
					case 'large':
						$image_size = array('width' => 320, 'height' => 222);
					break;
					case 'medium':
						$image_size = array('width' => 320, 'height' => 294);
					break;
					case 'small':
					default:
						$image_size = array('width' => 320, 'height' => 222);
					break;						
				}
						
				if($location == 'homepage_carousel') $image_size = array('width' => 840, 'height' => 480);
				$author_id = get_the_author_meta('ID');
				$category = get_post_category();
				$module = ($location == 'homepage_carousel') ? 'post-slide' : 'post-item';
				$sub_category = get_post_sub_category();
				if( !$sub_category || $location == 'homepage_carousel') $sub_category = $category;

				if( $location != 'homepage_carousel') {
					include_module('post-top-category', array(
						'name' => $category->name
					));
				}

				$data = array(
					'title' => get_the_title(),
					'excerpt' => get_excerpt(150),
					'url' => get_permalink(),
					'image_url' => get_post_thumbnail_src($image_size),
					'author' => array(
						'name' => get_the_author(),
						'image_url' => get_avatar_url ( get_the_author_meta('ID'), 40 ),
						'url' => get_author_posts_url($author_id),
					),
				    'category' => array(
				    	'name' => $sub_category->name,
				    ),
					'read_more' => true,
					'date' => get_the_date(),
					'class' => 'has-sub-category'
				);



				include_module($module, $data);

				$i++;
			endwhile;
			echo $args['after_widget'];	
			wp_reset_postdata();
			wp_reset_query();
		endif;
	}
}

register_widget('Post');
