<?php

function up_recipe_post_type(){

	$labels = array(
		'name'                  => _x( 'Recibes', 'Post type general name', 'udemy-plus' ),
		'singular_name'         => _x( 'Recibe', 'Post type singular name', 'udemy-plus' ),
		'menu_name'             => _x( 'Recibes  Post Type', 'Admin Menu text', 'udemy-plus' ),
		'name_admin_bar'        => _x( 'Recibe', 'Add New on Toolbar', 'udemy-plus' ),
		'add_new'               => __( 'Add New', 'udemy-plus' ),
		'add_new_item'          => __( 'Add New Recibe', 'udemy-plus' ),
		'new_item'              => __( 'New Recibe', 'udemy-plus' ),
		'edit_item'             => __( 'Edit Recibe', 'udemy-plus' ),
		'view_item'             => __( 'View Recibe', 'udemy-plus' ),
		'all_items'             => __( 'All Recibes', 'udemy-plus' ),
		'search_items'          => __( 'Search Recibes', 'udemy-plus' ),
		'parent_item_colon'     => __( 'Parent Recibes:', 'udemy-plus' ),
		'not_found'             => __( 'No Recibes found.', 'udemy-plus' ),
		'not_found_in_trash'    => __( 'No Recibes found in Trash.', 'udemy-plus' ),
		'featured_image'        => _x( 'Recibe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'udemy-plus' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'udemy-plus' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'udemy-plus' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'udemy-plus' ),
		'archives'              => _x( 'Recibe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'udemy-plus' ),
		'insert_into_item'      => _x( 'Insert into Recibe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'udemy-plus' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Recibe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'udemy-plus' ),
		'filter_items_list'     => _x( 'Filter Recibes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'udemy-plus' ),
		'items_list_navigation' => _x( 'Recibes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'udemy-plus' ),
		'items_list'            => _x( 'Recibes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'udemy-plus' ),
	);

	$args = array(
		'labels'             => $labels, 
		'public'             => true, // if it is public
		'publicly_queryable' => true, // if the public front end can access it
		'show_ui'            => true, // automatically creates ui, if value is false must provide a ui
		'show_in_menu'       => true, // adding a menu link
		'query_var'          => true, // ?recipe=pizza
		'rewrite'            => array( 'slug' => 'recipe' ), // /recipe/pizza
		'capability_type'    => 'post', // this is permissions
		'has_archive'        => true, // this action allow users to view older posts
		'hierarchical'       => false, // in this Recibe a recibe has no hierachical
		'menu_position'      => 20, // where it will show in wp admin dash
		'supports'           => array( 
			'title', 'editor', 'author', 
			'thumbnail', 'excerpt', 'custom-fields' 
		), // features we can enable
        'show_in_rest' => true, // creates custom end
        'description' => __('A custom post types for recipes', 'udemy-plus'),
        'taxonomies' => ['category', 'post_tag'], // post type will support what in the array
	);

    // 1st arg: name of our post type
    // 2nd arg: array of options 
    register_post_type( 'recipe', $args ); 
    
	
   
    register_taxonomy( 'cuisine', 'recipe', [
        'label' => __('Cuisine', 'udemy-plus'),
        'rewrite' => ['slug' => 'cuisine'],
        'show_in_rest' => true //this is the most important, look it up
    ]);

	register_term_meta('cuisine', 'more_info_url', [
		'type' => 'string',
		'description' => __('A URL for more information on a cuisine', 'udemy-plus'),
		'single' => true,
		'show_in_rest' => true,
		'default' => '#'
	]);

	register_post_meta('recipe', 'recipe_rating', [
		'type' => 'number',
		'description' => __('The rating for a recipe', 'udemy-plus'),
		'single' => true,
		'default' => 0,
		'show_in_rest' => true
	]);
}

