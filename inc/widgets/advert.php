<?php 

class Advert extends WP_Widget {

    function Advert() {
        $widget_opts = array( 'description' => __('Use this widget is to show a Advertiment.') );
        parent::WP_Widget(false, 'Advertisment', $widget_opts);
    }

    function form($instance) {
        $link = (isset($instance['link'])) ? esc_attr($instance['link']) : '';  
        echo '<p><label>';
        echo _e('Ad link:').'<input class="widefat" name="'. $this->get_field_name('link').'" type="text" value="'. $link.'" />';
        echo '</label></p>';
        $image_url = (isset($instance['image_url'])) ? esc_attr($instance['image_url']) : '';  
        echo '<p><label>';
        echo _e('Ad image url:').'<input class="widefat" name="'. $this->get_field_name('image_url').'" type="text" value="'. $image_url.'" />';
        echo '</label></p>';
    }

    function update($new_instance, $old_instance){
        return $new_instance;
    }

    function widget($args, $instance) {
        global $post;
        $args['link'] = $instance['link'];
        $args['image_url'] = $instance['image_url'];

        echo $args['before_widget'];?>
        <a href="<?php echo $args['link']; ?>" target="_blank">
            <img src="<?php echo $args['image_url']; ?>" class="scale" />
        </a>
        <?php echo $args['after_widget'];
    }
}

register_widget('Advert');