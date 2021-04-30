<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );	?>
<li class="publicacoes <?php if(!$large_image_url[0]) { echo 'noimage'; } ?>">
	<?php
		if(get_field('url_externa'))
		{
			$url = get_field('url_externa');
			$target = '_blank';
		}
		else
		{
			$url = get_the_permalink();
			$target = '_self';
		}
	?>
	<?php if($large_image_url[0]): ?>
		<a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
			<img src="<?php echo $large_image_url[0]; ?>">
		</a>
	<?php endif; ?>
	<div class="content">
		<h3>
			<a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<time datetime="<?php echo get_the_date('Y/m/d g:i'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
		<?php
			if(get_field('categoria'))
			{
				if(get_field('categoria') == 'federacao')
				{
					echo '<span>Federação</span>';
				}
				else
				{
					echo '<span>'.get_field('categoria').'</span>';
				}
			}
		?>
	</div>
</li>