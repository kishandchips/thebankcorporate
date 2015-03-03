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
					<div class="break-on-tablet span <?php if (get_sub_field('column_width')):?><?php the_sub_field('column_width'); ?><?php else: ?><?php echo $class; ?><?php endif; ?>" style="
					<?php if (get_sub_field('text_color')):?>color: <?php the_sub_field('text_color'); ?>;<?php endif; ?>
					">
						<?php the_sub_field('column_content'); ?>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
		
		
	<?php } ?>

<?php $i++; ?>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
