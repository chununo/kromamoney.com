<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://boomdevs.com/
 * @since             1.0.0
 * @package           Wp_Bnav_Pro
 *
 * @wordpress-plugin
 * Plugin Name:       WP Mobile Bottom Menu Pro
 * Plugin URI:        https://boomdevs.com/products/wp-mobile-bottom-menu/
 * Description:       The premium add-on for WP Mobile Bottom Menu.
 * Version:           1.0.5
 * Author:            BOOM DEVS
 * Author URI:        https://boomdevs.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-bnav-pro
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
define( 'WP_BNAV_PRO_VERSION', '1.0.5' );
define( 'WP_BNAV_PRO_PATH', plugin_dir_path( __FILE__ ) );
define( 'WP_BNAV_PRO_URL', plugin_dir_url( __FILE__ ) );

require __DIR__ . '/vendor/autoload.php';

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function wp_bnav_pro_init_tracker()
{

    if (!class_exists('SureCart\Licensing\Client')) {
        require_once __DIR__ . '/sdk/src/Client.php';
    }

    // initialize client with your plugin name and your public token.
    $client = new \SureCart\Licensing\Client('WP Mobile Bottom Menu Pro', 'pt_nCkEw915TkBja1y4s5EGmwjx', __FILE__);

    // set your textdomain.
    $client->set_textdomain('wp-bnav-pro');

    // add the pre-built license settings page.
    $client->settings()->add_page(
        [
            'type' => 'submenu', // Can be: menu, options, submenu.
            'parent_slug' => 'options-general.php', // add your plugin menu slug.
            'page_title' => __( 'WP Mobile Bottom Menu Pro License', 'wp-bnav-pro'),
            'menu_title' => __( 'WP Mobile Bottom Menu Pro License', 'wp-bnav-pro'),
            'capability' => 'manage_options',
            'menu_slug' => 'wp-bnav-pro-license',
            'icon_url' => '',
            'position' => 6,
            'activated_redirect'   => admin_url( '/customize.php' ), // should you want to redirect on activation of license.
            'deactivated_redirect' => admin_url( 'admin.php?page=wp-bnav-pro-license&deactivated=true'), // Should you want to redirect on deactivation of license.
        ]
    );
}

wp_bnav_pro_init_tracker();

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-bnav-pro-activator.php
 */
function activate_wp_bnav_pro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-bnav-pro-activator.php';
	Wp_Bnav_Pro_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-bnav-pro-deactivator.php
 */
function deactivate_wp_bnav_pro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-bnav-pro-deactivator.php';
	Wp_Bnav_Pro_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_bnav_pro' );
register_deactivation_hook( __FILE__, 'deactivate_wp_bnav_pro' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-bnav-pro.php';


// Register activation hook for redirect to activation license page
function wp_bnav_pro_licence_redirect_url() {
    if(get_option('bnav_do_activation_redirect')) {
        delete_option('bnav_do_activation_redirect');
        wp_redirect( admin_url( '/options-general.php?page=wp-bnav-pro-license' ) );
        exit;
    }
}

register_activation_hook(__FILE__, 'bnav_license_activate');

function bnav_license_activate() {
    add_option('bnav_do_activation_redirect', true);
}

add_action('admin_init', 'wp_bnav_pro_licence_redirect_url');


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_bnav_pro() {
    if ( ! did_action( 'wp_bnav/loaded' ) ) {
        // Show notice to install free version
        add_action( 'admin_notices', 'wp_bnav_pro_missing_deps' );
    } else {
        $activation_key = get_option('wpmobilebottommenupro_license_options');
        if($activation_key && count($activation_key) > 0 && isset($activation_key['sc_license_key']) && $activation_key['sc_license_key'] !== '') {
            $plugin = new Wp_Bnav_Pro();
            $plugin->run();
        }
    }
}
add_action( 'plugins_loaded', 'run_wp_bnav_pro', 1 );

/**
 * Generate missing dependency message alert.
 */
function wp_bnav_pro_missing_deps() {
    $message = sprintf(
        __( 'You must install and activate %s to use %s. %s.', '' ),
        '<strong>' . __( 'WP Mobile Bottom Menu', 'wp-bnav-pro' ) . '</strong>',
        '<strong>' . __( 'WP Mobile Bottom Menu Pro', 'wp-bnav-pro' ) . '</strong>',
        '<br><a href="' . esc_url( admin_url( 'plugin-install.php?s=WP%20Mobile%20Bottom%20Menu&tab=search&type=term' ) ) . '">' . __( 'Click here to install or activate WP Mobile Bottom Menu', 'wp-bnav-pro' ) . '</a>'
    );

    printf( '<div class="notice notice-warning is-dismissible"><p style="padding: 15px 0">%1$s</p></div>', $message );
}