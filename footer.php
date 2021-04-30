</main>
<footer>
	<div class="widgets">
		<div class="container">
			<div class="row">
				<?php
					foreach (get_field('banners_footer','options') as $banners):
						if($banners['link'])
						{
							$tipoLink = $banners['target'];
							if($tipoLink['value'] == 'externo')
							{
								$target = '_blank';
							}
							else
							{
								$target = '_self';
							}
							echo '<div class="banners col-xs-12 col-sm-4"><a href="'.$banners['link'].'" target="'.$target.'"><img src="'.$banners['banner'].'" alt="Banner"></a></div>';
						}
						else
						{
							echo '<div class="banners col-xs-12 col-sm-4"><img src="'.$banners['banner'].'" alt="Banner"></div>';
						}
					endforeach;
				?>
			</div>
		</div>
	</div>
	<div class="info">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-9 col-md-9">
					<h4><?php the_field('footer_nome_do_sindicato','options'); ?></h4>
					<address>
						<i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_field('footer_endereco','options'); ?>
					</address>
					<a class="tel" href="tel:<?php the_field('footer_telefones','options'); ?>">
						<span>
							<i class="fa fa-phone" aria-hidden="true"></i> <?php the_field('footer_telefones','options'); ?>
						</span>
					</a>
					<a class="email" href="mailto:<?php the_field('footer_email','options'); ?>">
						<span>
							<i class="fa fa-envelope" aria-hidden="true"></i> <?php the_field('footer_email','options'); ?>
						</span>
					</a>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 cni">
					<a href="<?php the_field('afiliacao_link','options') ?>" target="_blank" title="Ír para o site do CNI">
						<img src="<?php the_field('afiliacao_logo','options') ?>" alt="Logo CNI">
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="rodape">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4">
					<p><?php the_field('inserir_informacao_copyright','options'); ?></p>
				</div>
				<?php		
					$assinatura = get_field('assinatura_gm5','options');
					if($assinatura[0] == 'sim'):
				?>
					<div class="col-xs-12 col-sm-12 col-md-4 social">	
						<?php if(get_field('status-social-header','options') == 1): ?>
							<ul>
								<?php
									foreach (get_field('adicionar_redes_header','options') as $social):
										if($social['status'] == 1):
								?>
									<li>
										<a href="<?php echo $social['link']; ?>" title="Acessar nossa rede <?php echo $social['nome']; ?>" target="_blank">
											<i class="fa <?php echo $social['icone']; ?>" aria-hidden="true"></i>
										</a>
									</li>
								<?php
										endif;
									endforeach;
								?>
							</ul>
						<?php endif; ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4">
						<a href="http://www.gm5.com.br" target="_blank">Desenvolvido por GM5 Tecnologia</a>
					</div>
				<?php else: ?>
					<?php if(get_field('status-social-header','options') == 1): ?>
						<div class="col-xs-8 col-xl-9 col-sm-9 col-md-10 col-lg-4 social pull-right">	
							<ul>
								<?php
									foreach (get_field('adicionar_redes_header','options') as $social):
										if($social['status'] == 1):
								?>
									<li>
										<a href="<?php echo $social['link']; ?>" title="Acessar nossa rede <?php echo $social['nome']; ?>" target="_blank">
											<i class="fa <?php echo $social['icone']; ?>" aria-hidden="true"></i>
										</a>
									</li>
								<?php
										endif;
									endforeach;
								?>
							</ul>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>	
		</div>
	</div>
</footer>
<script src="<?php echo get_template_directory_uri().'/'; ?>js/scripts.js"></script>
<script src="<?php echo get_template_directory_uri().'/'; ?>js/swiper.min.js"></script>
<script src="<?php echo get_template_directory_uri().'/'; ?>js/jquery.maskedinput.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATM0IF_seTL3DxQ6jKzXCKq-KAlR2HyrY&sensor=false"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-596186899f934c09"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php wp_footer(); ?>
<!--
<script type="text/javascript">
	alert($(window).width())
</script>
-->
</body>
</html>