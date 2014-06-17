<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">
				
					<div class="page-header">
					<?php if (is_category()) { ?>
						<?php if(qtrans_getLanguage() == 'es'): ?>
                    	 <ul class="breadcrumb">
                              <li class="home"><a href="<?php echo home_url(); ?>">Inicio</a></li>
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


					<?php if (have_posts()) : ?>
					<?php $post = $posts[0]; $c=0; ?>
					<?php while (have_posts()) : the_post(); ?>
                    
                    <?php $c++; if( $c == 1) : ?>
                    <article>
                    	<section>
                        	
                            <?php the_post_thumbnail( 'first-historia' ); ?>
                            <h2><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?> 
                              <?php if(qtrans_getLanguage() == 'es'): ?>
                            <div class="vermas"><a href="<?php the_permalink(); ?>">Ver más</a></div>
                             <?php else: ?>
                             <div class="readmore"><a href="<?php the_permalink(); ?>">Read More</a></div>
                              <?php endif; ?>   
                           
                        </section> <!-- end article section -->
                    </article>
                    
                    <?php else : ?>
                                        
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" >
						

						<section class="post_content clearfix">
                        
                       		<div>
                            <?php if(qtrans_getLanguage() == 'es'): ?>
                            <?php the_post_thumbnail( 'historia' ); ?>
                            <?php else: ?>
                        	<?php if (get_the_ID() == 33): ?>
                        	<!-- Arrieros y Trovadores -->
                            <img src="<?php bloginfo('template_directory'); ?>/images/arrierosEn.png" />
                        	<?php endif; ?>
                        	<?php if (get_the_ID() == 29): ?>
                        	<!-- Expresiones Paisas -->
                            <img src="<?php bloginfo('template_directory'); ?>/images/expresionesEn.png" />
                        	<?php endif; ?>
                        	<?php if (get_the_ID() == 25): ?>
                        	<!-- Los Atuendos de la Feria -->
                            <img src="<?php bloginfo('template_directory'); ?>/images/atuendosEn.png" />
                        	<?php endif; ?>
                        	<?php if (get_the_ID() == 20): ?>
                        	<!-- Gastronomía Antioqueña -->
                            <img src="<?php bloginfo('template_directory'); ?>/images/gastronomiaEn.png" />
                        	<?php endif; ?>                             
                            <?php endif; ?> 
                            <span><?php the_excerpt(); ?></span>
                           <!-- <span><?php /*?><?php excerpt('175'); ?><?php */?></span>-->
                            <?php if(qtrans_getLanguage() == 'es'): ?>
                            <div class="vermas"><a href="<?php the_permalink(); ?>">Ver más</a></div>
                             <?php else: ?>
                             <div class="readmore"><a href="<?php the_permalink(); ?>">Read More</a></div>
                              <?php endif; ?>   
                            </div>
 
						</section> <!-- end article section -->
					<?php endif; ?>	
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header></header>
                        
					    <section class="post_content">
                          <div class="clearfix row-fluid">
                          
	
							
                            </div>
                         </div>
                            
                            
					    </section>
					   
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->
			</div> <!-- end #container -->

<?php get_footer(); ?>