<?php get_header(); ?>
<section id="front-page">

	<?php
	$args = array(									
		'post_type'   => 'slides',
		'post_status' => 'publish',	
		'posts_per_page' => 6,
		'order'       => 'ASC',
		'orderby'     => 'menu_order'
	);

	$slide_query = new WP_Query( $args ); ?>

	<?php if ( $slide_query->have_posts() ): ?>

		<div id="wowslider">
			<div class="ws_images">
				<ul>
					<?php while ( $slide_query->have_posts() ) : $slide_query->the_post(); ?>

						<?php $post_object = get_field('slide_linkage'); ?>

					    <li>
					    	<a href="<?php echo get_permalink($post_object->ID); ?>">
						    	<img src="<?php the_field('slide_image'); ?>" alt="" title="1">	
					    	</a>
				    	</li>
			    	<?php endwhile; ?>
				</ul>
			</div>
			<div class="ws_bullets">
				<div>
					<?php while ( $slide_query->have_posts() ) : $slide_query->the_post(); ?>
						<a href="<?php the_field('slide_image'); ?>" title="'1'">
							<span>
							</span>
						</a>						
					<?php endwhile; ?>
				</div>
			</div>
		</div>		
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
						$image_size = (in_array($i % 6 , $array)) ?  array('width' => 804, 'height' => 538) : array('width' => 450, 'height' => 301);
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