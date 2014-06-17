<?php
/*
Plugin Name: Botnet Attack Blocker
Plugin URI: http://cheesefather.com/2013/04/wordpress-distributed-botnet-attack-blocker/
Description: Temporarily block all admin logins after multiple failed attempts - helps to prevent brute force botnet attacks from multiple IP addresses.
Version: 1.7
Author: Misha von Bennigsen
Author URI: http://www.mish.tv
License: GPL2
*/

# globals
global $bab_db_version;
$bab_db_version = '1.0';

# create table and set options on plugin install
function bab_install() {
global $wpdb;
global $bab_db_version;
$table_name = $wpdb->prefix . 'botnetblocker';
$sql = "CREATE TABLE IF NOT EXISTS `".$table_name."` (`id` int(6) NOT NULL auto_increment,`ip_address` varchar(15) NOT NULL,`timestamp` varchar(10) NOT NULL,PRIMARY KEY (`id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Botnet Attack Blocker database' AUTO_INCREMENT=1";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
add_option("bab_db_version", $bab_db_version);
$bab_options = array(
'table_name' => $table_name,
'num_fails' => 5, //maximum value is 127
'grace_period_secs' => 300, //300 seconds is 5 minutes
'block_period_secs' => 3600, //3600 seconds is 60 minutes
'whitelist_ip' => '');
add_option("bab_options", $bab_options);
} //function
register_activation_hook(__FILE__, 'bab_install');

# delete table and options on plugin deactivate
function bab_uninstall() {
global $wpdb;
global $bab_db_version;
delete_option("bab_db_version");
delete_option("bab_options");
$table_name = $wpdb->prefix . 'botnetblocker';
$sql = "DROP TABLE `".$table_name."`";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
} //function
register_deactivation_hook(__FILE__, 'bab_uninstall');

# add credit to login page - removed as per Wordpress guidelines
/*
add_action('login_form', 'bab_credit_link');
function bab_credit_link(){
echo '<p>Secured with <a href="http://cheesefather.com/" target="_blank">Botnet Attack Blocker</a><br /><br /><br /></p>';
} //function
*/

# load languages
function bab_init() {
load_plugin_textdomain('botnet-attack-blocker', false, basename(dirname(__FILE__ )).'/languages');
} //function
add_action('plugins_loaded', 'bab_init');

# hook into login page and block if logged requisite number of fails and still within block_period_secs
function bab_login_init() {
global $wpdb;
$bab_options = get_option("bab_options");
	if ($bab_options['whitelist_ip'] != '') {
	$whitelist_string = str_replace(array(',', ' '), '-|-', $bab_options['whitelist_ip']);
	$whitelist_array = explode('-|-', $whitelist_string);
		foreach ($whitelist_array as $whitelist_ip) {
			if (strpos($_SERVER['REMOTE_ADDR'], trim($whitelist_ip)) !== false) return; //exit if whitelisted
		} //foreach
	} //if whitelisted ips
$fails = $wpdb->get_results("SELECT timestamp FROM ".$bab_options['table_name']." ORDER BY timestamp DESC");
	if ($wpdb->num_rows >= $bab_options['num_fails'] && (($fails[0]->timestamp + $bab_options['block_period_secs']) >= time())) {
	echo '&#10008; ';
	_e('Too many login failures, you are temporarily blocked', 'botnet-attack-blocker');
	die(); //everyone blocked
	} //if blocked
} //function
add_action('login_init', 'bab_login_init');

# hook into login check and log failures to db - if past grace_period_secs of last fail start counting again (empty table)
function bab_login_failed() {
global $wpdb;
$bab_options = get_option("bab_options");
$last_ts = $wpdb->get_var("SELECT timestamp FROM ".$bab_options['table_name']." ORDER BY timestamp DESC LIMIT 1");
	if (($last_ts + $bab_options['grace_period_secs']) < time()) $wpdb->query("DELETE FROM ".$bab_options['table_name']);
$wpdb->insert($bab_options['table_name'], array('ip_address' => $_SERVER['REMOTE_ADDR'], 'timestamp' => time()), array('%s', '%d'));
} //function
add_action('wp_login_failed', 'bab_login_failed');

# show admin menu
function bab_admin_menu() {
add_options_page('Botnet Attack Blocker', 'Botnet Blocker', 'manage_options', 'bab', 'bab_show_page'); 
} //function
add_action('admin_menu', 'bab_admin_menu');

