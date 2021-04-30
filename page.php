<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php if(has_post_thumbnail()): ?>
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
	<?php endif; ?>
	<section id="contentInternas">
		<div class="container">
			<div class="row">
				<article class="post col-xs-12 col-md-12">
					<?php the_content(); ?>
				</article>
				<div class="componentes">
					<?php include('componentes.php'); ?>
				</div>
				<div class="col-xs-12 addthisShare">
					<div class="addthis_inline_share_toolbox"></div>
				</div>
			</div>
		</div>
	</section>
	<?php include 'includes/newsletter.php'; ?>
	<?php include 'includes/beneficios.php'; ?>
<?php	endwhile; ?>
<?php get_footer();