<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              mediafairplay.com
 * @since             1.0.0
 * @package           Mfp_Test
 *
 * @wordpress-plugin
 * Plugin Name:       mfp test
 * Plugin URI:        mediafairplay.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Gal MFP
 * Author URI:        mediafairplay.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mfp-test
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mfp-test-activator.php
 */
function activate_mfp_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mfp-test-activator.php';
	Mfp_Test_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mfp-test-deactivator.php
 */
function deactivate_mfp_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mfp-test-deactivator.php';
	Mfp_Test_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mfp_test' );
register_deactivation_hook( __FILE__, 'deactivate_mfp_test' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mfp-test.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mfp_test() {

	$plugin = new Mfp_Test();
	$plugin->run();

}
run_mfp_test();

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/mfpDevForce/readmore/',
	__FILE__,
	'mfp-test'
);

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('93b0452f4ec37010234d7d8205524ff7d9ef1167');

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');