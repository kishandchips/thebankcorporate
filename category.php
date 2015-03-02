<?php get_header(); ?>
<?php $category = get_top_level_category(get_query_var('cat')); ?>
<section id="category" class="container">
	<div class="sidebar-container">
		<div class="sidebar-content">
			<header class="category-header">
				<h5 class="category-title title green-label"><?php echo $category->name; ?></h5>
				<nav class="category-navigation navigation">
					<ul class="menu">
						<?php wp_list_categories( array('title_li' => false, 'child_of' => $category->term_id, 'hide_empty' => false)); ?>
					</ul>
				</nav>
			</header>
			<?php if ( have_posts() ) : ?>

			<ul class="posts">
				<?php 
				$i = 0;
				while ( have_posts() ) : the_post(); ?>
					<?php 
						$image_size = ($i == 0) ?  array('width' => 656, 'height' => 525) : array('width' => 320, 'height' => 222);
						$author_id = get_the_author_meta('ID');
						$category = get_post_category();
					?>
		            <li>
		                <?php include_module('post-item', array(
							'title' => get_the_title(),
							'excerpt' => get_excerpt(150),
							'url' =>  get_permalink(),
							'image_url' => get_post_thumbnail_src($image_size),
							'author' => array(
								'name' => 'Words by ' .get_the_author(),
								'image_url' => get_avatar_url ( $author_id, 40 ),
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

		</div>
		<?php get_sidebar(); ?>	
	</div>
</section>
<?php include_module('related-posts'); ?>
<?php get_footer(); ?>
