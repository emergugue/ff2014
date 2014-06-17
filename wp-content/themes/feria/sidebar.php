				<div id="sidebar1" class="fluid-sidebar sidebar span4 hidden-phone" role="complementary">
				
					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
                    
                    <?php if ( is_home() ) {?>
    						
                             <span class="prensa">
                      </span>
                                   
                      

                            
							<div class="videoFeria">
                            <div class="tit">
                                 <span class="icono"></span>
                                 <?php if(qtrans_getLanguage() == 'es'): ?>
                                 <span>Video de la feria</span>         
                                 <?php else: ?>
                                 <span>Festival's video</span>  
                                  <?php endif; ?>      
                            </div><!-- cierra .tit -->  
                            
                            <iframe width="300" height="169" src="//www.youtube.com/embed/aam3ce4gpfM" frameborder="0" allowfullscreen></iframe>
                         </div><!-- cierra .videoFeria -->	
					
					<?php } else {?>
                    
                       <span class="prensa">
					   <?php if(qtrans_getLanguage() == 'es'): ?>
                      <a href="<?php echo home_url(); ?>/acreditacion-de-prensa-para-la-feria-de-las-flores-2013/">Clic aquí para acreditación de prensa</a>
                       <?php else: ?>
                      <a href="<?php echo home_url(); ?>/acreditacion-de-prensa-para-la-feria-de-las-flores-2013/">
                      If you are a journalist, please click here.
                      </a>
                       <?php endif; ?> 
                      </span>

                         <div style="display:none" class="hoyFeria">
                            <div class="tit">
                                 <span class="icono"></span>
                                   <?php if(qtrans_getLanguage() == 'es'): ?>
                                   <span>Hoy en la feria</span>         
                                    <?php else: ?>
                                   <span>Today's Events</span> 
                                    <?php endif; ?>
                            </div><!-- cierra .tit -->  
                            
                            <div class="galeriaHoySidebar"></div>
                            <!-- cierra .galeriaHoy --> 
                           
                         </div><!-- cierra .hoyFeria -->
                         
                         <div class="infoTurismo">
                          <?php if(qtrans_getLanguage() == 'es'): ?>
                         <h3>Info turística</h3>
                          <?php else: ?>
                          <h3>For tourists</h3>
                          <?php endif; ?>
                          
<?php if(qtrans_getLanguage() == 'es'): ?>   
                         <ul>
<li><span class="icono1"></span><a href="<?php echo home_url(); ?>/category/infoturistica/">¿Cómo llegar a Medellín?</a></li>
<li><span class="icono2"></span><a href="http://medellin.travel/que-hacer-en-medellin/reuniones/directorio-turistico/hospedaje" target="_blank">¿Dónde quedarme en Medellín?</a></li>
<li><span class="icono3"></span><a href="http://medellin.travel/que-hacer-en-medellin/reuniones/directorio-turistico/restaurantes" target="_blank">¿Dónde comer en Medellín?</a></li>
</ul>

<?php else: ?>
<ul>
<li><span class="icono2"></span><a href="http://medellin.travel/que-hacer-en-medellin/reuniones/directorio-turistico/hospedaje" target="_blank">Where to stay in Medellín?</a></li>
<li><span class="icono1"></span><a href="<?php echo home_url(); ?>/en/category/infoturistica/">How do I get Medellín?</a></li>
<li><span class="icono3"></span><a href="http://medellin.travel/que-hacer-en-medellin/reuniones/directorio-turistico/restaurantes" target="_blank">Where to eat in Medellín?</a></li>
</ul>
<?php endif; ?>
</div>
                      <?php }?>	
                     
						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

					<?php endif; ?>

				</div>