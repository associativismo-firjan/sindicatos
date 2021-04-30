<?php get_header(); ?>
<?php
  $args = array(
    'page_id' => 1490
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
						<time class="col-xs-12 col-md-8" datetime="<?php echo get_the_date('Y/m/d g:i'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
					</div>
					<div class="col-xs-12">
						<?php the_field('codigo_emebd_do_video'); ?>
						<?php the_content(); ?>
					</div>
					<div class="col-xs-12 addthisShare">
						<div class="addthis_inline_share_toolbox"></div>
					</div>
				</article>
			</div>
		</div>
	</section>
<?php endwhile; ?>
<?php include 'includes/newsletter.php'; ?>
<?php include 'includes/beneficios.php'; ?>
<?php get_footer();
