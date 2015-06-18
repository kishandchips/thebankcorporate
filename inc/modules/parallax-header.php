<?php
	$object = get_field('header_image');
	$header_src = ( !empty($object['url']) ) ? $object['url'] : null;
	$width = ( !empty($object['width']) ) ? $object['width'] : null;
	$height = ( !empty($object['height']) ) ? $object['height'] : null;
?>

<?php if(get_field('header_image')): ?>
	<div class="parallax-window" data-speed="0.5" data-positionX="bottom" data-parallax="scroll" data-image-src="<?php echo $header_src; ?>" data-naturalWidth-"<?php echo $width; ?>" data-naturalHeight="<?php echo $height; ?>" data-ios-fix="true" data-android-fix="true"></div>
<?php endif; ?>