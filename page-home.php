<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
  <div id="webdoor">
    <h2 class="hide">Em Destaque</h2>
    <div class="swiper-container">
      <ul class="swiper-wrapper">
        <?php foreach (get_field('destaques') as $destaques): ?>
          <li class="swiper-slide" style="background-image:url(<?php echo $destaques['imagem']['sizes']['twentyseventeen-featured-image']; ?>);">
            <?php if ($destaques['link']): ?>
              <a href="<?php echo $destaques['link']; ?>" class="linkDestaque">
                <?php if($destaques['titulo'] != '' && $destaques['descricao'] != ''): ?>
                  <div class="bar">
                    <div class="container">
                      <div class="row">
                        <div class="col-xs-12 col-md-10">
                          <h3><?php echo $destaques['titulo']; ?>:</h3>
                          <p><?php echo $destaques['descricao']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              </a>
            <?php else: ?>
              <?php if($destaques['titulo'] != '' && $destaques['descricao'] != ''): ?>
                <div class="bar">
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-12 col-md-10">
                        <h3><?php echo $destaques['titulo']; ?>:</h3>
                        <p><?php echo $destaques['descricao']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach ?>
        </li>
      </ul>
    </div>
    <div class="bullets"></div>
  </div>
  <?php include 'includes/newsletter.php'; ?>
  <section class="contentHome">
    <div class="container">
      <div class="row">
        <div class="header">
          <h2 class="col-xs-12 col-md-7 col-lg-9">Notícias</h2>
          <div class="col-md-5 col-lg-3 busca">
            <?php get_search_form(); ?>
          </div>
        </div>
        <div class="noticias">
          <ul>
            <?php
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4
              );
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post();
            ?>
              <li class="col-xs-12 col-md-3">
                <a href="<?php the_permalink(); ?>">
                  <h3><?php echo texto_limite(get_the_title(),30); ?></h3>
                  <time datetime="<?php echo get_the_date('Y/m/d g:i'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
                  <p>
                    <?php echo texto_limite(removeHTMLtags(get_the_content()),250) ?>
                  </p>
                </a>
              </li>
            <?php 
              endwhile;
              wp_reset_query();
            ?>
          </ul>
          <div class="footer col-xs-12">
            <a href="<?php echo esc_url( home_url( '/noticias' ) ); ?>" class="seeAll">Todas as notícias</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'includes/beneficios.php'; ?>
  <section class="contentHome">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-8 col-lg-8 noPadding">
          <div class="cursos">
            <div class="header">
              <h2>Boletim Estatístico</h2>
            </div>
            <div class="row">
              <ul>
                <?php
                  $args = array(
                    'post_type' => 'post_estatistico',
                    'posts_per_page' => 2
                  );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                  <li class="col-xs-12 col-sm-6">
                    <div class="content">
                      <h3>
                        <?php echo texto_limite(get_field('titulo_principal'),200); ?>            
                      </h3>
                      <span><?php the_title(); ?></span>
                      <a class="linkCurso" href="<?php the_field('upload_pdf'); ?>" target="_blank">Baixar PDF
                      </a>
                    </div>
                  </li>
                <?php 
                  endwhile;
                  wp_reset_query();
                ?>
              </ul>
              <div class="footer col-xs-12">
                <a href="<?php echo esc_url( home_url( '/boletins_estatisticos/' ) ); ?>" class="seeAll">Todos os Boletins</a>
              </div>
            </div>
          </div>
        </div>
        <div class="separador col-xs-12 col-md-1 col-lg-1"> 
          <div class="linha"></div>
        </div>
        <div class="col-xs-12 col-md-3 col-lg-3 busca">
          <div class="calendario bannerLinkBlank banner1" style="padding-top:40px">
            <?php dynamic_sidebar('sidebar-1');  ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; ?>
<?php get_footer();