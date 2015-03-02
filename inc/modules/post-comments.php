<?php if ( comments_open() || get_comments_number() ) : ?>
<div class="post-comments">
	<?php comments_template(); ?>
</div>
<?php endif; ?>