<?php 
	$title = ( !empty($title) ) ? $title : null;
?>

<div class="post-item <?php echo ( !empty($class)) ? $class : ''; ?>">

	<div class="post-image image">
		<a href="<?php echo $url; ?>" class="image-btn btn">
			<img src="<?php echo $image_url; ?>" />
		</a>
	</div>
	<a href="<?php echo $url; ?>" class="post-title">
		<h2><?php echo $title ?></h2>
		<span class="date">
			<?php echo get_the_date( 'd.m.y' ); ?>
		</span>
	</a>
</div>
