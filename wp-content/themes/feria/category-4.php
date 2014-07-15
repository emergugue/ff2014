<?php get_header(); ?>

<div id="content" class="clearfix row-fluid">
  <div id="main" class="span8 clearfix" role="main">
    <div class="page-header">
      <?php if (is_category()) { ?>
      <?php if(qtrans_getLanguage() == 'es'): ?>
      <ul class="breadcrumb">
        <li class="home"><a href="<?php echo home_url(); ?>">Home</a></li>
        <li class="active">
          <?php single_cat_title(); ?>
        </li>
      </ul>
      <?php else: ?>
      <ul class="breadcrumb">
        <li class="home"><a href="<?php echo home_url(); ?>/en/">Home</a></li>
        <li class="active">
          <?php single_cat_title(); ?>
        </li>
      </ul>
      <?php endif; ?>
      <?php } ?>
    </div>
    <div class="contenido-texto">
     <?php if(qtrans_getLanguage() == 'es'): ?>

      <p>Este año podrás acceder a la programación de la Feria de las Flores mucho más fácil: simplemente selecciona el día y la jornada (mañana, tarde o noche) en la que deseas conocer la programación. </p><p>Los eventos destacados con estrella, son las actividades principales para este año. </p>
      <p>Además, también podrás descargar el PDF con toda la programación oficial de la Feria de las Flores 2014 en el siguiente enlace.</p>

      <?php else: ?>

        <p>Mera vuelta traducir eso </p><p> ... </p>

       <?php endif; ?>

    </div>
    <div class="descargarProgramacion"> 
    <a href="<?php bloginfo('template_directory'); ?>/descargables/Programacion.pdf" class="btn" target="_blank">
    <?php if(qtrans_getLanguage() == 'es'): ?>Descarga aquí la programación completa en PDF
    <?php else: ?>Download PDF schedule here
    <?php endif; ?>
    
    </a> &nbsp; &nbsp; 
    </div>
    <!-- cierra .descargarProgramacion --> 
    
    <div class="clearfix row-fluid">
      <div class="span12 calendario"></div>
    </div>
    <!-- cierra .row-fluid -->
    
    <div>
      <section id="options" class="clearfix">
        <ul id="filters" class="option-set clearfix" data-option-key="filter">
          <li class="span3"><a href="#filter" data-option-value="*" class="selected">
          <?php if(qtrans_getLanguage() == 'es'): ?>
              Todos
           <?php else: ?>
              All
          <?php endif; ?>
            </a></li>
          <li class="span3"><a href="#filter" data-option-value=".manana"> <?php if(qtrans_getLanguage() == 'es'): ?>
              Mañana
           <?php else: ?>
              Morning
          <?php endif; ?>
            </a></li>
          <li class="span3"><a href="#filter" data-option-value=".tarde"> <?php if(qtrans_getLanguage() == 'es'): ?>
              Tarde
           <?php else: ?>
              Afternoon
          <?php endif; ?>
            </a></li>
          <li class="span3"><a href="#filter" data-option-value=".noche"> <?php if(qtrans_getLanguage() == 'es'): ?>
              Noche
           <?php else: ?>
              Night
          <?php endif; ?>
            </a></li>
        </ul>
      </section>
      <!-- #options -->
      <center id="loading" style="display:none;">
        <img src="<?php bloginfo('template_directory'); ?>/images/ajax-loader.gif"/>
      </center>
      <div id="container" class="clearfix">
        <?php
  $fechaHoy = date("j/n/Y");
  
  $myQuery = new WP_Query(array(
       'cat' => 10,
       'posts_per_page' => -1,
       'tag'=>'destacado',
  ));
  // The Loop
  if ( $myQuery->have_posts() ):
  while ( $myQuery->have_posts() ) : $myQuery->the_post();
    $fechaSeleccionada = str_replace('/', '-', $fechaHoy);
    $fechaSeleccionada = strtotime($fechaSeleccionada);
    $fechaInicio  = str_replace('/', '-', get_post_meta($post->ID,'fecha_inicio',true));
    $fechaInicio  = strtotime($fechaInicio);
    $fechaFin     = str_replace('/', '-', get_post_meta($post->ID,'fecha_fin',true));
    $fechaFin     = strtotime($fechaFin);

    $horaInicio = get_post_meta($post->ID,'hora_inicio',true);
    $horaFin    = get_post_meta($post->ID,'hora_fin',true);
    $jornada    = get_post_meta($post->ID,'jornada',true);
    $lugar      = get_post_meta($post->ID,'lugar',true);
    $telefono   = get_post_meta($post->ID,'telefono',true);
    $precio     = get_post_meta($post->ID,'precio',true);

    $jornadas = explode(',', $jornada);
    $humanHoraInicio = date("g:i a", strtotime($horaInicio));
    if(trim($horaFin) === ""){
      $tieneHoraFin = false;
    }
    else{
      $tieneHoraFin = true;
      $humanHoraFin = date("g:i a", strtotime($horaFin));
    }

    $class = "";

    foreach ($jornadas as $j) {
      $class .= trim($j) . " ";
    }
    ?>
    <?php if($fechaSeleccionada >= $fechaInicio AND $fechaSeleccionada <= $fechaFin): ?>
      <?php
      $evento_class = '';
      $posttags = get_the_tags();
      if ($posttags) {
       foreach($posttags as $tag) {
        $evento_class .= strtolower($tag->name).' '; 
      }
    } ?>
    <a href="<?php the_permalink(); ?>">
      <div class="element <?php echo $class.' '.$evento_class ?>">
        <h2>
          <?php the_title(); ?>
        </h2>
        <ul>
          <li><i class="icon-time"></i> <strong> Hora:</strong> <?php echo $humanHoraInicio ?> <?php echo ($tieneHoraFin) ? " a $humanHoraFin" : "" ?></li>
          <li><i class="icon-map-marker"></i> <strong>Lugar:</strong> <?php echo $lugar ?></li>
          <li><i class="icon-star"></i> <strong>Teléfono:</strong> <?php echo $telefono ?></li>
        </ul>
      </div>
    </a>
    <?php endif;
    endwhile;
  endif;

  // Reset Query
  wp_reset_query();

    $myQuery = new WP_Query(array(
       'cat' => 10,
       'posts_per_page' => -1,
  ));
  // The Loop
  if ( $myQuery->have_posts() ):
  while ( $myQuery->have_posts() ) : $myQuery->the_post();
    $fechaSeleccionada = str_replace('/', '-', $fechaHoy);
    $fechaSeleccionada = strtotime($fechaSeleccionada);
    $fechaInicio = str_replace('/', '-', get_post_meta($post->ID,'fecha_inicio',true));
    $fechaInicio = strtotime($fechaInicio);
    $fechaFin = str_replace('/', '-', get_post_meta($post->ID,'fecha_fin',true));
    $fechaFin = strtotime($fechaFin);

    $horaInicio = get_post_meta($post->ID,'hora_inicio',true);
    $horaFin = get_post_meta($post->ID,'hora_fin',true);
    $jornada = get_post_meta($post->ID,'jornada',true);
    $lugar = get_post_meta($post->ID,'lugar',true);
    $telefono = get_post_meta($post->ID,'telefono',true);
    $precio   = get_post_meta($post->ID,'precio',true);

    $jornadas = explode(',', $jornada);
    $humanHoraInicio = date("g:i a", strtotime($horaInicio));
    if(trim($horaFin) === ""){
      $tieneHoraFin = false;
    }
    else{
      $tieneHoraFin = true;
      $humanHoraFin = date("g:i a", strtotime($horaFin));
    }

    $class = "";

    foreach ($jornadas as $j) {
      $class .= trim($j) . " ";
    }
    ?>
    <?php if($fechaSeleccionada >= $fechaInicio AND $fechaSeleccionada <= $fechaFin): ?>
      <?php
      $evento_class = '';
      $posttags = get_the_tags();
      if ($posttags) {
       foreach($posttags as $tag) {
        $evento_class .= strtolower($tag->name).' '; 
      }
    }
      if( empty( $evento_class ) ): ?>
    <a href="<?php the_permalink(); ?>">
      <div class="element <?php echo $class.' '.$evento_class ?>">
        <h2>
          <?php the_title(); ?>
        </h2>
        <ul>
          <li><i class="icon-time"></i> <strong> Hora:</strong> <?php echo $humanHoraInicio ?> <?php echo ($tieneHoraFin) ? " a $humanHoraFin" : "" ?></li>
          <li><i class="icon-map-marker"></i> <strong>Lugar:</strong> <?php echo $lugar ?></li>
          <li><i class="icon-star"></i> <strong>Teléfono:</strong> <?php echo $telefono ?></li>
        </ul>
      </div>
    </a>
      <?php endif;
     endif;
    endwhile;
  endif;

  // Reset Query
  wp_reset_query();
  ?>
      </div>
      <!-- #container --> 
      
    </div>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->
</div>
<!-- end #container -->

<?php get_footer(); ?>
