<?php get_header(); ?>
<section id="index" class="content-area">

	<header class="index-header">
		<div class="container">
			<div class="filters">
				<div class="span ten search-field">
					<?php get_search_form(); ?>	
				</div>
			</div>				
		</div>
	</header>
	<div class="container">	
		<?php if ( have_posts() ) : ?>
			<ul class="posts">
			<?php 
			$i = 1;
			$array = array(1,5);
			
			while ( have_posts() ) : the_post(); ?>
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
		<div id="navbelow">
			<?php next_posts_link('Next &raquo;'); ?>			
		</div>
		<a class="primary-btn" id="next"><?php _e('Load More'); ?></a>
	</div>
</section>
<?php get_footer(); ?>
