<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
      <![endif]-->

      <!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


      <!-- wordpress head functions -->
      <?php wp_head(); ?>
      <!-- end of wordpress head -->

      <!-- theme options from options panel -->
      <?php get_wpbs_theme_options(); ?>

      <!-- typeahead plugin - if top nav search bar enabled -->
      <?php require_once('library/typeahead.php'); ?>

      <!--<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/libs/jquery-1.7.1.min.js" ></script>-->
      <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/bootstrap.calendar.js" ></script>

      <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/css/bootstrap.calendar.css" type="text/css" />
      <script src="<?php bloginfo('template_directory'); ?>/jquery.isotope.min.js"></script>
      <script>
      jQuery(function($){

        var $container = $('#container');

        $container.isotope({
          itemSelector : '.element'
        });


        var $optionSets = $('#options .option-set'),
        $optionLinks = $optionSets.find('a');

        $optionLinks.click(function(){
          var $this = $(this);
      // don't proceed if already selected
      if ( $this.hasClass('selected') ) {
        return false;
      }
      var $optionSet = $this.parents('.option-set');
      $optionSet.find('.selected').removeClass('selected');
      $this.addClass('selected');
      
      // make option object dynamically, i.e. { filter: '.my-filter-class' }
      var options = {},
      key = $optionSet.attr('data-option-key'),
      value = $this.attr('data-option-value');
      // parse 'false' as false boolean
      value = value === 'false' ? false : value;
      options[ key ] = value;
      if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
        // changes in layout modes need extra logic
        changeLayoutMode( $this, options )
      } else {
        // otherwise, apply new options
        $container.isotope( options );
      }
      
      return false;
    });

        <?php if(is_category( '3' ) || is_home()): ?>
        $.ajax({
          type: "POST",
          url: "<?php bloginfo('template_directory'); ?>/getFeed.php",
          success: function(data){     
            $("#feed").html(data);
          }
        });
        <?php endif; ?>
      });
</script>  

