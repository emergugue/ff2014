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
					
                  
                    <div class="entradilla">
                    	<?php if(qtrans_getLanguage() == 'es'): ?>
	                    	<p>
	                    	Ven y enamórate de Medellín, una ciudad moderna que impacta por su vibrante actividad turística, 
	                    	cultural y comercial. Deléitate, además, con su clima, infraestructura y paisaje natural.
	                    	Una ciudad que cautiva los 365 días del año! 
	                    	<a href="http://medellin.travel/" target="_blank">www.medellin.travel</a>
	                    	</p>
                        <?php else: ?>
                    		<p>
                    		Come and fall in love with Medellin, a modern city that never ceases to amaze with its vibrant touristic, 
                    		cultural and commercial life.  You will also be astonished by its comfortable climate, 
                    		the infrastructure and its natural beauty. A city that captivates 365 days a year! 
                    		<a href="http://medellin.travel/" target="_blank">www.medellin.travel</a>
                    		</p>
                        <?php endif; ?>  
                    	
                    </div>
                    <?php query_posts('cat=1&tag=turismo'); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<section class="post_content">

                            <?php the_post_thumbnail( 'historia' ); ?>
                            
                            <h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
					
						</section> <!-- end article section -->
						
						
					</article> <!-- end article -->
					
					<?php endwhile; ?>
                    <?php wp_reset_query(); ?>	
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					   
 
					    <section class="post_content">
                          <div class="clearfix row-fluid">
                          
                          bla
 
                          </div>

					    </section>
					   
					</article>
					
					<?php endif; ?>
			

			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->
			</div> <!-- end #container -->

<?php get_footer(); ?>