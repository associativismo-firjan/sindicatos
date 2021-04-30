<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );	?>
<li class="videos <?php if(!$large_image_url) { echo 'noimage'; } ?>">
	<?php if($large_image_url): ?>
		<div class="col-xs-12 col-xl-3 left">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo $large_image_url[0]; ?>">
			</a>
		</div>
	<?php endif; ?>
	<div class="col-xs-12 col-xl-9 right">
		<h3>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<time datetime="<?php echo get_the_date('Y/m/d g:i'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
		<p>
			<a href="<?php the_permalink(); ?>">
				<?php echo texto_limite(get_the_content(),200); ?>
			</a>
		</p>
		<a href="<?php the_permalink(); ?>" class="seeAll">Assistir</a>
	</div>
</li>