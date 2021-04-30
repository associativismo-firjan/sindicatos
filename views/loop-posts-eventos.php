<li class="cursos">
  <div class="content">
    <h3>
      <?php echo texto_limite(get_the_title(),42); ?>            
    </h3>
    <div class="data">
      <span>Data: <?php echo get_field('data_de_inicio'); ?></span>
      <span>Hora: <?php echo get_field('hora_evento'); ?></span>
    </div>
    <?php $location = get_field('localizacao'); ?>
    <p>
      <?php echo $location['address']; ?>
    </p>
    <a class="linkCurso" href="<?php echo get_the_permalink(); ?>">
      Mais Detalhes
    </a>
  </div>
</li>