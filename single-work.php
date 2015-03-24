<?php get_header(); ?>

<?php include_module('parallax-header'); ?>

<div id="single-work">

	<?php while ( have_posts() ) : the_post(); ?>


		<div id="content">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if(!$post->post_content == ''): ?>
				<?php the_content(); ?>
			<?php endif; ?>
			<?php if ( get_field('content')):?>
				<?php get_template_part('inc/content'); ?>
			<?php endif; ?>

			</article>
		</div>
	<?php 
		endwhile; 
		wp_reset_postdata();
		// end of the loop. 
	?>
</div><!-- #single -->
<?php include_module('related-posts'); ?>

<?php get_footer(); ?>
