<?php

/*
 * Plugin Name:       Udemy Plus
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       A plugin for adding blocks to a theme.
 * Version:           1.10.3
 * Requires at least: 6.0
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       udemy-plus
 * Domain Path:       /languages
 */

// the following function helps us find functions
 if(!function_exists('add_action')){
    echo 'Seems like you stumbled here by accident.';
    exit;
 }

 // Setup
define('UP_PLUGIN_DIR', plugin_dir_path( __FILE__ ));

 // Includes
 include(UP_PLUGIN_DIR . 'includes/register-blocks.php');

 // Hooks
 add_action( 'init', 'up_register_blocks' );