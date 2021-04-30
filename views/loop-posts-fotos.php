<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );	?>
<li class="fotos col-xl-4 col-lg-3">
	<a href="<?php the_permalink(); ?>" style="background-image:url(<?php echo $large_image_url[0]; ?>);" class="imagem">
		<i class="fa fa-plus" aria-hidden="true"></i>
	</a>
	<h3>
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h3>
	<time datetime="<?php echo get_the_date('Y/m/d g:i'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
	<p>
		<a href="<?php the_permalink(); ?>">
			<?php echo texto_limite(get_the_content(),150); ?>
		</a>
	</p>
</li>