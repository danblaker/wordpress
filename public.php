
<!-- Use Moot instead of Wordpress for comments | https://moot.it */ -->
<style>
  .has-moot .comments-link,
  .has-moot #comment-wrap,
  .has-moot #comments,
  .has-moot #recent-comments-2,
  .has-moot a[href*=comments-rss],
  .has-moot a[href*='comments/feed'],
  .home-page #moot {
    display: none !important;
  }
  .moot { max-width: 100%; margin-bottom: 2em; }
  .moot p { margin-bottom: 0; }
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

    // userpro (bit.ly/1ckc3es) stores avatar URL to user_meta
    $avatar = get_user_meta($user_info->ID, 'profilepicture', true);

    if (!$avatar) {
      $avatar = function_exists('bp_core_fetch_avatar') ?
        bp_core_fetch_avatar(array(item_id => $user_info->ID, 'html' => false)) :
        "//gravatar.com/avatar/" . md5($user_info->user_email)
      ;
    }

    $sso = array(
      "user" => array(
        "id" => $user_info->user_login,
        "email" => $user_info->user_email,
        "avatar" => $avatar,
        "displayname" => $display_name,
        "is_admin" => is_super_admin()
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

  <?php if (get_option('moot_generate') == "true") { ?>
    $("body").addClass("has-moot");
  <?php } ?>

  if (typeof moot != "function") return $("#moot").remove();

  <?php if (get_option('moot_comments_under_forums')) { ?>
    moot(function(app) {
      if (app.is_forum) {
        $(".m-forums").append('<p><a href="#!/wordpress">Comments</a></p>');
      }
    })
  <?php } ?>

  <?php if ($key) { ?>
    var moot_conf = {
      login_url: '<?php echo wp_login_url(get_permalink()); ?>',
      sso: {
        key: '<?php echo $key; ?>',
        timestamp: <?php echo $timestamp; ?>,
        signature: '<?php echo $signature; ?>',
        message: '<?php echo $message; ?>'
      }
    }
  <?php } else { ?>
    var moot_conf = {};

  <?php } ?>

  var default_moots = $("a[id='moot-default-comments']"),
    user_moot = $("#moot");

  if ($("#no-moot")[0]) return default_moot.remove();

  // no support multiple instances yet
  if (default_moots[1]) {
    default_moots.remove();

  } else if (user_moot[0]) {
    user_moot.moot(moot_conf);
    default_moots.remove();

  } else {
    default_moots.moot(moot_conf);
  }

  if (moot()) $("body").addClass("has-moot");

})

}(jQuery)

</script>
