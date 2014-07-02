<?php 
/*
Plugin Name: Avatar Fiesta
Plugin URI http://www.telemedellin.tv
Description: Plugin creado para subir fotos y enmarcarlas inicialmente, hecho para un evento llamado feria de las flores
Version: 0.1
Author: Pablo Martínez Yepes
Author URI: juan.martinez@telemedellin.tv
License: GNU Public (GPL2)
*/
/*  Copyright (C) 2014   Pablo Martínez Yepes

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
setlocale(LC_ALL, 'es_ES.UTF8');

  add_action( 'wp_print_scripts', 'initScrips' );
  add_action( 'wp_print_styles', 'initStyles' );


  function initStyles()
  {
    wp_register_style('css_jwindowcrop',  get_option('siteurl').'/wp-content/plugins'.'/avatar-fiesta/css/jWindowCrop.css', array(), '1.0', 'all');
    wp_register_style('css_fiesta',  get_option('siteurl').'/wp-content/plugins'.'/avatar-fiesta/css/fiesta.css', array(), '1.0', 'all');
    wp_register_style('css_file',  get_option('siteurl').'/wp-content/plugins'.'/avatar-fiesta/css/jquery.fileupload.css', array(), '1.0', 'all');

    wp_enqueue_style('css_jwindowcrop');
    wp_enqueue_style('css_fiesta');
    wp_enqueue_style('css_file');
  }

  function initScrips()
  {
    wp_register_script('jwindowcrop',  get_option('siteurl').'/wp-content/plugins'.'/avatar-fiesta/js/jquery.jWindowCrop.js',  array('jquery'),'1.0' );
    wp_register_script('jqueryform',  get_option('siteurl').'/wp-content/plugins'.'/avatar-fiesta/js/jquery.form.min.js',  array('jquery'),'1.0' );
    wp_register_script('jupwidget',  get_option('siteurl').'/wp-content/plugins'.'/avatar-fiesta/js/jquery.ui.widget.js',  array('jquery'),'1.0' );
    wp_register_script('juptrasport',  get_option('siteurl').'/wp-content/plugins'.'/avatar-fiesta/js/jquery.iframe-transport.js',  array('jquery'),'1.0' );
    wp_register_script('jupload',  get_option('siteurl').'/wp-content/plugins'.'/avatar-fiesta/js/jquery.fileupload.js',  array('jquery'),'1.0' );
    wp_enqueue_script('jwindowcrop');
    wp_enqueue_script('jqueryform');
    wp_enqueue_script('jqueryform');
    wp_enqueue_script('jupwidget');
    wp_enqueue_script('juptrasport');
    wp_enqueue_script('jupload');    
  }

  function myplugin_activate() 
  {
      global $wpdb;
      $wpdb->insert( 'wp_terms', array( 'name' => 'Selfie', 'slug' => 'selfie', 'term_group' => 0 ) );

  }
  register_activation_hook( __FILE__, 'myplugin_activate' );

  function myplugin_deactivate() 
  {
      global $wpdb;
      $wpdb->delete( 'wp_terms', "slug = 'selfie' ");
  }
  register_deactivation_hook( __FILE__, 'myplugin_deactivate' );

class AvatarFiesta{

  function __construct()
  {
    global $wpdb;
    $globalPath = substr(ABSPATH, 0,-1);
    if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
    if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', $globalPath.'/wp-content');
    if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
    if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');
     if (!defined('WP_UPLOADS_DIR'))
      define('WP_UPLOADS_DIR', WP_CONTENT_DIR.'/uploads');
    $id = $wpdb->get_row("SELECT * FROM $wpdb->wp_terms WHERE slug = 'selfie'");
    if(!defined('ID_SELFIE'))
          if( empty($id) )
              define('ID_SELFIE', $id['term_id'] );
  }



  function initFiesta()
  {
    include_once(WP_PLUGIN_DIR.'/avatar-fiesta/index.php');
  }

  function tokenUser()
  {

    $longitud = 8;
    $token = substr(MD5(rand(5, 100)),$logintud);

    return $token;
  }

  function getExt($type)
  {
    $ext = NULL;

    switch ($type) 
    {
        case 'image/jpeg':
          $ext = 'jpg'; 
        break;
        case 'image/png':
          $ext = 'png';
        break;
        case 'image/gif':
          $ext = 'gif';
        break;
        case 'image/xcf':
          $ext = 'xcf';
        break;
        default:
         $ext = null;
    }

    return $ext;
  }

  function marca($sourceFile, $watermarkFile, $token , $ext)
  {
    include_once(WP_PLUGIN_DIR.'/avatar-fiesta/classes/Watermark.php');
    $marca = new Watermark();

   /* $copia = 'C:/xampp/htdocs/ff2014/wp-content/themes/feria/images/'.$token.$ext;

    if (!copy($watermarkFile, $nuevo_archivo)) 
    {
        echo "Error al copiar $archivo...\n";
    }
*/
    if(!$marca->createWatermark($sourceFile, $watermarkFile) )
    {
      echo 'Error al enmarcar imagen';
    }



  }

}




?>