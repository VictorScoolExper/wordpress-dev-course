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

// Adding bootstrap files for block use, since using npm did not work
// Check for alternatives solutions
function bootstrap_plugin_scripts() {
  wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css', array(), '5.3.0', 'all' );
  wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN', array('jquery'), '5.3.0', true);
  wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css', array(), '1.10.3', 'all' );
  wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"', array( 'jquery' ), '2.11.6', true );
}
add_action( 'admin_enqueue_scripts', 'bootstrap_plugin_scripts' );

 // Hooks
 add_action( 'init', 'up_register_blocks' );
 add_action('rest_api_init', 'up_rest_api_init');
 add_action('wp_enqueue_scripts', 'up_enqueue_scripts'); //files related to the front end


