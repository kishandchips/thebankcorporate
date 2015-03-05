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
		<div class="inner container">
			<div class="legal">
				<span><?php _e('Legal', THEME_NAME); ?></span>
				<span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name' ); ?> </span> 
				<span><?php _e('All rights Reserved'); ?></span>

			</div>		
			<div class="address">
				<span>The Bank</span>
				<span>16–18 Berners Street</span>
				<span>London</span>
				<span>W1T 3LN</span>		
			</div>
			<div class="contact">
				<span>T  +44 (0) 207 612 8000</span>
				<span>E  reception@thebank.co.uk</span>
			</div>					
		</div>

	</footer><!-- #footer .site-footer -->
</div><!-- #wrap -->

<?php wp_footer(); ?>
</body>
</html>