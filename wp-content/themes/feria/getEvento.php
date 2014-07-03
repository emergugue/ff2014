<?php
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

$myQuery = new WP_Query(array(
     'cat' => 10,
     'posts_per_page' => -1,
     'orderby' => 'meta_value', 
     'meta_key' => 'hora_inicio'
));
// The Loop
if ( $myQuery->have_posts() ):
while ( $myQuery->have_posts() ) : $myQuery->the_post();

$fechaSeleccionada = str_replace('/', '-', $_POST['fecha']);
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
    <h2><?php the_title(); ?></h2>  
    <ul>
      <i class="icon-time"></i> <strong> Hora:</strong> <?php echo $humanHoraInicio ?> <?php echo ($tieneHoraFin) ? " a $humanHoraFin" : "" ?></li>
      <li><i class="icon-map-marker"></i> <strong>Lugar:</strong> <?php echo $lugar ?></li>
      <li><i class="icon-star"></i> <strong>Teléfono:</strong> <?php echo $telefono ?></li>
    </ul>
  </div>
  </a>
  <?php endif; ?>
<?php 
endwhile;
endif;

// Reset Query
wp_reset_query();
?>
