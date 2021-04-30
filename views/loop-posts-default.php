<li class="noticias col-xs-12 <?php if(!$large_image_url) { echo 'noimage'; } ?>">
	<h3>
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h3>
	<time datetime="<?php echo get_the_date('Y/m/d g:i'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
	<p>
		<a href="<?php the_permalink(); ?>">
			<?php echo texto_limite(removeHTMLtags(get_the_content()),200); ?>
		</a>
	</p>
</li>