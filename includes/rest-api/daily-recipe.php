<?php

function up_rest_api_daily_recipe_handler(){
    $response = [
        'url' => '',
        'img' => '',
        'title' => ''
    ];

    // calls the transient created in generate-daily-recipe.php
    $id = get_transient('up_daily_recipe_id');

    // guarantees that it is always generated
    if(!$id){
        $id = up_generate_daily_recipe()();
    }

    $response['url'] = get_permalink($id);
    $response['img'] = get_the_post_thumbnail_url($id, 'full');
    $response['title'] = get_the_title($id);

    return $response;
}