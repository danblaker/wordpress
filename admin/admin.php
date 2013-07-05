
<!-- Moot settings -->
<style>
   #moot-settings { font-size: 120%; margin: 50px; }
   #moot-settings h2 { margin-bottom: .5em; }
   #moot-settings label { display: block; margin-bottom: 1em; }
   #moot-settings strong { display: block; margin-left: .2em; }
   #moot-settings input[type=text] { padding: .4em; }
   #moot-settings .submit { padding: 0; }
   #saved { background-color: #333; color: #fff; padding: .4em; border-radius: 4px; display: none; }
</style>

<div class="wrap" id="moot-settings">

   <img src="//moot.it/m/img/apple-touch-icon-57x57-precomposed.png">

   <h2>Moot settings</h2>

   <form method="post" action="options.php">

      <?php settings_fields('moot_options'); do_settings_fields('moot_options', true); ?>

      <label>
         <strong>Forum name</strong>
         <input type="text" name="moot_forum_name" value="<?php echo get_option('moot_forum_name'); ?>" size="15">
      </label>

      <label>
         <strong>API key</strong>
         <input type="text" name="moot_api_key" value="<?php echo get_option('moot_api_key'); ?>" size="15">
      </label>

      <label>
         <strong>Secret key</strong>
         <input type="text" name="moot_secret_key" value="<?php echo get_option('moot_secret_key'); ?>" size="25">
      </label>

      <?php submit_button(); ?>

      <p id="saved">The settings have been saved</p>

   </form>

</div>

<script>
if (/updated=true/.test(location.search)) {
   var msg = jQuery("#saved").css("display", "inline-block");
   setTimeout(function() { msg.hide(); }, 2000);
}
</script>


