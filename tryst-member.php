<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://matteus.dev
 * @since             1.1.0
 * @package           Tryst_Member
 *
 * @wordpress-plugin
 * Plugin Name:       Tryst Member
 * Plugin URI:        https://matteus.dev/tryst
 * Description:       Member support for Tryst
 * Version:           1.1.0
 * Author:            Matteus Barbosa
 * Author URI:        https://matteus.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tryst-member
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TRYST_MEMBER_VERSION', '1.1.0' );


//loads composer and dependencies
require __DIR__ . '/vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tryst-member-activator.php
 */
function activate_tryst_member() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tryst-member-activator.php';
	Tryst_Member_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tryst-member-deactivator.php
 */
function deactivate_tryst_member() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tryst-member-deactivator.php';
	Tryst_Member_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tryst_member' );
register_deactivation_hook( __FILE__, 'deactivate_tryst_member' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tryst-member.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tryst_member() {

	global $tryst_member_plugin;

		$tryst_member_plugin = new Tryst_Member();
		$tryst_member_plugin->run();

}
run_tryst_member();
