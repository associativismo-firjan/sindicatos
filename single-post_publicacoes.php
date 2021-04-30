<?php get_header(); ?>
<?php
  $args = array(
    'page_id' => 1488
  );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
?>
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
<?php 
  endwhile;
  wp_reset_query();
?>
<?php while (have_posts()) : the_post(); ?>
	<section id="contentInternas">
		<div class="container">
			<div class="row">
				<article class="post single">
					<div class="header">
						<h1 class="col-xs-12 col-md-8"><?php the_title(); ?></h1>
						<time class="col-xs-12" datetime="<?php echo get_the_date('Y/m/d g:i'); ?>">
							<?php echo get_the_date('d/m/Y'); ?>
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
						</time>
					</div>
					<div class="col-xs-12">
						<?php the_content(); ?>
					</div>
				</article>
				<?php if(get_field('selecionar_pdfs')): ?>
					<div class="componentes">
						<ul class="donwloadPDF col-xs-12 col-sm-7">
							<?php foreach (get_field('selecionar_pdfs') as $pdfs): ?>
								<li class="col-xs-12">
									<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
									<div class="content">
										<strong><?php echo $pdfs['titulo_do_pdf']; ?></strong>
										<a href="<?php echo $pdfs['upload_do_arquivo']; ?>" class="seeAll" target="_blank">Download do PDF</a>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
				<div class="col-xs-12 addthisShare">
					<div class="addthis_inline_share_toolbox"></div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
<?php include 'includes/newsletter.php'; ?>
<?php include 'includes/beneficios.php'; ?>
<?php get_footer();
