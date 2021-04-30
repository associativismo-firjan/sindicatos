<?php while ( have_posts() ) : the_post(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php the_title(); ?></title>
</head>
<body style="background:#f2f2f2; margin-top:30px; margin-right:30px; margin-bottom:30px; margin-left:30px;">
<?php
	
	$imagem_destaque = get_field('imagem_destaque_boletim','options');

	$logos = get_field('logos_boletins','options');
		$logo_sindicato = $logos['logo_do_topo_boletim'];
		$logo_firjan = $logos['logo_da_firjan_boletim']['url'];
		$logo_cni = $logos['logo_cni_boletim']['url'];
	
	$cores = get_field('cores_boletim','options');
		$cor_principal = $cores['cor_principal_boletim'];
		$cor_textos = $cores['cor_texto_boletim'];
	
	$endereco = get_field('endereco_boletim','options');
	
?>
	<table cellpadding="0" cellspacing="0" align="center" width="600" style="border-style:solid; border-width:1px; border-color:#f2f2f2; background-color:#fff">
		<tr>
			<td style="padding-left:20px" align="left" width="345">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo $logo_sindicato; ?>" style="border:0">
				</a>
			</td>
			<td style="padding-right:20px" align="right">
				<?php if($logo_firjan): ?>
					<a href="http://www.firjan.com.br">
						<img src="<?php echo $logo_firjan; ?>" style="border:0">
					</a>
				<?php endif; ?>
			</td>		
		</tr>
		<tr>
			<td colspan="2">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo $imagem_destaque; ?>" style="border:0; display:block;">
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="2" height="26px" valign="middle" align="right" bgcolor="<?php echo $cor_principal; ?>" style="padding-right:20px; color:#fff; font-family:'Trebuchet MS', Arial; font-size:13px;">
				<?php the_title(); ?> | <?php the_field('numero'); ?>
			</td>
		</tr>
		<?php
			$i = 0;
			foreach (get_field('selecionar_noticias') as $noticias):
		?>
			<?php if($i > 0): ?>
				<tr>
					<td colspan="2" style="padding-top:30px">
						<img src="<?php echo get_template_directory_uri(); ?>/images/divisoria.jpg" style="display:block; border:0; width:100%; height:auto;">
					</td>
				</tr>
			<?php endif; ?>
			<tr>
				<?php
					if (has_post_thumbnail($noticias['noticias']->ID))
					{
						echo '<td style="padding-left:20px; padding-top:20px;">';
							echo '<a href="'.$noticias['noticias']->guid.'">';
								echo '<img src="'.wp_get_attachment_image_src( get_post_thumbnail_id($noticias['noticias']->ID),'medium')[0].'" style="display:block; border:0; width:345px; height:auto">';
							echo '</a>';
						echo '</td>';
						echo '<td style="padding-left:20px; padding-right:20px;">';
							echo '<a href="'.$noticias['noticias']->guid.'" style="text-decoration:none">';
								echo '<h1 style="color:'.$cor_principal.'; font-family:\'Trebuchet MS\', Arial; font-size:20px; line-height:26px; text-transform:uppercase; padding-bottom:10px; text-decoration:none">';
									echo $noticias['noticias']->post_title;
								echo '</h1>';
							echo '</a>';
							echo '<a href="'.$noticias['noticias']->guid.'" style="color:'.$cor_principal.'; font-family:\'Trebuchet MS\', Arial; font-size:14px; font-weight:bold;">Leia Mais</a>';
						echo '</td>';
					}
					else
					{
						echo '<td colspan="2" valign="top" style="padding-left:20px; padding-right:20px; padding-top:20px;">';
							echo '<a href="'.$noticias['noticias']->guid.'" style="text-decoration:none">';
								echo '<h1 style="color:'.$cor_principal.'; font-family:\'Trebuchet MS\', Arial; font-size:20px; line-height:26px; text-transform:uppercase; padding-bottom:10px; text-decoration:none">';
									echo $noticias['noticias']->post_title;
								echo '</h1>';
								if($i > 0)
								{
									echo '<p style="color:'.$cor_textos.'; font-family:\'Trebuchet MS\', Arial; font-size:14px; line-height:18px; padding-bottom:10px;">'.texto_limite(removeHTMLtags($noticias['noticias']->post_content),240).'</p>';
								}
							echo '</a>';
							echo '<a href="'.$noticias['noticias']->guid.'" style="color:'.$cor_principal.'; font-family:\'Trebuchet MS\', Arial; font-size:14px; font-weight:bold;">Leia Mais</a>';
						echo '</td>';
					}
				?>
			</tr>
		<?php
				$i++;
			endforeach;
		?>
		<tr><td height="60" colspan="2"></td></tr>
		<tr>
			<td height="60" valign="middle" bgcolor="<?php echo $cor_principal; ?>" style="padding-left:20px;">
				<p style="color:#ffffff; font-family:'Trebuchet MS', Arial; font-size:12px; line-height:16px;">
					<?php echo $endereco; ?>
				</p>
			</td>
			<td height="60" valign="middle" align="right" bgcolor="<?php echo $cor_principal; ?>" style="padding-right:20px;">
				<a href="http://www.portaldaindustria.com.br/cni/">
					<img src="<?php echo $logo_cni; ?>" style="border:0">
				</a>
			</td>
		</tr>
	</table>
</body>
</html>
<?php endwhile; ?>