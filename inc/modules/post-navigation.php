<nav class="post-navigation clearfix">
	<?php $prev_post = get_adjacent_fukn_post('previous'); ?>
	<?php if($prev_post):?>
	<a href="<?php echo get_permalink($prev_post->ID);?>" class="btn previous">
		<?php
        $image_id = get_post_thumbnail_id($prev_post->ID);
        $image = wp_get_attachment_image_src( $image_id, 'thumbnail' );
        if($image) :
        ?>
		<div class="span two featured-image thumbnail">
			<img src="<?php echo $image[0]?>" class="scale" />
		</div>
		<?php endif; ?>
		<div  class="span eight content <?php if($image) echo 'has-thumbnail'; ?>">
			<p class="direction"><?php _e("Previous", THEME_NAME); ?></p>
			<h5 class="post-title no-margin"><?php echo $title = (strlen(get_the_title($prev_post->ID)) > 50) ? substr(get_the_title($prev_post->ID),0,50).' ...' : get_the_title($prev_post->ID); ?></h5>
		</div>
	</a>
	<?php endif; ?>
	
	<?php $next_post = get_adjacent_fukn_post('next');?>
	<?php if($next_post):?>
	<a href="<?php echo get_permalink($next_post->ID);?>" class="btn next">
		<?php
        $image_id = get_post_thumbnail_id($next_post->ID);
        $image = wp_get_attachment_image_src( $image_id, 'thumbnail' );
        if($image) :
        ?>
		<div class="span two featured-image thumbnail right">
			<img src="<?php echo $image[0]?>" class="scale" />
		</div>
		<?php endif; ?>
		<div class="span eight content text-right right <?php if($image) echo 'has-thumbnail'; ?>">
			<p class="direction"><?php _e("Next", THEME_NAME); ?></p>
			<h5 class="post-title no-margin"><?php echo $title = (strlen(get_the_title($next_post->ID)) > 50) ? substr(get_the_title($next_post->ID),0,50).' ...' : get_the_title($next_post->ID); ?></h5>			
		</div>
	</a>
	<?php endif; ?>
</nav>