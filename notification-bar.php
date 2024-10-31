<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Notification Top Bar
 * Plugin URI:        http://plugin-boutique.com/notification-top-bar/
 * Description:       Responsive Notification top & alert bar. Use for: Newsletter, social media, notification, call to action, video, countdown. 50+ customizable options.
 * Version:           1.0
 * Author:            Notificator
 * Author URI:        http://plugin-boutique.com/notification-top-bar/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Plugin directory
if ( !defined( 'MTSNB_PLUGIN_DIR') )
    define( 'MTSNB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if ( !defined( 'MTSNB_PLUGIN_URL') )
    define( 'MTSNB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( !defined( 'MTSNB_PLUGIN_BASE') )
    define( 'MTSNB_PLUGIN_BASE', plugin_basename(__FILE__) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mts-notification-bar-activator.php
 */
function activate_mts_notification_bar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mts-notification-bar-activator.php';
	MTSNB_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mts-notification-bar-deactivator.php
 */
function deactivate_mts_notification_bar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mts-notification-bar-deactivator.php';
	MTSNB_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mts_notification_bar' );
register_deactivation_hook( __FILE__, 'deactivate_mts_notification_bar' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mts-notification-bar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mts_notification_bar() {

	$plugin = new MTSNB();
	$plugin->run();

}
run_mts_notification_bar();