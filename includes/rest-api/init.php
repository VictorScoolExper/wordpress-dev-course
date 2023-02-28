<?php

function up_rest_api_init(){
    // we add a new end points (route)
    // route Example: example.com/wp-json/up/v1/signup
    register_rest_route('up/v1', '/signup', [
        // 'methods' => 'POST',
        'methods' => WP_REST_Server::CREATABLE,
        // callback executes up_rest_api_signup_handler
        'callback' => 'up_rest_api_signup_handler',
        // function checks user permission, returns boolean
        // alllows anyone to visit it, function defined by wordpress
        'permission_callback' => '__return_true' 
    ]);

    register_rest_route('up/v1', '/signin', [
        // 'methods' => 'POST',
        'methods' => WP_REST_Server::CREATABLE,
        'callback' => 'up_rest_api_signin_handler',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('up/v1', '/rate', [
        'methods' => WP_REST_Server::CREATABLE,
        'callback' => 'up_rest_api_add_rating_handler',
        'permission_callback' => 'is_user_logged_in'
    ]);
}