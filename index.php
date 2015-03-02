<?php get_header(); ?>
<section id="index" class="content-area">

	<header class="index-header">
		<h2 class="index-title"><?php _e('News'); ?></h2>
		<div class="container">
			<div class="filters">
				<div class="span two-thirds category-selector">
					</select><?php wp_dropdown_categories(array('class' => 'category', 'show_option_all' => __("ALL CATEGORIES", THEME_NAME), 'walker' => new Category_Dropdown_Url_Walker)); ?>					
				</div>
				<div class="span one-third search-field">
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
			$array = array(1,8);
			
			while ( have_posts() ) : the_post(); ?>
				<?php 
					$image_size = (in_array($i, $array)) ?  array('width' => 780, 'height' => 635) : array('width' => 370, 'height' => 250);
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
