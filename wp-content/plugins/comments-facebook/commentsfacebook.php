<?php
/*
Plugin Name: Comments Facebook
Plugin URI: http://bumbablog.com/
Description: Este plugin mostrará el formulario de comentarios de facebook en tus post y pages. Contribuye con tu SEO. NO más comentarios spam.
Version: 1.0
Author: Demo BUMBABlog
Author URI: http://bumbablog.com/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_commentsfacebook() {
  add_option('web_app_title', 'Comments');	
  add_option('web_app_id', '150278208448155');
  add_option('app_width', '600');
  add_option('app_language', 'es_ES');
  add_option('app_post', '2');
}

function deactive_commentsfacebook() {
  delete_option('web_app_title');
  delete_option('web_app_id');
  delete_option('app_width');
  delete_option('app_language');
  delete_option('app_post');
}

function admin_init_commentsfacebook() {
  register_setting('commentsfacebook', 'web_app_title');
  register_setting('commentsfacebook', 'web_app_id');
  register_setting('commentsfacebook', 'app_width');
  register_setting('commentsfacebook', 'app_language');
  register_setting('commentsfacebook', 'app_post');
}

function admin_menu_commentsfacebook() {
  add_options_page('Comments Facebook', 'Comments Facebook', 8, 'commentsfacebook', 'options_page_commentsfacebook');
}

function options_page_commentsfacebook() {
  include(WP_PLUGIN_DIR.'/comments-facebook/options.php');  
}

function commentsfacebook() { 
  
  $web_app_title = get_option('web_app_title');
  $web_app_id = get_option('web_app_id');
  $app_width = get_option('app_width');
  $app_language = get_option('app_language');
  $app_post = get_option('app_post');
  
  
  ?>
  
  <div id="fb-root"></div>
	<script>(function(d, s, id) {
  		var js, fjs = d.getElementsByTagName(s)[0];
  		if (d.getElementById(id)) return;
  		js = d.createElement(s); js.id = id;
  		js.src = "//connect.facebook.net/<?php echo $app_language ?>/all.js#xfbml=1&appId=<?php echo $web_app_id ?>";
  		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
   <div style="margin-top: 30px;">
    <?php if(qtrans_getLanguage() == 'es'): ?>
    <h3>Comentarios</h3>
    <?php else: ?>
    <h3><?php echo $web_app_title ?></h3>
    <?php endif; ?>
  </div>
             
   <center><div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="<?php echo $app_post ?>" data-width="<?php echo $app_width ?>"></div></center>
    
  <?php

}

register_activation_hook(__FILE__, 'activate_commentsfacebook');
register_deactivation_hook(__FILE__, 'deactive_commentsfacebook');

if (is_admin()) {
  add_action('admin_init', 'admin_init_commentsfacebook');
  add_action('admin_menu', 'admin_menu_commentsfacebook');
}

if (!is_admin()) {
	add_action('comments_template', 'commentsfacebook');
}

?>