# show admin page
function bab_show_page() {
global $wpdb;
$bab_options = get_option("bab_options");
echo '<div class="wrap">
<div class="icon32" id="icon-options-general"><br /></div>
<h2>Botnet Attack Blocker</h2>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
	jQuery("#bab_update").click(function() {
		var data = {
			action: "bab_action",
			num_fails: $("#num_fails").val(),
			grace_period_secs: $("#grace_period_secs").val(),
			block_period_secs: $("#block_period_secs").val(),
			whitelist_ip: $("#whitelist_ip").val()
		};
		jQuery.post(ajaxurl, data, function(response) {
		$("#bab_callback").html(response).show(200).delay(1000).hide(200);
		});
	return false;
	});
});
</script>
<p>';
_e('Distributed botnet attacks can come from multiple IP addresses and locations, so conventional IP-based lockouts are not effective.', 'botnet-attack-blocker');
echo '<br />';
_e('Please set the following options as required to increase your security against these types of attacks.', 'botnet-attack-blocker');
echo '</p>
<form name="bab_options" id="bab_options" method="post">
<h2>';
_e('After', 'botnet-attack-blocker');
echo ' <select name="num_fails" id="num_fails">';
	for ($n=1;$n<=30;$n++) {
	echo '<option value="'.$n.'"';
		if ($n == $bab_options['num_fails']) echo ' selected';
	echo '>'.$n.'</option>'."\n";
	} //for
echo '</select> ';
_e('login failures', 'botnet-attack-blocker');
echo ',<br />';
_e('each within', 'botnet-attack-blocker');
echo ' <select name="grace_period_secs" id="grace_period_secs">';
	for ($g=60;$g<=1800;$g+=60) {
	echo '<option value="'.$g.'"';
		if ($g == $bab_options['grace_period_secs']) echo ' selected';
	echo '>'.($g/60).'</option>'."\n";
	} //for
echo '</select> ';
_e('minutes of each other', 'botnet-attack-blocker');
echo ',<br />';
_e('block all login attempts for', 'botnet-attack-blocker');
echo ' <select name="block_period_secs" id="block_period_secs">';
	for ($b=300;$b<=3300;$b+=300) {
	echo '<option value="'.$b.'"';
		if ($b == $bab_options['block_period_secs']) echo ' selected';
	echo '>'.($b/60).' ';
	_e('minutes', 'botnet-attack-blocker');
	echo '</option>'."\n";
	} //for
	for ($b2=3600;$b2<=18000;$b2+=3600) {
	echo '<option value="'.$b2.'"';
		if ($b2 == $bab_options['block_period_secs']) echo ' selected';
	echo '>'.($b2/3600).' ';
		if ($b2 > 3600) _e('hours', 'botnet-attack-blocker');
		else _e('hour', 'botnet-attack-blocker');
	echo '</option>'."\n";
	} //for
echo '</select>,<br />';
_e('except from IP address(es)', 'botnet-attack-blocker');
echo ' <input type="text" name="whitelist_ip" id="whitelist_ip" value="'.$bab_options['whitelist_ip'].'" />.</h2>
<br />
<input type="submit" name="bab_update" id="bab_update" value="';
_e('UPDATE', 'botnet-attack-blocker');
echo '" class="button button-primary button-large" /> <span id="bab_callback" style="display:none;"></span>
<br /><br />';
_e('Current status', 'botnet-attack-blocker');
echo ': ';
$fails = $wpdb->get_results("SELECT timestamp FROM ".$bab_options['table_name']." ORDER BY timestamp DESC");
	if ($wpdb->num_rows >= $bab_options['num_fails'] && (($fails[0]->timestamp + $bab_options['block_period_secs']) >= time())) {
	echo '&#10008; ';
	_e('blocked', 'botnet-attack-blocker');
	echo ' (';
	_e('will be released in', 'botnet-attack-blocker');
	echo ' '.(($fails[0]->timestamp + $bab_options['block_period_secs']) - time()).' ';
	_e('seconds', 'botnet-attack-blocker');
	echo ')';
	} //if blocked
	else {
	echo '&#10004; ';
	_e('not blocked', 'botnet-attack-blocker');
		if (($fails[0]->timestamp + $bab_options['grace_period_secs']) <= time()) {
		echo ' (';
		_e('no failed attempts in last', 'botnet-attack-blocker');
		echo ' '.$bab_options['grace_period_secs'].' ';
		_e('seconds', 'botnet-attack-blocker');
		echo ')';
		} //if
		else {
		echo ' ('.$wpdb->num_rows.' ';
		_e('failed attempts', 'botnet-attack-blocker');
		echo ', ';
		_e('last one', 'botnet-attack-blocker');
		echo ' '. (time() - $fails[0]->timestamp) .' ';
		_e('seconds ago', 'botnet-attack-blocker');
		echo ')';
		} //else
	} //else
echo '</form>';
} //function

# ajax update options
function bab_action_callback() {
global $wpdb;
$table_name = $wpdb->prefix . 'botnetblocker';
$bab_options = array(
'table_name' => $table_name,
'num_fails' => $_POST['num_fails'],
'grace_period_secs' => $_POST['grace_period_secs'],
'block_period_secs' => $_POST['block_period_secs'],
'whitelist_ip' => $_POST['whitelist_ip']);
	if (update_option("bab_options", $bab_options)) {
	echo '<span style="color:green;">&#10004; ';
	_e('settings updated', 'botnet-attack-blocker');
	echo '</span>';
	} //if
	else {
	echo '<span style="color:red;">&#10008; ';
	_e('update failed', 'botnet-attack-blocker');
	echo '</span>';
	} //else
die();
} //function
add_action('wp_ajax_bab_action', 'bab_action_callback');

?>