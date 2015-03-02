<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package thebank
 * @since thebank 1.0
 */
?>
	</div><!-- #main .site-main -->
	
	<footer id="footer" class="site-footer" role="contentinfo">
			<div class="copyright">
				&copy; <span><?php echo date('Y'); ?> <?php bloginfo('name' ); ?> </span> 
			</div>						
			<?php _e('16–18 Berners Street, London, W1T 3LN', THEME_NAME); ?>
	</footer><!-- #footer .site-footer -->
</div><!-- #wrap -->

<?php wp_footer(); ?>
</body>
</html>