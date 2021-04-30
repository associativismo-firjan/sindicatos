<?php get_header(); ?>
<main class="container" role="main">
	<div class="row">
		<div id="wrapContent" class="col-xs-12 col-xl-12 col-sm-8 col-lg-9">
			<article id="page" class="col-xs-12">
				<div class="header">
					<?php the_archive_title( '<h1>', '</h1>' ); ?>
				</div>
				<div class="conteudo">
					<div class="listPostPage">
						<ul>
							<?php while ( have_posts() ) : the_post(); ?>
								<li class="posts">
									<?php
										if(has_post_thumbnail())
										{
											$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
											echo '<div class="imagem"><a href="'.get_the_permalink().'" style="background-image:url('.$large_image_url[0].')"></a></div>';
										}
									?>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<time datetime="<?php echo get_the_date('Y/m/d g:i'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
									<p>
										<a href="<?php echo get_the_permalink(); ?>">
											<?php echo texto_limite(get_field('introducao_ao_conteudo_da_pagina'),400); ?>
										</a>
									</p>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<div class="wp-paginacao">
						<?php wp_pagenavi(); ?>
					</div>
				</div>
			</article>
			<div id="componentes">
				<?php include get_template_directory().'/componentes.php'; ?>
			</div>
			<div class="col-xs-12 addthisShare">
				<div class="addthis_inline_share_toolbox"></div>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();