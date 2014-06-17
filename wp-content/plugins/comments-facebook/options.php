<div class="wrap">
<h2>Comments Facebook</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('commentsfacebook'); ?>

<table class="form-table">

<tr valign="top">
<th scape="row">App Title:</th>
  <td><input type="text" name="web_app_title" value="<?php echo get_option('web_app_title'); ?>" /></td>
</tr>

<tr valign="top">
<th scope="row">App ID (Optional):</th>
<td><input type="text" name="web_app_id" value="<?php echo get_option('web_app_id'); ?>" /></td>
</tr>

<tr valign="top">
<th scape="row">App Width (px):</th>
  <td><input type="text" name="app_width" value="<?php echo get_option('app_width'); ?>" /></td>
</tr>

<tr valign="top">
<th scape="row">App Language (P. Ej. es_ES, en_US, etc.):</th>
  <td><input type="text" name="app_language" value="<?php echo get_option('app_language'); ?>" /></td>
</tr>

<tr valign="top">
<th scape="row">App Number of Post:</th>
  <td><input type="text" name="app_post" value="<?php echo get_option('app_post'); ?>" /></td>
</tr>

<tr valign="top">
<th scape="row"><b>NOTA:</b> Desactive the comments in your post and pages. (Optional)</th>
  <td></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
