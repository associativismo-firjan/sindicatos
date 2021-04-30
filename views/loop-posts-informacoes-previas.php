<li class="publicacoes">
	<h3>
		<a href="<?php the_field('upload_pdf'); ?>" target="_blank">
			<?php the_title(); ?>
		</a>
	</h3>
	<time datetime="<?php echo get_the_date('Y/m/d g:i'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
	<div style="padding-top:30px">
		<a href="<?php the_field('upload_pdf'); ?>" class="seeAll" target="_blank">Ver Prévia</a>
	</div>
</li>