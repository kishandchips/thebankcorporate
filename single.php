<?php get_header(); ?>

<?php include_module('parallax-header'); ?>

<div id="single">

	<?php while ( have_posts() ) : the_post(); ?>


		<div id="content">
			<div class="inner container">
				<?php 
					$classes = 'textblock';
				 ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

				<?php if(!$post->post_content == ''): ?>
					<div class="post-header">
						<h1 class="post-title"><?php the_title(); ?></h1>
						<span class="subtitle"></span>
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
	<div id="back">
		<?php
			$news_id = get_field('news_page', 'options')->ID; 
		?>

		<a class="primary-btn back-btn" href="<?php echo get_permalink( $news_id ); ?>">Back to News</a>
	</div>	
</div><!-- #single -->
<?php include_module('related-posts'); ?>

<?php get_footer(); ?>
