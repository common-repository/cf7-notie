<?php

/**
 *
 * @link              http://www.fabbricaweb.com.br
 * @since             1.1
 * @package           Cf7_notie
 *
 * @wordpress-plugin
 * Plugin Name:       CF7 Notie
 * Description:       Display Contact Form 7 response messages as an alternative the standard alert dialog.
 * Version:           1.1
 * Author:            FabbricaWeb
 * Author URI:        http://www.fabbricaweb.com.br
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cf7_notie
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cf7_notie-activator.php
 */
function activate_cf7_notie() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cf7_notie-activator.php';
	Cf7_notie_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cf7_notie-deactivator.php
 */
function deactivate_cf7_notie() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cf7_notie-deactivator.php';
	Cf7_notie_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cf7_notie' );
register_deactivation_hook( __FILE__, 'deactivate_cf7_notie' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cf7_notie.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0
 */
function run_cf7_notie() {

	$plugin = new Cf7_notie();
	$plugin->run();

}
run_cf7_notie();
