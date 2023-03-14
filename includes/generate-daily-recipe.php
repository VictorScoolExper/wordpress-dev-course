<?php

function up_generate_daily_recipe(){
    global $wpdb;
    // get_var retrieves a single value
    $id = $wpdb->get_var(
        // gets from the posts table
        "SELECT ID from {$wpdb->posts}
        WHERE post_status='publish' AND post_type='recipe'
        ORDER BY rand() LIMIT 1"
    );
    // sets the temporary value
    set_transient( 'up_daily_recipe_id', $id, DAY_IN_SECONDS );

    return $id;
}