<script type="text/javascript">
jQuery(document).ready(function($){

  var evnts = function(){
    return {
      "event":
      [

      ]
    }
  };

  $('.calendario' ).Calendar({ 'events': evnts, 'weekStart': 1 })
  .on('changeDay', function(event){
    $("#loading").css("display","block");
    $.ajax({
      type: "POST",
      data: "fecha=" + event.day.valueOf() +'/'+ event.month.valueOf() +'/'+ event.year.valueOf(),
      url: "<?php bloginfo('template_directory'); ?>/getEvento.php",
      success: function(data){

        $("#container").isotope('destroy');
        $("#container").isotope({
          itemSelector : '.element'
        });

        $("#container").isotope('remove', $(".element"));          
        $("#container").isotope('insert', $(data)); 
        $("#loading").css("display","none");
      }
    });
    if( $('.daySelected').length )
    {
      $('.daySelected').removeClass('daySelected'); 
    }

    $('#day_'+event.day.valueOf()).addClass('daySelected');
          //alert(event.day.valueOf() +'/'+ event.month.valueOf() +'/'+ event.year.valueOf() ); 
  })
  .on('onEvent', function(event){ alert(event.day.valueOf() +'-'+ event.month.valueOf() +'-'+ event.year.valueOf() ); })
  .on('onNext', function(event){  })
  .on('onPrev', function(event){  })
  .on('onCurrent', function(event){ 
    //$("#container").html(event.day.valueOf() +'/'+ event.month.valueOf() +'/'+ event.year.valueOf());
  });
});
</script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-41382664-2', 'feriadelasfloresmedellin.gov.co');
ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>

  <header role="banner">
    <div class="blanco">
     <div id="cabezoteAlcaldia"  class="clearfix">	
      <div class="corazon"></div>

      <div class="logosAlcaldia">
        <div class="redesAlcaldia">
          <ul>
           <li><a href="http://www.facebook.com/alcaldiademed" target="_blank" title="Facebook"><img src="<?php bloginfo('template_directory'); ?>/images/Facebook.png" /></a></li>
           <li><a href="http://twitter.com/alcaldiademed" target="_blank" title="Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/Twitter.png" /></a></li>
           <li><a href="http://www.youtube.com/alcaldiademed" target="_blank" title="Youtube"><img src="<?php bloginfo('template_directory'); ?>/images/Youtube.png" /></a></li>
           <li><a href="http://www.flickr.com/photos/90282908@N03/" target="_blank" title="Flickr"><img src="<?php bloginfo('template_directory'); ?>/images/Flickr.png" /></a></li>
         </ul>

       </div>
     </div>

   </div>
 </div>

 <div id="inner-header" class="clearfix">
  <div class="navbar">

    <div class="container-fluid nav-container">
      <nav id="main-menu" role="navigation" class="row-fluid">
        <a id="logo" class="span3" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
          <div class="brand"></div>
        </a>
        <div id="main_nav" class="span9">
          <?php if(qtrans_getLanguage() == 'es'): ?>
          <ul class="menu menuholder"> 
            <!-- <li class="menu_inicio hidden-phone"><a href="<?php echo home_url(); ?>" title="Inicio" class="active">Inicio</a></li> -->
            <li class="menu_programacion"><a href="<?php echo home_url(); ?>/programacion/" title="Programación">Programación</a></li>
            <li class="menu_turistica"><a href="<?php echo home_url(); ?>/infoturistica/" title="Info Turística">Info Turística</a></li>
            <li class="menu_historia"><a href="<?php echo home_url(); ?>/historia/" title="Historia">Historia</a></li>
            <li class="menu_saladeprensa"><a href="<?php echo home_url(); ?>/saladeprensa/" title="Sala de Prensa">Sala de Prensa</a></li>
            <li class="menu_contactenos"><a href="<?php echo home_url(); ?>/contacto" title="Contáctenos">Contáctenos</a></li>
            <li class="menu_envivo"><a href="<?php echo home_url(); ?>/la-feria-en-vivo/" title="En Vivo">En Vivo</a></li>
          </ul>
          <?php else: ?>
          <ul class="menuEn menuholderEn hidden-phone"> 
            <!-- <li class="menu_inicio"><a href="<?php echo home_url(); ?>/en/" title="Inicio" class="active">Inicio</a></li> -->
            <li class="menu_programacion"><a href="<?php echo home_url(); ?>/en/category/programacion/" title="Programación">Schedule</a></li>
            <li class="menu_turistica"><a href="<?php echo home_url(); ?>/en/category/infoturistica/" title="Info Turística">Four Turist</a></li>
            <li class="menu_historia"><a href="<?php echo home_url(); ?>/en/category/historia/" title="Historia">History</a></li>
            <li class="menu_saladeprensa"><a href="<?php echo home_url(); ?>/en/category/saladeprensa/" title="Sala de Prensa">Press Room</a></li>
            <li class="menu_contactenos"><a href="<?php echo home_url(); ?>/en/contacto/" title="Contact us">Contact us</a></li>
            <li class="menu_envivo"><a href="<?php echo home_url(); ?>/en/la-feria-en-vivo/" title="En Vivo">La Feria Live</a></li>
          </ul>
          <?php endif; ?>
        </div>
      </nav>
      <div class="row-fluid barra-menu">
            <div class="sociales span4">
              <div class="fb-share-button" data-type="button"></div>
              <div class="g-plus" data-action="share" data-annotation="none"></div>
              <a href="https://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="none" data-hashtags="FeriaDeLasFlores" data-via="AlcaldiadeMed">Twittear</a>
            </div>
            <div class="span3 idioma">
              <!-- Widget de idioma -->   
              <?php if ( function_exists('dynamic_sidebar')) :
              dynamic_sidebar('idioma');
              ?>
              <?php endif; ?>
              <!-- Widget de idioma --> 
            </div> 
            <div class="span5 buscador visible-desktop">
              <?php if(qtrans_getLanguage() == 'es'): ?>
              <form action="<?php echo home_url(); ?>" method="get" class="form-stacked">
                <fieldset>
                  <div class="clearfix">
                    <div class="input-append input-prepend">
                      <span class="add-on"><i class="icon-search"></i></span><input type="text" name="s" id="search" placeholder="Buscar" value="" class="placeholder"><button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                  </div>
                </fieldset>
              </form>
                <?php else: ?>
                <form action="<?php echo home_url(); ?>" method="get" class="form-stacked">
                  <fieldset>
                    <div class="clearfix">
                      <div class="input-append input-prepend">
                        <span class="add-on"><i class="icon-search"></i></span><input type="text" name="s" id="search" placeholder="Buscar" value="" class="placeholder"><button type="submit" class="btn btn-primary">Search</button>
                      </div>
                    </div>
                  </fieldset>
                </form>
                <?php //get_search_form( $echo ); ?>
              <?php endif; ?>
            </div>
          </div>
    </div>


<?php if(of_get_option('search_bar', '1')) {?>
<form class="navbar-search pull-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
  <input name="s" id="s" type="text" class="search-query" autocomplete="off" placeholder="<?php _e('Search','bonestheme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
</form>
<?php } ?>

</div> <!-- end .nav-container -->

</div> <!-- end .navbar -->

</div> <!-- end #inner-header -->
</div> 

</header> <!-- end header -->

<div class="container-fluid contenedor-general">
