<?php
/*
 * Plugin Name:       Form Plugin
 * Plugin URI:        https://github.com/annawerno/annawerno-form-plugin
 * Description:       Plugin version of the feedback form
 * Version:           1.0
 * Author:            Anna Werno
 * Author URI:        https://annawerno.co.uk/
 * Text Domain:       annawerno-form-plugin
*/

add_action('admin_menu', 'register_menu_form_entries');

function register_menu_form_entries() {
    add_menu_page(
        'Form Entry',
        'Form Entries',
        'manage_options',
        'form-entries',
        'render_form_entries',
        'dashicons-list-view',
        25
    );
}

/**
 * Activate the plugin.
 */
function pluginprefix_activate() { 
	// Trigger our function that registers the custom post type plugin.
	register_menu_form_entries(); 
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'pluginprefix_activate' );