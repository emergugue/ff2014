<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
                        <?php if ( in_category("historia")) { ?>
                        
                        <div class="page-header">
                                <h1 class="single-title" itemprop="headline">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
						
                        <?php } else { ?>
                        	 
							 <?php the_post_thumbnail( 'wpbs-featured' ); ?>
                             
                             <div class="page-header">
                                <h1 class="single-title" itemprop="headline">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <?php
                            	// Categoria del viajero.
                             if( in_category('16') )
  	                          	{
  	                          		?>	
		                             <div class="page-header-date">
		                                <span itemprop="headline">
		                                 		<time datetime="<?php echo get_the_time('Y-m-j', get_the_ID()); ?>" pubdate><?php the_time('j \d\e F \d\e\l Y') ?></time>
		                                </span>
		                            </div>		
  	                          		<?php
                           		} 
                            }?>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							
							<?php the_content(); ?>
							
							<!-- Muestra los Campos Personalizados -->
							<?php $category = get_the_category(); ?>
							<?php if($category[0]->cat_name === "Eventos"): ?>
							<?php
							$fechaInicio = get_post_meta($post->ID,'fecha_inicio', true);
							$fechaFin = get_post_meta($post->ID,'fecha_fin',true);
							$horaInicio = get_post_meta($post->ID,'hora_inicio',true);
							$horaFin = get_post_meta($post->ID,'hora_fin',true);
							$lugar = get_post_meta($post->ID,'lugar',true);
							$telefono = get_post_meta($post->ID,'telefono',true);

							$humanHoraInicio = date("g:i a", strtotime($horaInicio));

							if(trim($horaFin) === ""){
							  $tieneHoraFin = false;
							}
							else{
							  $tieneHoraFin = true;
							  $humanHoraFin = date("g:i a", strtotime($horaFin));
							}
							if($fechaInicio === $fechaFin){
								$tienFechaFin = false;
							}
							else{
								$tienFechaFin = true;
							}
							?>							
								<ul class="custom-fields">
								  <li><i class="icon-calendar"></i> <strong>Fecha:</strong> <?php echo $fechaInicio ?> <?php echo ($tienFechaFin) ? " al $fechaFin" : '' ?></li>
								  <li><i class="icon-time"></i> <strong> Hora:</strong> <?php echo $humanHoraInicio ?> <?php echo ($tieneHoraFin) ? " a $humanHoraFin" : "" ?></li>
								  <li><i class="icon-map-marker"></i> <strong>Lugar:</strong> <?php echo $lugar ?></li>
								  <li><i class="icon-star"></i> <strong>Teléfono:</strong> <?php echo $telefono ?></li>
								</ul>								
							<?php endif ?>
							<!-- Fin de mostrar los campos Personalizados -->

							<?php wp_link_pages(); ?>
                            
                            <?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Editar articulo","bonestheme"); ?></a>
							<?php } ?>
					
						</section> <!-- end article section -->
					
					
					</article> <!-- end article -->					
					<?php $category = get_the_category(); ?>
					<?php if($category[0]->cat_name === "Historia"): ?>
						<?php comments_template('',true); ?>
					<?php endif; ?>
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->
</div> <!-- end #container -->

<?php get_footer(); ?>