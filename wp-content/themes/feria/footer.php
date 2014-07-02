 <div class="clearfix row-fluid">
            <div class="span12 Decoration">
                        <?php if(qtrans_getLanguage() == 'es'): ?>
                       <ul class="menuInferior hidden-phone"> 
                           <li class="preguntasFrecuentes"><a href="<?php echo home_url(); ?>/preguntas-frecuentes/" title="Preguntas Frecuentes">Preguntas Frecuentes</a></li>
                           <li class="directorioArtistas"><a href="http://www.feriadelasfloresmedellin.gov.co/directorio/" title="Directorio de artistas" target="_blank">Directorio Artistas</a></li>           
                        </ul>
                         <?php else: ?>
                          <ul class="menuInferior hidden-phone"> 
                           <li class="preguntasFrecuentesEn"><a href="<?php echo home_url(); ?>/en/preguntas-frecuentes/" title="FAQs">FAQs</a></li>
                           <li class="directorioArtistasEn"><a href="http://www.feriadelasfloresmedellin.gov.co/directorio/" title="Artistic Directory" target="_blank">Artistic Directory</a></li>           
                        </ul>
                        <?php endif; ?>    
                              
                
            </div> 
         </div>         

		</div> <!-- end #main -->
</div> <!-- end #content -->
</div> <!-- end #container -->

			<footer role="contentinfo" >

				<div id="inner-footer">
		       
                <ul>
                 <li><a href="http://www.medellinconventionbureau.com/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/buro.jpg" width="88" height="56" /></a> </li>
               
                 <li><a href="http://www.antioquia.gov.co/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/logogobernacion.jpg" width="100" height="56" /></a> </li>
                  <li><a href="http://www.antioquia.gov.co/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/logoAntioquia.jpg" width="64" height="56" /></a> </li>
                  <li><a href="http://www.antioquia.gov.co/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/logo200.jpg" width="100" height="56" /></a></li>
                  <li><a href="http://www.antioquia.gov.co/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/logogranferia.jpg"width="100" height="56" /></a></li>
                   <li><a href="http://www.medellindigital.gov.co/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/medellindigital.jpg" width="83" height="56" /></a></li>
                <li><a href="http://www.telemedellin.tv/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/telemedellin.jpg" width="88" height="56" /></a></li>
                 <li><a href="http://www.medellin.gov.co/irj/portal/medellin" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/alcaldia.jpg" width="88" height="56" /></a></li>
                </ul>
              
                <ul style="text-align:center; margin:0 auto; width:300px;">
                	 <li><a href="http://www.mincultura.gov.co/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/logoprosperidad.jpg" width="207" height="56" /></a></li>
                </ul>
		
				</div> <!-- end #inner-footer -->

				
			</footer> <!-- end footer -->
		
		
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
    <!-- FACEBOOK PLUGGIN INCLUIDO -->
		 <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=1416538475270198&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>        
      <!-- G+ pluggin activado -->
      <script type="text/javascript">
      window.___gcfg = {lang: 'es'};

      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/platform.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>

    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>