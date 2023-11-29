<?php

// Register a custom post type for the form data
function rrd_register_email_form_post_type() {
    $labels = array(
		'name'                  => _x( 'Emails', 'Post type general name', 'formEmails' ),
		'singular_name'         => _x( 'Email', 'Post type singular name', 'formEmails' ),
		'menu_name'             => _x( 'Emails', 'Admin Menu text', 'formEmails' ),
		'name_admin_bar'        => _x( 'Email', 'Add New on Toolbar', 'formEmails' ),
		'add_new'               => __( 'Add New', 'formEmails' ),
		'add_new_item'          => __( 'Add New Email', 'formEmails' ),
		'new_item'              => __( 'New Email', 'formEmails' ),
		'edit_item'             => __( 'Edit Email', 'formEmails' ),
		'view_item'             => __( 'View Email', 'formEmails' ),
		'all_items'             => __( 'All Emails', 'formEmails' ),
		'search_items'          => __( 'Search Emails', 'formEmails' ),
		'parent_item_colon'     => __( 'Parent Emails:', 'formEmails' ),
		'not_found'             => __( 'No Emails found.', 'formEmails' ),
		'not_found_in_trash'    => __( 'No Emails found in Trash.', 'formEmails' ),
		'featured_image'        => _x( 'Email Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'formEmails' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'formEmails' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'formEmails' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'formEmails' ),
		'archives'              => _x( 'Email archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'formEmails' ),
		'insert_into_item'      => _x( 'Insert into Email', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'formEmails' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Email', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'formEmails' ),
		'filter_items_list'     => _x( 'Filter Emails list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'formEmails' ),
		'items_list_navigation' => _x( 'Emails list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'formEmails' ),
		'items_list'            => _x( 'Emails list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'formEmails' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => current_user_can('administrator'),
		'publicly_queryable' => current_user_can('administrator'),
		'show_ui'            => current_user_can('administrator'),
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'email' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'excerpt' ),
        'show_in_rest'       => true,
        'description'        => __('A custom post type to store and read emails sent from vuejs form', 'formEmails'),
        'taxonomies'         => ['services-required', 'from-Email', 'from-Phone']

	);

	register_post_type( 'emails', $args );

    register_taxonomy('services-required', 'emails', [
        'label' => __('Services Required', 'formEmails'),
        'rewrite' => ['slug' => 'services-required'],
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ]);

    register_taxonomy('from-Email', 'emails', [
        'label' => __('Email', 'formEmails'),
        'rewrite' => ['slug' => 'from-email'],
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ]);

    register_taxonomy('from-Phone', 'emails', [
        'label' => __('Phone', 'formEmails'),
        'rewrite' => ['slug' => 'from-phone'],
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ]);
}