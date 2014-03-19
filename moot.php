<?php
/*
 * Plugin Name:   Moot
 * Plugin URI:    https://moot.it/docs/wordpress.html
 * Author URI:    https://moot.it
 * Description:   Realtime forums and commenting for WordPress
 * Version:       2.0.11
 * Author:        Moot Inc
 * Text Domain:   moot
 * License:       MIT
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }

require_once( plugin_dir_path( __FILE__ ) . 'class-moot.php' );

/*

// Register hooks
register_activation_hook( __FILE__, array( 'Moot', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Moot', 'deactivate' ) );

*/


Moot::get_instance();