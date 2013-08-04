<?php
/*
 * Plugin Name:   Moot Forums and Commenting
 * Plugin URI:    https://moot.it/docs/wordpress
 * Description:   The new-wave commenting and forums for Wordpress
 * Version:       2.0.0
 * Author:        Moot Inc
 * Author URI:    https://moot.it
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