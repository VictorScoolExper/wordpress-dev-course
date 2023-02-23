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
 // glob or global will be used to get all files
 $rootFiles = glob(UP_PLUGIN_DIR . 'includes/*.php');
 $subdirectoryFiles = glob(UP_PLUGIN_DIR . 'includes/**/*.php');
 $allFiles = array_merge($rootFiles, $subdirectoryFiles);

 foreach($allFiles as $filename){
   include_once($filename); // avoid duplicate errors
 }

 //print_r($subdirectoryFiles); //print has to be used when showing arrays, can be done with echo

//  include(UP_PLUGIN_DIR . 'includes/register-blocks.php');
//  include(UP_PLUGIN_DIR . 'includes/blocks/search-form.php');
//  include(UP_PLUGIN_DIR . 'includes/blocks/page-header.php');


 // Hooks
 add_action( 'init', 'up_register_blocks' );


