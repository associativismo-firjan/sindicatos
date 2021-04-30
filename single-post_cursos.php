<?php get_header(); ?>
<?php
  $args = array(
    'page_id' => 1586
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
						<?php the_content(); ?>
					</div>
				</article>
				<div class="componentes">
					<div class="google_maps">
						<?php $location = get_field('localizacao'); ?>
						<?php if(userAgent($_SERVER['HTTP_USER_AGENT']) == 'desktop'): ?>
							<div class="col-xs-12 col-md-6">
								<h2>Traçar Rota</h2>
								<form id="trajeto" method="post" action="#">
									<fieldset>
										<div class="input">
											 <input type="text" id="txtEnderecoPartida" name="txtEnderecoPartida" placeholder="Digite sua localização">
											 <span>Ex.: "<?php echo $location['address']; ?>".</span>
											 <input type="text" id="txtEnderecoChegada" name="txtEnderecoChegada" value="<?php echo $location['address']; ?>" hidden="hidden">
											 <input type="submit" value="Traçar Rota">
										</div>
									</fieldset>
								</form>
							</div>
							<div class="col-xs-12">
								<div id="map" data-lat="<?php echo $location['lat']; ?>" data-long="<?php echo $location['lng']; ?>"></div>
								<div id="trajeto-texto"></div>
							</div>
						<?php else: ?>
							<div class="col-xs-12 col-md-6">
								<h2>Traçar Rota</h2>
								<form action="http://maps.google.com/maps" method="get" target="_blank" id="maps">
									<fieldset>
										<input type="hidden" name="daddr" value="<?php echo $location['address']; ?>">
										<input type="text" id="saddr" name="saddr" placeholder="Digite sua localização">
										<span>Ex.: "<?php echo $location['address']; ?>".</span>
										<input type="submit" value="Traçar Rota">
									</fieldset>
								</form>
							</div>
							<div class="col-xs-12">
								<div id="map" data-lat="<?php echo $location['lat']; ?>" data-long="<?php echo $location['lng']; ?>"></div>
							</div>
						<?php endif; ?>
					</div>
				</div>
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
