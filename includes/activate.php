<?php

function up_activate_plugin() {
    
  if(version_compare(get_bloginfo('version'), '6.0', '<')) {
    wp_die(
      __('You must updated WordPress to use this plugin', 'hard-work-erp')
    );
  }

  up_recipe_post_type();
  flush_rewrite_rules();

  // this var helpls us interact with the database
  global $wpdb;
  $tableName = "{$wpdb -> prefix}recipe_rating";
  $charsetCollate = $wpdb -> get_charset_collate();

  $sql = "
  CREATE TABLE {$tableName} (
    ID bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    post_id bigint(20) unsigned NOT NULL,
    user_id bigint(20) unsigned NOT NULL,
    rating float(3,2) unsigned NOT NULL
  ) ENGINE='InnoDB' {$charsetCollate};
  ";
  // includes file that contains wordpress instalation
  require_once(ABSPATH . "/wp-admin/includes/upgrade.php");
  dbDelta( $sql );
  // option name saved in db
  $options = get_option('up_options');
  
  if(!$options){
    // adds new record to wp_options
    add_option('up_options', [
      'og_title' => get_bloginfo('name'),
      'og_img' => '',
      'og_description' => get_bloginfo('description'),
      'enable_og' => 1
    ]);
  }
}