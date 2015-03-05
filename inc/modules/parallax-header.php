<?php if(get_field('header_image')): ?>
	<div class="parallax-window" data-parallax="scroll" data-image-src="<?php the_field('header_image'); ?>" data-ios-fix="true" data-android-fix="true"></div>
<?php endif; ?>