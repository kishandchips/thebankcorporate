
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

        <li >
            <a href="<?php echo get_permalink($id); ?>" class="work-item overlay-btn-white">
                <img src="<?php echo $image_src; ?>" alt="<?php echo get_the_title(); ?>"/>
                <figcaption>
                    <div>
                        <h2><?php echo get_the_title($id); ?></h2>
                        <p><?php the_field('subtitle', $id); ?></p>
                        <span class="icon icon-right"></span>
                    </div>
                </figcaption>           
            </a>        
        </li>                
    <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

