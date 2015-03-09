<?php get_header(); ?>
<section id="front-page">

	<?php
		$args = array(									
			'post_type'   => 'slides',
			'post_status' => 'publish',	
			'posts_per_page' => 6,
			'order'       => 'DESC',
			'orderby'     => 'date'
		);
	
		$slide_query = new WP_Query( $args ); ?>

		<?php if ( $slide_query->have_posts() ): ?>

			<div class="owl-carousel featured-carousel">

			<?php while ( $slide_query->have_posts() ) : $slide_query->the_post(); ?>

				<?php $post_object = get_field('slide_linkage'); ?>

			    <div class="item">
			    	<a href="<?php echo get_permalink($post_object->ID); ?>">
				    	<img src="<?php the_field('slide_image'); ?>" alt="">	
			    	</a>
		    	</div>
	    	<?php endwhile; ?>
  	 	
			</div>				

		<?php endif; ?>



	<div class="inner container">
	<?php
		$args = array(									
			'post_type'   => 'post',
			'post_status' => 'publish',	
			'posts_per_page' => 6,
			'order'       => 'DESC',
			'orderby'     => 'date',	
			'ignore_sticky_posts' => true		
		);
	
		$query = new WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ): ?>

			<h2 class="section-title"><?php _e('Latest News') ?></h2>

			<ul class="posts">
				<?php 
				$i = 0;
				$i = 1;
				$array = array(1,5);				
				while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php 
						$image_size = (in_array($i % 6 , $array)) ?  array('width' => 804, 'height' => 542) : array('width' => 392, 'height' => 263);
					?>
	            <li>
	                <?php include_module('post-item', array(
						'title' => get_the_title(),
						'url' =>  get_permalink(),
						'image_url' => get_post_thumbnail_src($image_size),
					)); ?>
	            </li>								
				<?php 
				$i++;
				endwhile; // end of the loop. ?>
			</ul>

		<?php else: ?>
			<div class="not-found">
				<h3 class="title"><?php _e("No posts found", THEME_NAME); ?></h3>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php get_footer(); ?>