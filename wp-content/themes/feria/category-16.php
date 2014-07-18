<?php get_header(); ?>	
	<div id="content" class="clearfix row-fluid">
		<div id="main" class="span8 clearfix" role="main">  
			<div class="page-header"> <?php if (is_category()) { 
				?> <?php if(qtrans_getLanguage() == 'es'): ?> 
				<ul class="breadcrumb"> 
					<li class="home"><a href="<?php echo home_url(); ?>">Home</a></li> 
					<li class="active"><?php single_cat_title(); ?></li> 
				</ul>
				<?php else: ?> 
				<ul class="breadcrumb"> <li class="home"><a href="<?php echo home_url(); ?>/en/">Home</a></li>
					<li class="active"><?php single_cat_title(); ?></li> 
				</ul> <?php endif; ?> <?php } ?> 
			</div>
			<div class='travel span12'>
				<?php
				$args = array('cat'=>'16', 'orderby' => 'date', 'order' => 'ASC') ;
				$query = new WP_Query( $args );
				
				if ($query->have_posts()) :
                while ($query->have_posts() ) : $query->the_post();
					?>
						<article id="post-<?php echo get_the_ID(); ?>" class='bit' >
							<header>
								<div class='header-izq'><h2><?php echo get_the_title(); ?></h2></div>
								<div class='header-der'>
									<time datetime="<?php echo get_the_time('Y-m-j', get_the_ID()); ?>" pubdate><?php the_time('j \de F \del Y', get_the_ID() ) ?></time>
								</div>
							</header>
							<section>
								<p><?php
							/*	$content = get_the_content();
								echo $content; */
								the_content('');
								?>
							</section>
							<footer>
								<figure>  <?php echo get_the_post_thumbnail($page->ID, 'medium'); ?> </figure>
								<div class="vermas"><a href="<?php the_permalink() ?>" >Ver Más + </a></div>
							</footer>
						</article>
					<?php
                endwhile;
				endif; 
				?>
				      
			</div>
			
			<div class="row pagination">	
				<nav class="wp-prev-next">
					<ul class="clearfix">
						<li class="prev-link"><?php next_posts_link(_e('&laquo; Anterior', "bonestheme")); ?></li>
						<li class="next-link"><?php previous_posts_link(_e('Siguiente &raquo;', "bonestheme")); ?></li>
					</ul>
				</nav>
			</div>
		</div> <!-- end #main -->
			<?php get_sidebar(); // sidebar 1 ?>
	</div> <!-- end #content -->
 </div> <!-- end #container -->

<?php get_footer(); ?>
