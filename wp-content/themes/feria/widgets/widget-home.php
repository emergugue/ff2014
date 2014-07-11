<?php
  setlocale(LC_ALL, 'es_ES.UTF8');
  class WidgetHome extends WP_Widget 
   {
  
	  private $hoy;
	  private $manana;
  
	  function WidgetHome(){
		  $this->hoy = strtotime(date('d/m/Y'));
		  $this->manana = strtotime(date('d/m/Y').' +1 day');
		  parent::__construct( false, 'Widget Home', array('description'=>'Este widget muestra los eventos de la feria del día.'));
	  }
  
	  function widget( $args, $instance ){
		  $this->mostrarHome($args, $instance);
	  }
  
	  function update( $new_instance, $old_instance ){
		  return $new_instance;
	  }
 
	  function mostrarHome($args, $instance){
		  extract($args);																					
		  /* Se muestra el título del widget */
		  echo $before_widget;
      $i        = 0;
      $g        = 1;
      $default  = 'active item';
		  ?>
      <div id="widget-hoy" class="span12" >
        <article id="art-hoy">
          <header class="row-fluid">
            <div class="encabezado span10">
              <h1>Hoy en la Feria</h1>
            </div>
            <div class="btn-programacion span2 hidden-phone">
              <span> <a href="/ff2014/programacion/" >Ver todos los eventos </a> </span>
            </div>
          </header>
          <section id="myCarouselHome" class="carousel slide">
            <div class="carousel-inner">
            <?php 

              $args = array('cat'=>'10', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => '-1' ) ;
              $query = new WP_Query( $args );

              if ($query->have_posts()) :
                while ($query->have_posts() ) : $query->the_post();

                  $post_thumbnail_id  = get_post_thumbnail_id(get_the_ID(), 'thumbnail');
                  $get_post_t         = get_the_post_thumbnail($page->ID, 'thumbnail');
                  if( !empty($get_post_t ) )
                  {
                    $post_thumbnail     =  $get_post_t;
                  }
                  else
                  {
                    $post_thumbnail = '<img height="150" src="'.get_template_directory_uri().'/images/tumb-generico'.$g.'.jpg'.'" >';
                    $g = $g + 1 ;

                    if($g >= 3 )
                    {
                      $g = 1;
                    }
                  }

                  //$post_thumbnail     = (!empty($get_post_t ) ) ? get_the_post_thumbnail($page->ID, 'thumbnail')  : '<img height="150" src="'.get_template_directory_uri().'/images/tumb-generico.jpg'.'" >' ;
                  $fechaInicio       = get_post_meta(get_the_ID(),'fecha_inicio',true);
                  $fechaInicio       = strtotime($fechaInicio);
                  $fechaFin          = get_post_meta($post->ID,'fecha_fin',true);
                  $fechaFin          = strtotime($fechaFin);

                  $horaInicio        = get_post_meta(get_the_ID(),'hora_inicio',true);
                  $horaFin           = get_post_meta(get_the_ID(),'hora_fin',true);
                  $jornada           = get_post_meta(get_the_ID(),'jornada',true);
                  $lugar             = get_post_meta(get_the_ID(),'lugar',true);
                  $telefono          = get_post_meta(get_the_ID(),'telefono',true);

                  if( $fechaInicio == $this->hoy ): 
                      ?>
                    <?php 
                     $i = ( $i + 1 );
                    if($i == 1) 
                    {
                      echo '<div class="'.$default.'"> ';
                      $default = 'item';
                    }
                    ?>
                      <a href="<?php the_permalink() ?>" alt="<?php the_title_attribute(); ?>" >
                        <div id="post-<?php echo get_the_ID(); ?>" class="element span4" >
                          <div class="thumb">
                            <?php echo $post_thumbnail; ?>
                           <!-- <img alt="<?php the_title(); ?>" src="<?php echo $post_thumbnail_url ?>"  >  -->
                          </div>
                          <h2><?php the_title(); ?></h2>
                        </div>
                      </a>
                    <?php

                      if($i == 3 )
                      {
                        $i = 0;
                        echo '</div>';
                      }


                  endif;
                endwhile;

                if( $i < 3 && $i >= 1 )
                {
                  echo '</div>';
                } 
             endif;
            ?>
            </div>
            <a class="carousel-control left" href="#myCarouselHome" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarouselHome" data-slide="next">&rsaquo;</a>
          </section>
        </article>
      </div>
    <?php 
		  echo $after_widget;
	  }
  }