<?php

if( have_rows('componentes_de_conteudos') ):
	while ( have_rows('componentes_de_conteudos') ) : the_row();
		if(get_row_layout() == 'google_maps' ):
?>
	<div class="google_maps">
		<?php $location = get_sub_field('localizacao_no_mapa'); ?>
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
	<?php
		/*
		echo '<div class="col-xs-12">';
		echo '<pre>';
	  print_r(get_sub_field('adicionar_revistas'));
	  echo '</pre>';
	  echo '</div>';
	  */
	?>
<?php elseif(get_row_layout() == 'upload_de_pdfs' ): ?>
	<ul class="donwloadPDF col-xs-12 col-sm-7">
		<?php foreach (get_sub_field('fazer_upload_de_pdfs') as $pdfs): ?>
			<li class="col-xs-12">
				<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
				<div class="content">
					<strong><?php echo $pdfs['titulo']; ?></strong>
					<a href="<?php echo $pdfs['upload_do_arquivo']; ?>" class="seeAll" target="_blank">Download do PDF</a>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
<?php
		endif;
  endwhile;
endif;
?>