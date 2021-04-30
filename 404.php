<?php get_header(); ?>
<main class="container" role="main">
	<div class="row">
		<div id="wrapContent" class="col-xs-12 col-xl-12 col-sm-8 col-lg-9">
			<article id="page" class="internas col-xs-12">
				<div class="header">
					<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyseventeen' ); ?></h1>
				</div>
				<div class="conteudo">
					<div class="notFound">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyseventeen' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				</div>
			</article>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();