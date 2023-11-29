<?php
/**
 * Plugin Name:       Form Emails
 * Plugin URI:        https://rightroaddigital.com
 * Description:       Stores emails from form to Database
 * Version:           1.5.0
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            Liam Kneedy
 * Author URI:        https://rightroaddigital.com
 * Text Domain:       form-emails
 * Domain Path:       /languages
 */

if(!function_exists('add_action')) {
    echo 'Seems like you stumbled here by accident. 😝';
exit;
}

// Setup
define('UP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('UP_PLUGIN_FILE', __FILE__);

// Includes
$rootFiles = glob(UP_PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(UP_PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach($allFiles as $filename) {
    include_once($filename);

}

register_activation_hook(__FILE__, 'rrd_activate_plugin');
add_action('rest_api_init', 'rrd_rest_api_init');
add_action('init', 'rrd_register_email_form_post_type');
add_action('services-required_add_form_fields', 'rrd_sr_add_form_fields');
add_action('create_services-required', 'rrd_save_cuisine_meta');