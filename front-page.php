<?php get_header(); ?>
<section id="front-page">
	<div class="owl-carousel featured-carousel">
	    <div class="item">
	    	<a href="#">
		    	<img src="<?php bloginfo('template_directory' ); ?>/images/misc/bankslide.jpg" alt="">	
	    	</a>
    	</div>
	    <div class="item">
	    	<a href="#">
		    	<img src="<?php bloginfo('template_directory' ); ?>/images/misc/bankslide_peroni.jpg" alt="">	
	    	</a>
    	</div>   
	    <div class="item">
	    	<a href="#">
		    	<img src="<?php bloginfo('template_directory' ); ?>/images/misc/bankslide_400.jpg" alt="">	
	    	</a>
    	</div>     	 	
	</div>	
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