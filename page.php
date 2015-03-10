<?php global $post; ?>
<?php get_header(); ?>

<?php include_module('parallax-header'); ?>
<?php if(get_field('google_maps_shortcode')): ?>
	<div id="gmaps">
		<?php $map = get_field('google_maps_shortcode'); ?>

		<?php echo do_shortcode($map); ?>
	</div>
<?php endif; ?>

<div id="page">
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="content">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
				<div class="page-content">
					<?php if(!$post->post_content == ''): ?>
						<?php the_content(); ?>
					<?php endif; ?>
					<?php if ( get_field('content')):?>
						<?php get_template_part('inc/content'); ?>
					<?php endif; ?>
				</div>
			
			</article>
		</div>
	<?php endwhile; // end of the loop. ?>

</div><!-- #single -->
<?php get_footer(); ?>