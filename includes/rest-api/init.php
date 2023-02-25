<?php

function up_rest_api_init(){
    // we add a new end points (route)
    // route Example: example.com/wp-json/up/v1/signup
    register_rest_route('up/v1', '/signup', [
        'methods' => 'POST',
        // callback executes up_rest_api_signup_handler
        'callback' => 'up_rest_api_signup_handler',
        // function checks user permission, returns boolean
        // alllows anyone to visit it, function defined by wordpress
        'permission_callback' => '__return_true' 
    ]);
}