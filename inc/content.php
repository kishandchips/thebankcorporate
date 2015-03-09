<?php 
/********************************
 * Regular Content
********************************/
 ?>

<?php $id = (isset($id)) ? $id : $post->ID; ?>
<?php $i = 0; ?>
<?php if(get_field('content', $id)): ?>
<?php while (has_sub_field('content', $id)) : ?>
	<?php
		$layout = get_row_layout();
		switch($layout){

			case 'row':	
				if(get_sub_field('columns')): ?>
							
					<div class="row" style="<?php if (get_sub_field('background_color')): ?>background-color: <?php the_sub_field('background_color'); ?>; <?php endif; ?><?php if (get_sub_field('background_image')): ?>background-image: url('<?php the_sub_field('background_image'); ?>');<?php endif; ?>
						">
						<div class="inner container" style="<?php if (get_sub_field('custom_css')): ?><?php the_sub_field('custom_css'); ?>; <?php endif; ?>">
						
						<?php $total_columns = count( get_sub_field('columns', $id)); ?>

						<?php while (has_sub_field('columns', $id)) : ?>
							<?php
							switch($total_columns){
								case 2:
									$class = 'five';
									break;
								case 3:
									$class = 'one-third';
									break;
								case 4:
									$class = 'one-fourth';
									break;
								case 5:
									$class = 'one-fifth';
									break;
								case 6:
									$class = 'one-sixth';
									break;
								case 1:
								default:
									$class = 'ten';
									break;
							} ?>
							<div class="break-on-tablet span <?php if (get_sub_field('column_width')):?><?php the_sub_field('column_width'); ?><?php else: ?><?php echo $class; ?><?php endif; ?><?php if(get_sub_field('textbox_only')): ?> textblock<?php endif; ?>" style="
							<?php if (get_sub_field('text_color')):?>color: <?php the_sub_field('text_color'); ?>;<?php endif; ?>
							">
								<?php the_sub_field('column_content'); ?>
							</div>
						<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>
			<?php
			break;
			case 'family':

				if(get_sub_field('choose_family_members')): ?>

					<?php $posts = get_sub_field('choose_family_members'); ?>

					<div class="row family">
						<div class="container">
						    <h2 class="section-title"><?php the_sub_field('section_title'); ?></h2>
						    <ul class="family">
						    <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
						        <?php 
						            $image_size = array('width' => 278, 'height' => 328);
						            $image_src = get_image(get_post_thumbnail_id($p->ID), $image_size);
						        ?>
						        <li>
									<img src="<?php echo $image_src; ?>" />
									<div class="post-title">
										<h2><?php echo get_the_title( $p->ID); ?></h2>
										<p><?php the_field('role', $p->ID); ?></p>
									</div>
						        </li>           
						    <?php endforeach; ?>
						    </ul>
					    </div>
					</div>
				<?php endif; ?>
			<?php 
			break;
			case 'thumbnail_grid':
				$images = get_sub_field('gallery'); ?>

				<?php if( $images ): ?>
					<div class="row thumb-grid">
						<div class="container inner">	
							<h2 class="section-title"><?php the_sub_field('section_title'); ?></h2>				
						    <ul>
						        <?php foreach( $images as $image ): ?>
						        	<?php 
							            $image_size = array('width' => 200, 'height' => 125);
							            $image_src = get_image($image["id"], $image_size);				        	
						        	 ?>
						            <li>
				                     	<img src="<?php echo $image_src; ?>" alt="<?php echo $image['alt']; ?>" />
						            </li>
						        <?php endforeach; ?>
						    </ul>
					    </div>
				    </div>
				<?php endif; ?>			

			<?php } ?>

	<?php $i++; ?>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
