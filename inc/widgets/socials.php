<?php 

class Social extends WP_Widget {

	function Social() {
		$widget_opts = array( 'description' => __('Use this widget is to show a list of Social Icons') );
		parent::WP_Widget(false, 'Social', $widget_opts);
	}

	function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}


	function update($new_instance, $old_instance){
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		
		echo $args['before_widget'];?>
			<span><?php echo $title; ?></span>
			<a href="https://twitter.com/G4ASeasons"><?php _e('@G4AS'); ?></a>
			<?php include_module('social-links'); ?>

		<?php echo $args['after_widget'];

	}		
}

register_widget('Social');