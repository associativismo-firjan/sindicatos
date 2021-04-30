<section id="beneficios" style="background-image:url(<?php the_field('imagem_ilustrativa_de_beneficios_home','options'); ?>);">
	<div class="grid">
		<div class="container">
			<div class="row">
				<h2 class="col-xs-12 col-lg-7"><?php the_field('titulo_beneficios_home','options'); ?></h2>
				<ul>
					<?php foreach (get_field('itens_de_beneficios_home','options') as $beneficios): ?>
						<li class="col-md-3">
							<h3><?php echo $beneficios['titulo']; ?></h3>
							<p><?php echo $beneficios['texto']; ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="footer col-xs-12">
					<a href="<?php echo esc_url( home_url( '/beneficios' ) ); ?>" class="seeAll">Saiba Mais</a>
				</div>
			</div>
		</div>
	</div>
</section>