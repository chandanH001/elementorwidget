<?php

/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function solub_services() {
	$labels = array(
		'name'                  => _x( 'Services', 'Post type general name', 'solub_core' ),
		'singular_name'         => _x( 'Service', 'Post type singular name', 'solub_core' ),
		'menu_name'             => _x( 'Services', 'Admin Menu text', 'solub_core' ),
		'name_admin_bar'        => _x( 'Service', 'Add New on Toolbar', 'solub_core' ),
		'add_new'               => __( 'Add New', 'solub_core' ),
		'add_new_item'          => __( 'Add New Service', 'solub_core' ),
		'new_item'              => __( 'New Service', 'solub_core' ),
		'edit_item'             => __( 'Edit Service', 'solub_core' ),
		'view_item'             => __( 'View Service', 'solub_core' ),
		'all_items'             => __( 'All Services', 'solub_core' ),
		'search_items'          => __( 'Search Services', 'solub_core' ),
		'parent_item_colon'     => __( 'Parent Services:', 'solub_core' ),
		'not_found'             => __( 'No books found.', 'solub_core' ),
		'not_found_in_trash'    => __( 'No books found in Trash.', 'solub_core' ),
		'featured_image'        => _x( 'Service Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'solub_core' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'solub_core' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'solub_core' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'solub_core' ),
		'archives'              => _x( 'Service archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'solub_core' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'solub_core' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'solub_core' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'solub_core' ),
		'items_list_navigation' => _x( 'Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'solub_core' ),
		'items_list'            => _x( 'Services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'solub_core' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'service' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'service', $args );
}

add_action( 'init', 'solub_services' );