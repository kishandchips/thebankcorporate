<?php get_header(); ?>
<section id="works" class="content-area">
	<?php if ( have_posts() ) : ?>
		<ul class="posts">
		<?php 
		$i = 1;
		$array = array(1,8);
		
		while ( have_posts() ) : the_post(); ?>
			<?php 
				$image_size = array('width' => 450, 'height' => 290);
			?>
            <li >
            <a href="<?php echo get_permalink(); ?>" class="work-item overlay-btn-dark">
				<img src="<?php echo get_post_thumbnail_src($image_size); ?>" alt="<?php echo get_the_title(); ?>"/>
				<figcaption>
					<div>
						<h2><?php echo get_the_title(); ?></h2>
						<p><?php echo get_excerpt(50); ?></p>
					</div>
				</figcaption>			
				</a>		
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
</section>
<?php get_footer(); ?>
