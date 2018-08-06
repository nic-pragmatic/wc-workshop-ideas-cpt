<?php

class Ideas_Custom_Meta {

	public function __construct() {
		add_action( 'cmb2_admin_init', [ $this, 'ideas_metaboxes' ] );
		add_action( 'rest_api_init', [ $this, 'register_posts_meta_field' ] );

	}

	function ideas_metaboxes() {

		// Start with an underscore to hide fields from custom fields list
		$prefix = '_reminder_';

		/**
		 * Initiate the metabox
		 */
		$cmb = new_cmb2_box(
			array(
				'id'           => 'reminder_meta',
				'title'        => __( 'Reminder Meta', 'ideas' ),
				'object_types' => array( 'ideas' ), // Post type
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true, // Show field names on the left
			)
		);

		$cmb->add_field(
			array(
				'name' => __( 'Reminder Content', 'ideas' ),
				'desc' => __( 'Note about the reminder', 'ideas' ),
				'id'   => $prefix . 'content',
				'type' => 'text',
			)
		);

		$cmb->add_field(
			array(
				'name' => __( 'Reminder Date/Time', 'ideas' ),
				'desc' => __( 'Date/Time to be reminded', 'ideas' ),
				'id'   => $prefix . 'time',
				'type' => 'text',
			)
		);
	}

	function register_posts_meta_field() {
		$object_type = 'post';
		$args        = array(
			'type'          => 'string',
			'description'   => 'A meta key associated with a string meta value.',
			'single'        => true,
			'show_in_rest'  => WP_REST_Server::ALLMETHODS,
			'auth_callback' => function() {
				return current_user_can( 'administrator' );
			},
		);
		register_meta( $object_type, '_reminder_content', $args );
		register_meta( $object_type, '_reminder_time', $args );

	}
}

new Ideas_Custom_Meta();
