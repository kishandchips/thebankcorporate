<?php 

class Posts extends WP_Widget {

	function Posts() {
		$widget_opts = array( 'description' => __('Use this widget is to show posts') );
		parent::WP_Widget(false, 'Posts', $widget_opts);
	}

	function form($instance) {
		$title = (isset($instance['title'])) ? esc_attr($instance['title']) : '';
		$description = (isset($instance['description'])) ? esc_attr($instance['description']) : '';
		$size = (isset($instance['size'])) ? esc_attr($instance['size']) : '';
	?>
		<p>
			<label>Title: <input class="widefat" name="<?php echo $this->get_field_name('title') ?>" type="text" value="<?php echo $title; ?>" /></label>
		</p>
		<p>
			<label>Description: <input class="widefat" name="<?php echo $this->get_field_name('description') ?>" type="text" value="<?php echo $description; ?>" /></label>
		</p>
		<p>
			<label>Size: 
				<select class="widefat" name="<?php echo $this->get_field_name('size') ?>" >
					<option value="large" <?php selected('large', $size); ?>>Large</option>
					<option value="medium" <?php selected('medium', $size); ?>>Medium</option>
					<option value="small" <?php selected('small', $size); ?>>Small</option>
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
		
		$posts = get_field('posts', 'widget_'.$args['widget_id']);
		$size = $instance['size'];

		if( $posts ) :

			echo $args['before_widget'];

			if( !empty($instance['title'])) : 
				echo $args['before_title'].$instance['title'].$args['after_title']; ?>
				<?php if( !empty($instance['description'])) : ?>
				<div class="widget-description"><?php echo $instance['description']; ?></div>
				<?php endif; ?>
			<?php endif; ?>

			<ul class="posts size-<?php echo $size; ?>">
			<?php foreach($posts as $post) : ?>
				<?php setup_postdata($post); ?>
				<?php 
					$class = array($instance['size']); 
					$class[] = (has_post_thumbnail()) ? 'has-thumbnail' : '';
					switch ($size) {
						case 'small':
							$image_size = array('width' => 100, 'height' => 100);
							$title = get_the_title();
						break;
						case 'medium':
							$image_size = array('width' => 65, 'height' => 65);
							$title = (strlen(get_the_title()) > 25) ? substr(get_the_title(),0,25).' ...' : get_the_title();
						break;
						case 'large':
						default:
							$image_size = array('width' => 200, 'height' => 200);
							$title = get_the_title();
						break;
					}
				?>
				<li <?php post_class(); ?>>
					
					<?php include_module('post-item', array(
						'title' => $title,
						'excerpt' => get_excerpt(50),
						'url' => get_permalink(),
						'image_url' => get_post_thumbnail_src($image_size),
						'class' => implode(' ', $class)
					)); ?>
				</li>
				<?php endforeach;	?>
			</ul>
			<?php
			echo $args['after_widget'];	
			wp_reset_postdata();
			wp_reset_query();
		endif;
	}
}

register_widget('Posts');
