
<?php 

$posts = get_field('related');

if( $posts ): ?>
<div id="related">
    <h2 class="section-title"><?php _e('Related News'); ?></h2>
    <ul class="posts">
    <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
        <?php 
            $id = $p->ID;
            $image_size = array('width' => 370, 'height' => 250);
            $image_src = get_image(get_post_thumbnail_id($id), $image_size);
        ?>
        <li>
            <?php include_module('post-item', array(
                'title' => get_the_title( $id ),
                'url' =>  get_permalink( $id ),
                'image_url' => $image_src,
            )); ?>
        </li>           
    <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

