<?php get_header(); ?>

<div id="content" class="clearfix row-fluid">

  <div id="main" class="span8 clearfix" role="main">

   <div class="page-header">
    <?php if (is_category()) { ?>
    <?php if(qtrans_getLanguage() == 'es'): ?>
    <ul class="breadcrumb">
      <li class="home"><a href="<?php echo home_url(); ?>">Home</a></li>
      <li class="active"><?php single_cat_title(); ?></li>
    </ul>
  <?php else: ?>
  <ul class="breadcrumb">
    <li class="home"><a href="<?php echo home_url(); ?>/en/">Home</a></li>
    <li class="active"><?php single_cat_title(); ?></li>
  </ul>                        
<?php endif; ?>  
<?php } ?>
</div>

<span class="prensa">
 <?php if(qtrans_getLanguage() == 'es'): ?>
 <a href="<?php echo home_url(); ?>/acreditacion-de-prensa-para-la-feria-de-las-flores-2013/">Si quieres acreditarte como periodista, haz clic aquí</a>
<?php else: ?>
  <a href="<?php echo home_url(); ?>/acreditacion-de-prensa-para-la-feria-de-las-flores-2013/">
    If you are a journalist, please click here.
  </a>
<?php endif; ?> 
</span>

<div id="novedades">  
 <?php if(qtrans_getLanguage() == 'es'): ?>
 <div class="tit">
  <span class="icono"></span>
  <span>Novedades</span>         
</div><!-- cierra .tit --> 
<?php else: ?>
  <div class="tit">
    <span class="icono"></span>
    <span>News</span>         
  </div><!-- cierra .tit --> 
<?php endif; ?> 

<div class="noticiasHome" id="feed"> 
  <!-- FEEDS -->
  <center id="loading"><img src="<?php bloginfo('template_directory'); ?>/images/ajax-loader.gif"/><br/><small>Cargando...</small></center>          
  <!-- FIN DE LOS FEEDS -->         
</div><!-- cierra .novedades --> 



<div style="display:none">  

 <div id="novedades">  
  <div class="tit">
   <span class="icono"></span>
   <span>Boletines</span> 
   <a href="#" class="ver">Ver todos</a>        
 </div><!-- cierra .tit --> 

 <div class="noticiasHome"> 

   <!-- NOTICIA -->
   <div class="noticiaHome">
     <img src="<?php bloginfo('template_directory'); ?>/images/silleteros.jpg" width="200" height="130" class="img-rounded" />

     <h2> Parque Cultural Nocturno: gran escenario de artistas</h2>
     <div class="linea"></div>
     <p>Una programación alternativa, cultural e incluyente caracterizó este evento que, durante 6 días, reunió a artistas locales, nacionales e internacionales, convocando cerca de 35 mil espectadores.</p>

     <div class="links">
      <div class="redes">
        <span class="twitter"><a href="#">Twitter</a></span>
        <span class="facebook"><a href="#">Facebook</a></span>
      </div>

      <div class="vermas"><a href="#">Ver más</a></div>
    </div><!-- cierra .links -->   
  </div><!-- cierra .noticiaHome --> 

  <!-- NOTICIA -->
  <div class="noticiaHome">
   <img src="<?php bloginfo('template_directory'); ?>/images/silleteros.jpg" width="200" height="130" class="img-rounded" />

   <h2> Parque Cultural Nocturno: gran escenario de artistas</h2>
   <div class="linea"></div>
   <p>Una programación alternativa, cultural e incluyente caracterizó este evento que, durante 6 días, reunió a artistas locales, nacionales e internacionales, convocando cerca de 35 mil espectadores.</p>

   <div class="links">
    <div class="redes">
      <span class="twitter"><a href="#">Twitter</a></span>
      <span class="facebook"><a href="#">Facebook</a></span>
    </div>

    <div class="vermas"><a href="#">Ver más</a></div>
  </div><!-- cierra .links -->   
</div><!-- cierra .noticiaHome --> 

<!-- NOTICIA -->
<div class="noticiaHome">
 <img src="<?php bloginfo('template_directory'); ?>/images/silleteros.jpg" width="200" height="130" class="img-rounded" />

 <h2> Parque Cultural Nocturno: gran escenario de artistas</h2>
 <div class="linea"></div>
 <p>Una programación alternativa, cultural e incluyente caracterizó este evento que, durante 6 días, reunió a artistas locales, nacionales e internacionales, convocando cerca de 35 mil espectadores.</p>

 <div class="links">
  <div class="redes">
    <span class="twitter"><a href="#">Twitter</a></span>
    <span class="facebook"><a href="#">Facebook</a></span>
  </div>

  <div class="vermas"><a href="#">Ver más</a></div>
