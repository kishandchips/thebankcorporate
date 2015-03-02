<?php 

class Editor extends WP_Widget {

	function Editor() {
		$widget_opts = array( 'description' => __('Use this widget is to show an Editor / Contributor in the Widget Areas.') );
		parent::WP_Widget(false, 'Editor', $widget_opts);
	}

	function form($instance) {
	?>
		<p>
			<label>Choose the Editors Letter you want to show</label>
		</p>
	<?php 
	}

	function update($new_instance, $old_instance){
		return $new_instance;
	}

	function widget($args, $instance) {
		global $post;
		
		$posts = get_field('post', 'widget_'.$args['widget_id']);


		if( $posts ) :
			echo $args['before_widget']; 
			?>

				<?php foreach($posts as $post) : ?>
				<?php setup_postdata($post); ?>
				<?php 
					$author_id = get_the_author_meta('ID');
					$author_image = get_field('image', 'user_'. $author_id);
					$author_img_url = get_avatar_url ( $author_id, $size = '40' );
					$author_url = get_author_posts_url($author_id);
					$excerpt = get_the_excerpt();
					$excerpt = (strlen($excerpt) > 150) ? '"'.substr($excerpt,0,150).'" ...' : $excerpt;

				 ?>

					<img class="image" src="<?php echo get_image(get_post_thumbnail_id($post->ID), array(180, 180)); ?>">
					<div class="script">
						<img src="<?php bloginfo('template_directory'); ?>/images/misc/editors-letter.png" alt="">	
					</div>
					<a href="<?php echo $author_url; ?>">
						<div class="author">
								<div class="image circle">
										<img src="<?php echo $author_img_url; ?>" />
								</div>
								<span class="name"><?php echo the_author_meta( "display_name", $author_id ); ?></span>
						</div>	
					</a>
					<div class="date">
						february 01,2015
					</div>
					
					<div class="bio">
						<?php echo $excerpt; ?>	
						<a class="read-more" href="<?php the_permalink(); ?>">Read Further &raquo;</a>	
					</div>
				<?php endforeach;	?>
			<? 
			echo $args['after_widget'];	
		endif;
		
		
	}
}

register_widget('Editor');
