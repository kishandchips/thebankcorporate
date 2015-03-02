<?php get_header(); ?>
<section id="index" class="content-area container">

	<header class="index-header">
		<h2 class="index-title"><?php _e('Archive'); ?></h2>
		<div class="index-name">
			<span class="label"><?php _e('Viewing'); ?></span> 
			<span class="value"><?php echo ( is_category() ) ? single_cat_title() : __("All", THEME_NAME); ?></span>
		</div>
		<div class="filters">
			<?php get_search_form(); ?>
			<select class="date">
				<option value=""><?php _e("Select date", THEME_NAME); ?></option>
				<?php wp_get_archives(array('format' => 'option')); ?>
			</select><?php wp_dropdown_categories(array('class' => 'category', 'show_option_all' => __("All Categories", THEME_NAME), 'walker' => new Category_Dropdown_Url_Walker)); ?>
		</div>				
	</header>
	
	<?php if ( have_posts() ) : ?>
	
		<ul class="posts">
		<?php 
		$i = 0;
		while ( have_posts() ) : the_post(); ?>
			<?php 
				$image_size =  ($i == 0) ? array('width' => 500, 'height' => 300) : array('width' => 240, 'height' => 300);
				$excerpt_length = ($i == 0) ? 200 : 110;
				$author_id = get_the_author_meta('ID');
				$category = get_post_category();
			?>
            <li>
                <?php include_module('post-item', array(
					'title' => get_the_title(),
					'excerpt' => get_excerpt($excerpt_length),
					'url' =>  get_permalink(),
					'image_url' => get_post_thumbnail_src($image_size),
					'author' => array(
						'name' => 'Words by ' . get_the_author(),
						'image_url' => get_avatar_url ($author_id, 40 ),
						'url' => get_author_posts_url($author_id),
					),							
                    'category' => array(
                    	'name' => $category->name,
                    ),
					'read_more' => true,
					'date' => get_the_date(),
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

	<?php include_module('pagination'); ?>

	<?php include_module('categories'); ?>
</section>
	

<?php get_footer(); ?>
