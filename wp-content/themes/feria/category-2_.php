<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">
				
					<div class="page-header">
					<?php if (is_category()) { ?>
                    	 <ul class="breadcrumb">
                              <li class="home"><a href="#">Home</a> <span class="divider">/</span></li>
                              <li class="active"><?php single_cat_title(); ?></a></li>
                            </ul>
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2">
							<?php single_tag_title(); ?>
						</h1>
					<?php } elseif (is_author()) { ?>
						<h1 class="archive_title h2">
							<?php get_the_author_meta('display_name'); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
					    <h1 class="archive_title h2">
					    	<?php the_time('F Y'); ?>
					    </h1>
					<?php } elseif (is_year()) { ?>
					    <h1 class="archive_title h2">
					    	<?php the_time('Y'); ?>
					    </h1>
					<?php } ?>
					</div>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
                        
                       
                                                    
							<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
						
						</header> <!-- end article header -->
					
						<section class="post_content">
                        
                       		<div class="span6 gastronomia">
                            <?php the_post_thumbnail( 'wpbs-featured' ); ?>
                            <span>Conocida por la cantidad  ingredientes que emplea y por varias delicias conocidas inclusive en el exterior, los platos típicos de la región son normalmente irresistibles. </span>
                            <div class="vermas"><a href="#">Ver más</a></div>
                            </div>
                            
                            <div class="span6 atuendos">
                            <span>La Feria de las Flores es la ocasión ideal para conocer y dar uso a los elementos que
componen los tradicionales atuendos paisas.</span> 
 <div class="vermas"><a href="#">Ver más</a></div>
 </div>
                          </div>
                          
                          <div class="clearfix row-fluid">  
                            <div class="span6 expresiones">
                            <span>Conocida por la cantidad  ingredientes que emplea y por varias delicias conocidas inclusive en el exterior, los platos típicos de la región son normalmente irresistibles. 
                             <div class="vermas"><a href="#">Ver más</a></div>
                            </span>
                            </div>
                            
                            <div class="span6 arrieros">
                            <span>La Feria de las Flores es la ocasión ideal para conocer y dar uso a los elementos que
componen los tradicionales atuendos paisas.</span>
							 <div class="vermas"><a href="#">Ver más</a></div>
							
                            </div>
						
							
						
							<?php the_excerpt(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
							
						</footer> <!-- end article footer -->
					
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
                          
					    	<div class="span6 gastronomia">
                            <span>Conocida por la cantidad  ingredientes que emplea y por varias delicias conocidas inclusive en el exterior, los platos típicos de la región son normalmente irresistibles. </span>
                            <div class="vermas"><a href="#">Ver más</a></div>
                            </div>
                            
                            <div class="span6 atuendos">
                            <span>La Feria de las Flores es la ocasión ideal para conocer y dar uso a los elementos que
componen los tradicionales atuendos paisas.</span> 
 <div class="vermas"><a href="#">Ver más</a></div>
 </div>
                          </div>
                          
                          <div class="clearfix row-fluid">  
                            <div class="span6 expresiones">
                            <span>Conocida por la cantidad  ingredientes que emplea y por varias delicias conocidas inclusive en el exterior, los platos típicos de la región son normalmente irresistibles. 
                             <div class="vermas"><a href="#">Ver más</a></div>
                            </span>
                            </div>
                            
                            <div class="span6 arrieros">
                            <span>La Feria de las Flores es la ocasión ideal para conocer y dar uso a los elementos que
componen los tradicionales atuendos paisas.</span>
							 <div class="vermas"><a href="#">Ver más</a></div>
							
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