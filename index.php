<?php get_header(); ?>
<section id="index" class="content-area">

	<header class="index-header">
	</header>
	<div class="container">	
		<div class="span ten search-field">
			<?php get_search_form(); ?>	
		</div>

		<?php if ( have_posts() ) : ?>
			<ul class="posts">
			<?php 
			$i = 1;
			$year = date('Y', strtotime('+1 year'));
			
			while ( have_posts() ) : the_post(); ?>
				<?php 
					$image_size = array('width' => 400, 'height' => 375);
					$post_year =get_the_date('Y');
				?>
				<?php if($year != $post_year ): ?>
					<div class="year">
						<?php the_date('Y'); ?>
					</div>
					<?php  $year = $post_year ?>
				<?php endif; ?>
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
	</div>
</section>
<?php get_footer(); ?>
