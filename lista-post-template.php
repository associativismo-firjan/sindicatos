<?php /* Template Name: Listagem de Posts */ ?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );	?>
	<div id="webdoorInternas" style="background-image:url(<?php echo $large_image_url[0]; ?>);">
		<div class="grid">
			<div class="gradiente">
				<div class="container">
					<div class="row">
						<h2 class="col-xs-12"><?php the_title(); ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section id="contentInternas">
		<div class="container">
			<div class="row">
				<article class="post description col-xs-12">
					<?php the_content(); ?>
				</article>
				<article class="listPostsTemplate col-xs-12">
					<ul>
						<?php
							$postType = get_field('informa_o_post_type');
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
								'post_type' => $postType,
								'paged' => get_query_var('paged') ? get_query_var('paged') : 1
							);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
								if($postType == 'post_publicacoes')
								{
            			include 'views/loop-posts-publicacoes.php';
								}
								elseif($postType == 'post_boletins')
								{
            			include 'views/loop-posts-boletins.php';
								}
								elseif($postType == 'post_videos')
								{
            			include 'views/loop-posts-videos.php';
								}
								elseif($postType == 'post_fotos')
								{
            			include 'views/loop-posts-fotos.php';
								}
								elseif($postType == 'post_cursos')
								{
            			include 'views/loop-posts-cursos.php';
								}
								elseif($postType == 'post_eventos')
								{
            			include 'views/loop-posts-eventos.php';
								}
								elseif($postType == 'post_estatistico')
								{
            			include 'views/loop-posts-boletim-estatico.php';
								}
								elseif($postType == 'post_previa')
								{
            			include 'views/loop-posts-informacoes-previas.php';
								}
								else
								{
            			include 'views/loop-posts-default.php';
								}
							endwhile;
							wp_reset_query();
						?>
					</ul>
					<?php if($loop->max_num_pages > 1): ?>
						<div class="wp-paginacao">
							<?php wp_pagenavi( array( 'query' => $loop ) ); ?>
						</div>
					<?php endif; ?>
				</article>
				<div class="col-xs-12 addthisShare">
					<div class="addthis_inline_share_toolbox"></div>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; ?>
<?php include 'includes/newsletter.php'; ?>
<?php include 'includes/beneficios.php'; ?>













<main class="container" role="main">
	<div class="row">
		<?php
			// while ( have_posts() ) : the_post();
			// 	if(get_field('informa_o_post_type') == 'post_publicacoes')
			// 	{
			// 		get_template_part('pages/page','list-post-publicacoes');
			// 	}
			// 	else if(get_field('informa_o_post_type') == 'post_videos')
			// 	{
			// 		get_template_part('pages/page','page-list-post-videos');
			// 	}
			// 	else
			// 	{
			// 		get_template_part('pages/page','list-post-posts');
			// 	}
			// endwhile;
		?>
	</div>
</main>
<?php get_footer();