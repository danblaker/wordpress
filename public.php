
<style>
/* Hide default comments in place for Moot: https://moot.it */
.comments-link, #comment-wrap, #comments, #recent-comments-2, a[href*=comments-rss], a[href*='comments/feed'] {
   display: none !important;
}
.moot { max-width: 100%; }
.moot p { margin-bottom: 0; }
.moot h2, .moot h3 { margin: 0; clear: none; }
.moot .m-title { line-height: 1.1; margin: 0; }
.moot .m-pagetitle { margin: 0 0 .6em; }
</style>

<?php

   $key = get_option('moot_api_key');

   // Single Sign-On enabled
   if ($key) {
      $timestamp = time();

      $user_info = wp_get_current_user();

      $display_name = $user_info->user_firstname ?
         $user_info->user_firstname . " " . $user_info->user_lastname :
         $user_info->display_name
      ;

      $avatar = is_callable(bp_core_fetch_avatar) ?
         bp_core_fetch_avatar(array(item_id => $user_info->ID, 'html' => false)) :
         "//gravatar.com/avatar/" . md5($user_info->user_email)
      ;

      $sso = array(
         "user" => array(
            "id" => $user_info->user_login,
            "email" => $user_info->user_email,
            "avatar" => $avatar,
            "displayname" => $display_name,
            "is_admin" => current_user_can('level_10')
         )
      );

      // echo json_encode($sso);

      $message = base64_encode(json_encode($sso));
      $signature = sha1(get_option('moot_secret_key') . ' ' . $message . ' ' . $timestamp);
   }

?>

<script>
!function($) {

   $(function() {

      var moot_conf = "<?php echo $key; ?>" ? {
         sso: {
            key: '<?php echo $key; ?>',
            timestamp: <?php echo $timestamp; ?>,
            signature: '<?php echo $signature; ?>',
            message: '<?php echo $message; ?>'
         }
      } : {};

      var default_moot = $("#moot-comments"),
         user_moot = $("#moot");

      if (user_moot[0]) {
         user_moot.moot(moot_conf);
         default_moot.remove();

      } else {
         default_moot.moot(moot_conf);
      }

   })

}(jQuery)

</script>
