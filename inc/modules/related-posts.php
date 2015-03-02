
<?php   

global $post;

$args = array();    
$tags = wp_get_post_tags($post->ID);


if (!empty($tags)) {  

    $tag_ids = array();  
    foreach($tags as $individual_tag) {
        $tag_ids[] = $individual_tag->term_id;
    }
}

if(isset($tag_ids)){
    $args = array(  
        'post_type' => array('post'),
        'tag__in' => $tag_ids,  
        'post__not_in' => array($post->ID),  
        'showposts' => 3,  // Number of related posts that will be shown.
        'ignore_sticky_posts'=>1  
    );
}

$query = new WP_Query($args);
if ( $query->have_posts() ) : ?>
<div id="related-posts" class="related-posts">
    <div class="container inner">
        <div class="widget-header">
            <h4 class="widget-title"><?php _e("You Might Also Like", THEME_NAME); ?></h4>
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php _e("See all archive &raquo;", THEME_NAME) ?></a>
        </div>
        <ul class="posts clearfix">
            <?php  while ( $query->have_posts() ) : $query->the_post();  ?>
            <?php 
                $author_id = get_the_author_meta('ID');
                $category = get_post_category();    
                $sub_category = get_post_sub_category();
                if( !$sub_category ) $sub_category = $category;
            ?>      
            <li>
                <?php
                include_module('post-top-category', array(
                    'name' => $category->name
                ));
                ?>
                <?php include_module('post-item', array(
                    'title' => get_the_title(),
                    'excerpt' => get_excerpt(50),
                    'url' => get_permalink(),
                    'image_url' => get_post_thumbnail_src(array('width' => 320, 'height' => 320)),
                    'date' => get_the_date(),
                    'author' => array(
                        'name' => 'Words by ' .get_the_author(),
                        'image_url' => get_avatar_url ($author_id, 40 ),
                        'url' => get_author_posts_url($author_id),
                    ),                          
                    'category' => array(
                        'name' => $sub_category->name,
                    ),
                    'read_more' => true,
                    'class' => 'has-sub-category'
                )); ?>
            </li>
            <?php endwhile; ?>
            <?php 
            wp_reset_query();
            wp_reset_postdata();
            ?>
        </ul>           
    </div>
</div>  
<?php endif; ?>