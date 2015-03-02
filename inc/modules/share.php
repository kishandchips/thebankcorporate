<div class="share">
	<span class="label"><?php _e("Share", 'iamkoo'); ?></span>
	<?php include_module('share-links', array(
		'title' => $title,
		'url' => $url,
		'image_url' => $image_url,
		'excerpt' => $excerpt
	)); ?>
</div>