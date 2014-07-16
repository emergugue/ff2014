<?php
/*
Plugin Name: Comments Facebook
Plugin URI: http://bumbablog.com/
Description: Este plugin mostrará el formulario de comentarios de facebook en tus post y pages. Contribuye con tu SEO. No más comentarios spam.
Version: 1.51
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
  add_option('app_language', 'es_ES');
  add_option('app_post', '2');
}

function admin_init_commentsfacebook() {
  register_setting('commentsfacebook', 'web_app_title');
  register_setting('commentsfacebook', 'web_app_id');
  register_setting('commentsfacebook', 'app_language');
  register_setting('commentsfacebook', 'app_post');
}

function admin_menu_commentsfacebook() {
  add_options_page('Comments Facebook', 'Comments Facebook', 8, 'commentsfacebook', 'options_page_commentsfacebook');
}

function options_page_commentsfacebook() {
  include(WP_PLUGIN_DIR.'/comments-facebook/options.php');  
}

function declarevarcom(){
  $web_app_title = get_option('web_app_title');
  $web_app_id = get_option('web_app_id');
  $app_language = get_option('app_language');
  $app_post = get_option('app_post');
?>
  
  <div id="fb-root"></div>
  
	<script>(function(d, s, id) {
  		var js, fjs = d.getElementsByTagName(s)[0];
  		if (d.getElementById(id)) return;
  		js = d.createElement(s); js.id = id;
  		js.src = "//connect.facebook.net/<?php echo $app_language ?>/sdk.js#xfbml=1&appId=<?php echo $web_app_id ?>&version=v2.0";
  		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
    
    <style>
	#fbcomments, .fb-comments, .fb-comments iframe[style], .fb-comments span {
		width: 100% !important;
	}
	</style>
<?php
}

function commentsfacebook() { 
  
  $web_app_title = get_option('web_app_title');
  $web_app_id = get_option('web_app_id');
  $app_language = get_option('app_language');
  $app_post = get_option('app_post');
  
  $url_base_com = get_permalink();
   ?>
    
   <div style="margin: 30px 0px 30px 0px;"><h2><?php echo $web_app_title ?></h2></div>
             
   <div class="fb-comments" data-href="<?php echo $url_base_com; ?>" data-num-posts="<?php echo $app_post ?>" data-colorscheme="light" data-width="100%"></div>
   
   <script>FB.XFBML.parse();</script>
  <?php
  
}

register_activation_hook(__FILE__, 'activate_commentsfacebook');

if (is_admin()) {
  add_action('admin_init', 'admin_init_commentsfacebook');
  add_action('admin_menu', 'admin_menu_commentsfacebook');
}

if (!is_admin()) {
	add_action('wp_head', 'declarevarcom');
	add_action('comments_template', 'commentsfacebook');
}

?>