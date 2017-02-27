<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://junjunvergara-manpowwa.com
 * @since             1.0.0
 * @package           Whaa
 *
 * @wordpress-plugin
 * Plugin Name:       Wha
 * Plugin URI:        https://junjunvergara-manpowwa.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Wha Wha
 * Author URI:        https://junjunvergara-manpowwa.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       whaa
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-whaa-activator.php
 */
function activate_whaa() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-whaa-activator.php';
	Whaa_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-whaa-deactivator.php
 */
function deactivate_whaa() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-whaa-deactivator.php';
	Whaa_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_whaa' );
register_deactivation_hook( __FILE__, 'deactivate_whaa' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-whaa.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_whaa() {

	$plugin = new Whaa();
	$plugin->run();

}
run_whaa();
