<?php
	$object = get_field('header_image');
	$header_src = $object['url'];
	$width = $object['width'];
	$height = $object['height'];

?>

<?php if(get_field('header_image')): ?>
	<div class="parallax-window" data-speed="0.5" data-positionX="bottom" data-parallax="scroll" data-image-src="<?php echo $header_src; ?>" data-naturalWidth-"<?php echo $width; ?>" data-naturalHeight="<?php echo $height; ?>" data-ios-fix="true" data-android-fix="true"></div>
<?php endif; ?>