<?php 
global $post;

if(!$post->post_parent){
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
}else{
	if($post->ancestors) {
		$post_ancestors = get_post_ancestors($post);
		$ancestors = end($post_ancestors);
		$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_order=DESC");
	}
}
if ($children) { ?>
	<div id="subnav">
		<ul> <?php echo $children; ?></ul>
	</div>
<?php } ?>