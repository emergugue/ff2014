<?php
/*
Template Name: avatar fiesta
*/
print_r($_POST );
?>
<?php get_header();  ?>

<div id="content" class="clearfix row-fluid">
	<div id="main" class="span12 clearfix" role="main">
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
<?php if( !isset($_POST['acept']) ): ?>
	<div class="fiesta clearfix row-fluid">
		<div class="selfie-info">
			<?php                              
			if (have_posts()) : while (have_posts()) : the_post();
			echo get_the_content();
			endwhile;
			endif;
			?>
		</div>	
		<div class="selfie-footer span12">
			<iframe src="//www.youtube.com/embed/iaY8QEuh5a0" frameborder="0" allowfullscreen></iframe>
		</div>
		<div> 
			<form method="post">
				<input class="self-button-primary"type="submit" name="acept" value="¡Sube tu Selfie!" >
			</form>
		</div>
	</div>
	<div class="galeria clearfix row-fluid">
	<?php
		$args = array('cat'=>'23');
		$the_query = new WP_Query($args); 

  if ($the_query->have_posts()):
    while ($the_query->have_posts() ) : $the_query->the_post(); 

	    //$categoria    = get_the_category();
	    //$categoria    = ( !empty($categoria[1]->name) ) ? $categoria[1]->name : $categoria[0]->name ;

	    $post_thumbnail_id   = get_post_thumbnail_id($post->ID, 'full');
	    $post_thumbnail_url  = (!empty($post_thumbnail_id)) ? wp_get_attachment_url( $post_thumbnail_id ) : get_template_directory_uri().'/images/dummie-post.png';
	?>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		<article id="selfie-<?php echo get_the_ID() ?>" class="selfie-item" role="article" >
			<header class="selfie-header"> 
				<h1><?php echo the_title('','',false); ?> </h1>
			</header>
			<figure class="selfie-figure">
				<img src="<?php echo $post_thumbnail_url ?>" alt="<?php echo the_title('','',false) ?>" />
			</figure>
			<footer class="selfie-figure">
				<time datetime="<?php echo get_the_time('Y-m-j') ?>" pubdate>
					<?php echo get_the_time('j').'de '.get_the_time('F').' del '.get_the_time('Y') ?>
				</time>
			</footer>	
		</article>
	</a>
	<?php
	  endwhile;
  endif;
 	 ?>
	</div>
<?php else: ?>
	<?php		
	if (class_exists('AvatarFiesta')) 
	{
		$avatar  = new AvatarFiesta();
		$avatar->initFiesta(); 
	}
	?>
<?php endif; ?>		
</div> <!-- main -->
</div><!-- content -->
<?php get_footer(); ?>