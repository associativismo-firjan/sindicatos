<?php get_header(); ?>
<div id="webdoorInternas" style="background-image:url(<?php echo get_template_directory_uri().'/images/top-banner-busca.jpg'; ?>);">
	<div class="grid">
		<div class="gradiente">
			<div class="container">
				<div class="row">
					<h2 class="col-xs-12">Resultado da Busca</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<section id="contentInternas">
	<div class="container">
		<div class="row">
			<article class="listPostsTemplate col-xs-12">
				<div class="header">
					<h1 class="col-xs-12 col-md-7 col-lg-9"><?php printf( __( 'Você buscou por: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div>
				<?php if(have_posts()): ?>
					<ul>
						<?php while ( have_posts() ) : the_post(); ?>
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
						<?php	endwhile; ?>
					</ul>
					<div class="wp-paginacao">
						<?php wp_pagenavi(); ?>
					</div>
				<?php	else: ?>
					<div class="notFound col-xs-12">
						<p>Nenhum resultado encontrado com os termos da sua pesquisa. Tente novamente com algumas palavras-chaves diferentes.</p>
						<?php get_search_form(); ?>
					</div>
				<?php	endif; ?>
			</article>
		</div>
	</div>
</section>
<?php include 'includes/newsletter.php'; ?>
<?php include 'includes/beneficios.php'; ?>
<?php get_footer();