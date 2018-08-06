<?php
/*
Plugin Name: Ideas
Plugin URI:
Description: Supplemental plugin for Wordcamp Brighton
Author: Nic Fusciardi
Version: 1.0
Text Domain: ideas
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include 'vendor/CMB2/init.php';

function idea_load_class() {
	include 'classes/class-ideas-custom-meta.php';
}
add_action( 'init', 'idea_load_class' );


function create_ideas_cpt() {

	$labels = array(
		'name' => __( 'Ideas', 'Post Type General Name', 'ideas' ),
		'singular_name' => __( 'Idea', 'Post Type Singular Name', 'ideas' ),
		'menu_name' => __( 'Ideas', 'ideas' ),
		'name_admin_bar' => __( 'Idea', 'ideas' ),
		'archives' => __( 'Idea Archives', 'ideas' ),
		'attributes' => __( 'Idea Attributes', 'ideas' ),
		'parent_item_colon' => __( 'Parent Idea:', 'ideas' ),
		'all_items' => __( 'All Ideas', 'ideas' ),
		'add_new_item' => __( 'Add New Idea', 'ideas' ),
		'add_new' => __( 'Add New', 'ideas' ),
		'new_item' => __( 'New Idea', 'ideas' ),
		'edit_item' => __( 'Edit Idea', 'ideas' ),
		'update_item' => __( 'Update Idea', 'ideas' ),
		'view_item' => __( 'View Idea', 'ideas' ),
		'view_items' => __( 'View Ideas', 'ideas' ),
		'search_items' => __( 'Search Idea', 'ideas' ),
		'not_found' => __( 'Not found', 'ideas' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ideas' ),
		'featured_image' => __( 'Featured Image', 'ideas' ),
		'set_featured_image' => __( 'Set featured image', 'ideas' ),
		'remove_featured_image' => __( 'Remove featured image', 'ideas' ),
		'use_featured_image' => __( 'Use as featured image', 'ideas' ),
		'insert_into_item' => __( 'Insert into Idea', 'ideas' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Idea', 'ideas' ),
		'items_list' => __( 'Ideas list', 'ideas' ),
		'items_list_navigation' => __( 'Ideas list navigation', 'ideas' ),
		'filter_items_list' => __( 'Filter Ideas list', 'ideas' ),
	);
	$args = array(
		'label' => __( 'Ideas', 'ideas' ),
		'description' => __( '', 'ideas' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-testimonial',
		'supports' => array('title', 'editor', 'custom-fields' ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => false,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'ideas', $args );

}
add_action( 'init', 'create_ideas_cpt' );
