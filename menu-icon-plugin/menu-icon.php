<?php
/**
* Plugin Name: Menu Icon Plugin
* Plugin URI: https://www.example.com/
* Description: This plugin allows users to add SVG icons to menu items in the header.
* Version: 0.1
* Author: Shivani Gupta
* Author URI: https://www.example.com/
* Text Domain: menu-icon
**/

register_activation_hook(__FILE__, 'custom_plugin_activate');
register_deactivation_hook(__FILE__, 'custom_plugin_deactivate');

function custom_plugin_activate() {
    // Activation tasks if needed
}

function custom_plugin_deactivate() {
    // Deactivation tasks if needed
}

require_once plugin_dir_path(__FILE__) . 'admin/class-admin.php';
require_once plugin_dir_path(__FILE__) . 'public/class-public.php';
