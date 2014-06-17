				<div id="sidebar2" class="fluid-sidebar sidebar span4" role="complementary">
				
					<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar2' ); ?>

					<?php else : ?>

						<div class="videoFeria">
                            <div class="tit">
                                 <span class="icono"></span>
                                   <span>Video de la feria</span>         
                            </div><!-- cierra .tit -->  
                            
                            <iframe width="300" height="169" src="//www.youtube.com/embed/bQ2KKHzR2DA" frameborder="0" allowfullscreen></iframe>
                         </div><!-- cierra .videoFeria -->

					<?php endif; ?>

				</div>