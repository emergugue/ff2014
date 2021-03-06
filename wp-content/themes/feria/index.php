<?php get_header(); ?>

<?php
$blog_hero = of_get_option('blog_hero');
if ($blog_hero){
 ?>
  <div class="clearfix row-fluid">
				<!--<div class="hero-unit">
				
					<?php /*?><h1><?php bloginfo('title'); ?></h1>
					
					<p><?php bloginfo('description'); ?></p><?php */?>
				
				</div>-->
	</div>
	<?php
}
?>

  <div id="content" class="clearfix row-fluid">

    <div id="main" class="inicio span12 clearfix" role="main">
      <div class="marquee-feria span12">
         <?php if (function_exists ('ptmsshow')) ptmsshow(); ?> 
      </div>

      <div class="slider visible-desktop">
        <?php echo get_new_royalslider(1); ?>
      </div><!-- cierra .slider -->
      
        <div class="hoy">
        <!-- Titulos -->
    <div class="clearfix row-fluid">
        <!-- widget de eventos de hoy en la feria -->
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar2') ) : 
              endif;
        ?>
    </div>            
    <div class="clearfix row-fluid">
      <!-- AQUÍ IBA HOY EN LA FERIA -->
      <!-- AQUI IBA NO TE MIERDAS MAÑANA -->
      <div class="row-fluid">
        <div class="span8">
          <div id="novedades">  
           <?php if(qtrans_getLanguage() == 'es'): ?>
             <div class="tit">
              <span class="icono hidden-phone"></span>
              <span>Novedades</span>         
            </div><!-- cierra .tit --> 
          <?php else: ?>
            <div class="tit">
              <span class="icono hidden-phone"></span>
              <span>For tourists</span>         
            </div><!-- cierra .tit --> 
          <?php endif; ?> 
          <?php if(qtrans_getLanguage() == 'es'): ?>
          <div class="noticiasHome" id="feed"> 
            <!-- FEEDS -->
            <center id="loading"><img src="<?php bloginfo('template_directory'); ?>/images/ajax-loader.gif"/><br/><small>Cargando...</small></center>
          </div>       
        <?php else: ?>
        <?php query_posts('cat=1&tag=turismo'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
          <section class="post_content">
            <?php the_post_thumbnail( 'historia' ); ?>
            <h2><?php the_title(); ?></h2>
            <?php the_excerpt(); ?>
          </section> <!-- End article section -->
        </article> <!-- end article -->
        <?php endwhile; ?>
          <?php endif; ?>
        <?php endif; ?>                            
      </div><!-- cierra .novedades --> 
    </div>
<!-- SIDEBAR HOME -->
<?php get_sidebar(); // sidebar 2 ?>

<!-- CIERRA SIDEBAR HOME --> 
        </div><!-- cierra row -->  


</div>                          

<?php get_footer(); ?>