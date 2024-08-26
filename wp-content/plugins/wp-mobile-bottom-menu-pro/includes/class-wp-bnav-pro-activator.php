<?php
require_once 'class-wp-bnav-pro-settings.php';
/**
 * Fired during plugin activation
 *
 * @link       https://boomdevs.com/
 * @since      1.0.0
 *
 * @package    Wp_Bnav_Pro
 * @subpackage Wp_Bnav_Pro/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Bnav_Pro
 * @subpackage Wp_Bnav_Pro/includes
 * @author     BOOM DEVS <contact@boomdevs.com>
 */
class Wp_Bnav_Pro_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	public static function activate() {
        $current_settings = Wp_Bnav_Pro_Settings::get_settings();
        foreach (Wp_Bnav_Pro_Settings::$default_settings as $key => $value) {
            if (!array_key_exists($key, $current_settings)) {
                $current_settings[$key] = $value;
            }
        }
        update_option( Wp_Bnav_Pro_Settings::$option_key, $current_settings );

        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object( $locations[ 'bnav_bottom_nav' ] );
        $menuitems = wp_get_nav_menu_items( $menu->term_id);

        foreach ($menuitems as $menu) {
            $meta_data = get_post_meta($menu->ID, 'wp-bnav-menu', true);
            foreach (Wp_Bnav_Pro_Settings::$default_menu_meta_settings as $key => $menu_settings) {
                if(!array_key_exists($key, $meta_data)) {
                    $meta_data[$key] = $menu_settings;
                }
            }
            update_post_meta($menu->ID, 'wp-bnav-menu', $meta_data);
        }
	}
}