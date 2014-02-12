
<?php if (!is_super_admin()) { wp_die(__( 'No permission')); } ?>

<!-- Moot settings -->
<style>
   #moot-settings { font-size: 120%; margin: 50px; }
   #moot-settings h2 { margin-bottom: .5em; }
   #moot-settings label { display: block; margin-bottom: 1em; }
   #moot-settings strong { display: block; margin-left: .2em; }
   #moot-settings input[type=text] { padding: .4em; }
   #moot-settings .submit { padding: 0; }
   #saved { background-color: #333; color: #fff; padding: .4em; border-radius: 4px; display: none; }
   #no-sso { margin-top: 3em; border-top: 1px solid #ddd; }
</style>

<div class="wrap" id="moot-settings">

   <img src="//moot.it/m/img/apple-touch-icon-57x57-precomposed.png">

   <h2>Moot settings</h2>

   <form method="post" action="options.php">

      <?php
         settings_fields('moot_options');
         do_settings_fields('moot_options', true);
         $forumname = get_option('moot_forum_name');
         $key = get_option('moot_api_key');
      ?>

      <label>
         <strong>Forum name</strong>
         <input type="text" name="moot_forum_name" value="<?php echo $forumname; ?>" size="15">
      </label>

      <?php if ($forumname) { ?>

      <label>
         <strong>Language</strong>
         <select name="moot_language" id="moot_language">
            <option value="ar">Arabic</option>
            <option value="pt-br">Brazil Portuguese</option>
            <option value="bg">Bulgarian</option>
            <option value="ch">Chinese</option>
            <option value="tw">Chinese / Taiwan</option>
            <option value="nl">Dutch</option>
            <option value="en">English</option>
            <option value="fi">Finnish</option>
            <option value="fr">French</option>
            <option value="de">German</option>
            <option value="hu">Hungarian</option>
            <option value="he">Hebrew</option>
            <option value="id">Indonesian</option>
            <option value="ja">Japanese</option>
            <option value="ko">Korean</option>
            <option value="pl">Polish</option>
            <option value="ru">Russian</option>
            <option value="es">Spanish</option>
            <option value="se">Swedish</option>
            <option value="ta">Tamil</option>
            <option value="tr">Turkish</option>
         </select>
      </label>

      <label>
         <input type="checkbox" name="moot_generate" value="true"
            <?php if (get_option('moot_generate') == "true") echo "checked"; ?> >
         Automatically use Moot commenting on posts
      </label>

      <label>
         <input type="checkbox" name="moot_comments_under_forums" value="true"
            <?php if (get_option('moot_comments_under_forums') == "true") echo "checked"; ?> >
         Display "Comments"- link on forum sidebar
      </label>

      <?php if (!$key) { ?>

         <div id="no-sso">
            <h3>Single Sign-On</h3>

            <p>
               <a href="https://moot.it/upgrade" target="_new">Upgrade Moot</a> to use the Wordpress login.
               Users will only enter the login information once.
            </p>
         </div>

      <?php } ?>

      <label>
         <strong>API key</strong>
         <input type="text" name="moot_api_key" value="<?php echo $key; ?>" size="15">
      </label>

      <label>
         <strong>Secret key</strong>
         <input type="text" name="moot_secret_key" value="<?php echo get_option('moot_secret_key'); ?>" size="25">
      </label>

      <?php } else { ?>

      <p>New to Moot? <a href="https://moot.it/setup" target="_new">Create a new forum&hellip;</a></p>

      <?php } ?>

      <?php submit_button(); ?>

      <p id="saved">The settings have been saved</p>

   </form>

</div>

<script>
if (/updated=true/.test(location.search)) {
   var msg = jQuery("#saved").css("display", "inline-block");
   setTimeout(function() { msg.hide(); }, 2000);
}

jQuery("#moot_language").val("<?php echo get_option('moot_language'); ?>" || 'en')
</script>


