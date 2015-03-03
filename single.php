<?php get_header(); ?>

<?php if(get_field('header_image')): ?>
	<div class="parallax-window" data-parallax="scroll" data-image-src="<?php the_field('header_image'); ?>"></div>
<?php endif; ?>

<div id="single">

	<?php while ( have_posts() ) : the_post(); ?>


		<div id="content">
			<div class="inner container">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if(!$post->post_content == ''): ?>
					<div class="post-header">
						<h1 class="post-title"><?php the_title(); ?></h1>
						<span class="subtitle"><?php the_time('d M Y'); ?></span>
					</div>
					<?php the_content(); ?>
				<?php endif; ?>

				</article>
			</div>
		</div>
	<?php 
		endwhile; 
		wp_reset_postdata();
		// end of the loop. 
	?>
</div><!-- #single -->
<?php include_module('related-posts'); ?>

<?php get_footer(); ?>
