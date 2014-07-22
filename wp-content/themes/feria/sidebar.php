				<div id="sidebar1" class="fluid-sidebar sidebar span4 hidden-phone" role="complementary">
				
					
                    
                    <?php if ( is_home() ) {?>
							<div class="videoFeria">
               <a id="descarga-cancion" target="_blank"  href="http://bit.ly/1wVLebc" alt="Descargar">
                  <img src="<?php echo home_url(); ?>/wp-content/themes/feria/images/descarga-flores.jpg" >
               </a>
              </div>
              <div class="viajero-feria">
                <a href="<?php echo home_url(); ?>/viajero-de-las-flores/">
                  <img src="<?php echo home_url(); ?>/wp-content/themes/feria/images/banner-viajero.jpg" alt="Conoce al viajero de las flores" class="viajero-banner">
                </a>
              </div>
					
					<?php } else {?>
                    
                       <span class="prensa">
					   <?php if(qtrans_getLanguage() == 'es'): ?>
                      <a href="<?php echo home_url(); ?>/saladeprensa/acreditacion-de-prensa-para-la-feria-de-las-flores-2014/">Clic aquí para acreditación de prensa</a>
                       <?php else: ?>
                      <a href="<?php echo home_url(); ?>/saladeprensa/acreditacion-de-prensa-para-la-feria-de-las-flores-2014/">
                      If you are a journalist, please click here.
                      </a>
                       <?php endif; ?> 
                      </span>

                        
                         
                         <div class="infoTurismo">
                          <?php if(qtrans_getLanguage() == 'es'): ?>
                         <h3>Info turística</h3>
                          <?php else: ?>
                          <h3>For tourists</h3>
                          <?php endif; ?>
                          
<?php if(qtrans_getLanguage() == 'es'): ?>   
                         <ul>
<li><span class="icono1"></span>
 <!-- <a href="<?php echo home_url(); ?>/category/infoturistica/">¿Cómo llegar a Medellín?</a> -->
    <a href="http://medellin.travel/es/transporte/aerolineas" target="_blank">¿Cómo llegar a Medellín?</a>
  </li>
<li><span class="icono2"></span>
  <!-- <a href="http://medellin.travel/que-hacer-en-medellin/reuniones/directorio-turistico/hospedaje" target="_blank">¿Dónde quedarme en Medellín?</a> -->
   <a href="http://medellin.travel/es/rutas-de-ciudad/compras-" target="_blank">De compras por Medellín</a>
</li>
<li><span class="icono3"></span>
  <!-- <a href="http://medellin.travel/que-hacer-en-medellin/reuniones/directorio-turistico/restaurantes" target="_blank">¿Dónde comer en Medellín?</a> -->
  <a href="http://medellin.travel/es/rutas-de-ciudad/gastronomica" target="_blank">¿Dónde comer en Medellín?</a>
</li>
</ul>

<?php else: ?>
<ul>
<li><span class="icono2"></span>
  <!-- <a href="http://medellin.travel/que-hacer-en-medellin/reuniones/directorio-turistico/hospedaje" target="_blank">Where to stay in Medellín?</a> -->
  <a href="http://medellin.travel/en/city-tours/shopping-tour" target="_blank">Where to shop in Medellin?</a>
  </li>
<li><span class="icono1"></span>
  <!-- <a href="<?php echo home_url(); ?>/en/category/infoturistica/">¿How do I get to Medellín?</a> -->
<a href="http://medellin.travel/en/transportation/airlines" target="_blank">¿How do I get to Medellín? </a> </li>
<li><span class="icono3"></span>
  <!-- <a href="http://medellin.travel/que-hacer-en-medellin/reuniones/directorio-turistico/restaurantes" target="_blank">Where to eat in Medellín?</a>-->
  <a href="http://medellin.travel/en/city-tours/gastronomical-tour" target="_blank">Where to eat in Medellín? </a>
</li>
</ul>
<?php endif; ?>
</div>
                      <?php }?>	
                     
						<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php endif; ?>

				</div>