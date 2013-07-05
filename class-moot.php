<?php
/**
 * The new-wave commenting and forums for Wordpress
 *
 * @package   Moot
 * @author    Tero Piirainen <tero@moot.it>
 * @license   MIT
 * @link      https://moot.it/docs/wordpress
 * @copyright 2013 Moot Inc
 */

class Moot {

   protected $version = '1.0.0';

   protected $plugin_slug = 'moot';

   protected static $instance = null;

   protected $plugin_screen_hook_suffix = null;


   private function __construct() {
      add_action('wp_enqueue_scripts', array($this, 'js_and_css'));
      add_action('wp_head', array($this, 'add_head'));
      add_filter('the_content', array($this, 'add_comments'));
      add_action('admin_menu', array($this, 'add_admin_menu'));
      add_action('admin_init', array($this, 'add_settings'));
      add_shortcode('moot-forum', array($this, 'forum_shortcode'));
   }


   public static function get_instance() {
      if (null == self::$instance) { self::$instance = new self; }
      return self::$instance;
   }

   public function add_head() {
      require_once(plugin_dir_path(__FILE__) . 'public.php');
   }

   public function js_and_css() {
      wp_enqueue_style("moot", '//cdn.moot.it/latest/moot.css', array(), $this->version);
      wp_enqueue_script("", '//cdn.moot.it/latest/moot.min.js', array('jquery'), $this->version);
   }

   public function add_comments($content) {
      $forumname = get_option('moot_forum_name');

      if ($forumname != null) {
         $page_id = sanitize_title(get_the_title());
         $content .= "<a id='moot-comments' href='https://moot.it/i/$forumname/wordpress/$page_id'>Comments</a>";
      }

      return $content;
   }

   public function add_settings($content) {
      register_setting('moot_options', 'moot_forum_name');
      register_setting('moot_options', 'moot_api_key');
      register_setting('moot_options', 'moot_secret_key');
   }

   // admin menu
   public function add_admin_menu() {
      $this->plugin_screen_hook_suffix = add_plugins_page(
         __('Moot', $this->plugin_slug),
         __('Moot', $this->plugin_slug),
         'read', $this->plugin_slug, array($this, 'render_admin')
      );
   }

   public function render_admin() {
      include_once('settings.php');
   }

   public function forum_shortcode() {
      $forumname = get_option('moot_forum_name');
      return "<a id='moot' href='https://moot.it/i/$forumname'>$forumname forums</a>";
   }

}