</div><!-- cierra .links -->   
</div><!-- cierra .noticiaHome --> 



</div><!-- cierra .noticiasHome -->       
</div><!-- cierra .novedades --> 
</div><!-- end display none --> 

<div class="kitdeprensa">


  <div class="tit">
   <span class="icono"></span>
   <?php if(qtrans_getLanguage() == 'es'): ?>
   <span>Kit de prensa</span>
   <?php else: ?>
   <span>Press kit</span>
    <?php endif; ?>         
  </div><!-- cierra .tit --> 

  <div class="clearfix row-fluid">
    <div class="span6 logoDescarga">
      <span class="descarga">
      <a href="<?php bloginfo('template_directory'); ?>/descargables/logos.zip"><?php if(qtrans_getLanguage() == 'es'): ?>Descargar logo<?php else: ?>Download logo <?php endif; ?> </a></span>   
    </div>
    <div class="span6 galeriaFeriaD"> <!-- Galeria Feria 2012 -->
      <iframe src="https://www.flickr.com/photos/alcaldiademed/9357630457/in/set-72157634775199157/player/" width="307" height="182" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
      <span class="descarga"><a href="https://www.flickr.com/photos/alcaldiademed/sets/72157634775199157/" target="_blank"><?php if(qtrans_getLanguage() == 'es'): ?>Ver galería: Feria de las flores 2012<?php else: ?>Gallery: Feria de las Flores 2012<?php endif; ?></a></span>
    </div>
    <!-- <div class="span6 logosVarios">
      <span class="descarga"><a href="<?php bloginfo('template_directory'); ?>/descargables/sellosCRV.zip"><?php if(qtrans_getLanguage() == 'es'): ?>Descargar logos de eventos<?php else: ?>Download event logos<?php endif; ?></a></span> 
    </div> -->
  </div><!-- cierra row -->

  <div class="clearfix row-fluid">
    <div class="span6 galeriaFeriaD"><!-- Galeria Feria 2013 -->
      <iframe src="https://www.flickr.com/photos/alcaldiademed/9477118921/in/set-72157634919666530/player/" width="307" height="182" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe><br />
      <span class="descarga"><a href="https://www.flickr.com/photos/alcaldiademed/sets/72157634919666530/" target="_blank"><?php if(qtrans_getLanguage() == 'es'): ?>Ver galería: Desfile de silleteritos 2013<?php else: ?>Gallery: Desfile de silleteritos 2013<?php endif; ?></a></span>
    </div>
     <div class="span6 galeriaFeriaD"> <!-- Galería de Medellín -->
      <iframe src="https://www.flickr.com/photos/alcaldiademed/11885064474/in/set-72157639647576673/player/" width="307" height="182" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
      <span class="descarga"><a href="https://www.flickr.com/photos/alcaldiademed/sets/72157639647576673/" target="_blank"><?php if(qtrans_getLanguage() == 'es'): ?>Ver galería: Imágenes de Medellín<?php else: ?>Gallery: Pictures of Medellín<?php endif; ?></a></span>
    </div>
  </div><!-- cierra row -->

  <div class="clearfix row-fluid">
    <div class="span6 logoDescarga"> <!-- Progrmación -->
      <span class="descarga"><a href="<?php bloginfo('template_directory'); ?>/descargables/Programacion.pdf"><?php if(qtrans_getLanguage() == 'es'): ?>Descargar programación<?php else: ?>Download Schedule<?php endif; ?></a></span>
    </div>
    <div class="span6 logoDescarga">
      <span class="descarga"><a href="<?php bloginfo('template_directory'); ?>/descargables/Programacion_hd.pdf"><?php if(qtrans_getLanguage() == 'es'): ?>Descargar programación HD<?php else: ?>Download Schedule HD<?php endif; ?></a></span>
    </div>
  </div><!-- cierra row -->

  <div class="clearfix row-fluid">
  </div><!-- cierra row -->
  <div class="clearfix row-fluid" style="display:none;">
     <div class="span6 videoFeria">
      <iframe width="307" height="182" src="//www.youtube.com/embed/bQ2KKHzR2DA" frameborder="0" allowfullscreen></iframe>
      <span class="descarga"><a href="#">Descargar video</a></span> 
    </div>


    <div class="span6 logoDescarga">
      <span class="descarga"><a href="#">Descargar cuña</a></span>
    </div>
  </div><!-- cierra row -->

</div><!-- cierra .kitdeprensa -->
</div>



</div> <!-- end #main -->

<?php get_sidebar(); // sidebar 1 ?>

</div> <!-- end #content -->
</div> <!-- end #container -->

<?php get_footer(); ?>