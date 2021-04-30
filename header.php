<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta property="og:locale" content="pt_BR">
<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
<meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:description" content="<?php the_field('texto_complementar','options'); ?>">
<meta property="og:image" content="<?php the_field('logo_do_sindicato','options'); ?>">
<meta property="og:image:type" content="image/jpeg">

<script src="https://use.fontawesome.com/335cc799a2.js"></script>
<script src="<?php echo get_template_directory_uri().'/'; ?>js/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header role="banner">
	<div class="wrapHeader">
		<h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Página Inicial">
				<span class="hide"><?php bloginfo( 'name' ); ?></span>
				<img src="<?php the_field('logo_do_sindicato','options'); ?>">
			</a>
		</h1>
		<h2 class="hide"><?php the_field('texto_complementar','options'); ?></h2>
		<div class="logos">
			<?php foreach (get_field('logos_header','options') as $logos): ?>
				<?php if($logos['link']): ?>
					<a href="<?php echo $logos['link']; ?>" title="Visitar site de <?php echo $logos['nome']; ?>" target="_blank">
						<img src="<?php echo $logos['logo']; ?>" alt="Logo de <?php echo $logos['nome']; ?>">
					</a>
				<?php else: ?>
					<img src="<?php echo $logos['logo']; ?>" alt="Logo de <?php echo $logos['nome']; ?>">
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<nav>
			<div class="mobileWrap">
				<?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_id' => 'top-menu',) ); ?>
			</div>
			<div class="hidden-lg visible-sm-block visible-xs-block col-xs-8 col-sm-9 blockBusca">
				<?php include('searchform.php'); ?>
			</div>
			<div class="actions col-xs-4 col-sm-3">
				<a href="#" class="open activated">Menu <i class="fa fa-bars"></i></a>
				<a href="#" class="close">Menu <i class="fa fa-close"></i></a>
			</div>
		</nav>
	</div>
</header>
<main role="main">