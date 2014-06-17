<?php
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

if(function_exists('fetch_feed')) {
  include_once(ABSPATH . WPINC . '/feed.php');               // hay que incluir esto
  $feed = fetch_feed('http://www.medellin.gov.co/irj/servlet/prt/portal/prtmode/rss/prtroot/pcmrssserver.Nav?rid=/guid/e07c8b01-38b3-2f10-fbb3-df3742e451d7&NavigationTarget=navurl://6c8fe23e4fdbf5a6e014e890b7d959c5'); // el feed que queremos mostrar
  if(count($feed->errors) > 0){
    $limit = 0;
  }
  else {
    $limit = $feed->get_item_quantity(3); // especificamos el número de items a mostrar
    $items = $feed->get_items(0, $limit); // se crea un array con los items
  }
}
if ($limit == 0) echo '';
else foreach ($items as $item) : ?>
<div class="noticiaHome">
  <?php
  $img =  stristr ( $item->get_content() , "<img");

  $second = strpos($img, ">");

  $img = substr($img, 0, $second);

  $src = substr($img, strpos($img, "src=") + 5 ) ;
  $params = preg_split('[\"|\']', $src, 2);
  if($params[0] == "" || $params[0] == "/" || $params[0] == " "){
    $src = get_template_directory_uri() . "/images/genericaFeed.jpg";
  }
  else{
    $src = $params[0];
  }
  ?>
  <img src="<?php echo $src ?>" width="200" height="130" class="img-rounded" />
  <h2><?php echo $item->get_title(); ?></h2>
  <div class="linea hidden-phone"></div>
  <p><?php echo substr(strip_tags ($item->get_content()), 0, 200) ?>...</p>
  <div class="links">
    <div class="redes">
      <span class="twitter">
        <a href="https://twitter.com/share?text=<?php echo $item->get_title(); ?>&url=<?php echo $item->get_permalink(); ?>" target="_blank">
          Twitter
        </a>
      </span>
      <span class="facebook">
        <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo $item->get_permalink(); ?>&amp;p[title]=<?php echo $item->get_title(); ?>&amp;p[summary]=<?php echo substr(strip_tags ($item->get_content()), 0, 200) ?>">
          Facebook
        </a>
      </span>
    </div>
    <?php if(qtrans_getLanguage() == 'es'): ?>
    <div class="vermas">
      <a target="_BLANK" href="<?php echo $item->get_permalink(); ?>" title="<?php echo $item->get_date('j F Y @ G:i'); ?>">Ver más</a>
    </div>
    <?php else: ?>
     <div class="readmore">
      <a target="_BLANK" href="<?php echo $item->get_permalink(); ?>" title="<?php echo $item->get_date('j F Y @ G:i'); ?>">Read more</a>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php endforeach; ?>
<?php
if(function_exists('fetch_feed')) {
  include_once(ABSPATH . WPINC . '/feed.php');               // hay que incluir esto
  $feed = fetch_feed('http://noticias.telemedellin.tv/tag/feriaflores/feed'); // el feed que queremos mostrar
  if(count($feed->errors) > 0){
    $limit = 0;
  }
  else {
    $limit = $feed->get_item_quantity(3); // especificamos el número de items a mostrar
    $items = $feed->get_items(0, $limit); // se crea un array con los items
  }
}
if ($limit == 0) echo '';
else foreach ($items as $item) : ?>
<div class="noticiaHome">
  <?php
  $img =  stristr ( $item->get_content() , "<img");
  $second = strpos($img, ">");
  $img = substr($img, 0, $second);
  $src = substr($img, strpos($img, "src=") + 5 ) ;
  $params = preg_split('[\"|\']', $src, 2);
  if($params[0] == "" || $params[0] == "/" || $params[0] == " "){
    $src = get_template_directory_uri() . "/images/genericaFeed.jpg";
  }
  else{
    $src = $params[0];
  }
  ?>
  <img src="<?php echo $src ?>" width="200" height="130" class="img-rounded" />
  <h2><?php echo $item->get_title(); ?></h2>
  <div class="linea hidden-phone"></div>
  <p><?php echo substr(strip_tags ($item->get_content()), 0, 200) ?>...</p>
  <div class="links">
    <div class="redes">
      <span class="twitter">
        <a href="https://twitter.com/share?text=<?php echo $item->get_title(); ?>&url=<?php echo $item->get_permalink(); ?>" target="_blank">
          Twitter
        </a>
      </span>
      <span class="facebook">
        <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo $item->get_permalink(); ?>&amp;p[title]=<?php echo $item->get_title(); ?>&amp;p[summary]=<?php echo substr(strip_tags ($item->get_content()), 0, 200) ?>">
          Facebook
        </a>
      </span>
    </div>
    <div class="vermas">
      <a target="_BLANK" href="<?php echo $item->get_permalink(); ?>" title="<?php echo $item->get_date('j F Y @ G:i'); ?>">Ver más</a>
    </div>
  </div>
</div>
<?php endforeach; ?>
