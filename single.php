<?php get_header(); ?>
<?php wp_enqueue_script('expander'); ?>
<div id="single" class="container">
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="sidebar-container">

			<div class="sidebar-content">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php 
					$image_size = array('width' => 800, 'height' => 530);
					$image = get_post_thumbnail_src($image_size);
				?>

				<img src="<?php echo $image; ?>" />

				<?php the_title(); ?>

				<?php the_content(); ?>
				


				</article>
	
				<?php include_module('post-navigation'); ?>

				<?php include_module('post-comments'); ?>
		
			</div>
		</div>
	<?php $i++; endwhile; // end of the loop. ?>
	<?php //include_module('related-posts'); ?>
</div><!-- #single -->
<?php include_module('related-posts'); ?>

<?php get_footer(); ?>
