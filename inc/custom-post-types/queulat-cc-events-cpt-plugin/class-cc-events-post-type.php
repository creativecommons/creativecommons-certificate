<?php

use Queulat\Post_Type;

class Cc_events_Post_Type extends Post_Type {

	public function get_post_type() : string {
		return 'cc_events';
	}
	public function get_post_type_args() : array {
		return array(
			'label'                 => __( 'Events', 'cpt_cc_events' ),
			'labels'                => array(
				'name'                     => __( 'Events', 'cpt_cc_events' ),
				'singular_name'            => __( 'Events', 'cpt_cc_events' ),
				'add_new'                  => __( 'Add New', 'cpt_cc_events' ),
				'add_new_item'             => __( 'Add New Event', 'cpt_cc_events' ),
				'edit_item'                => __( 'Edit Event', 'cpt_cc_events' ),
				'new_item'                 => __( 'New Event', 'cpt_cc_events' ),
				'view_item'                => __( 'View Event', 'cpt_cc_events' ),
				'view_items'               => __( 'View Events', 'cpt_cc_events' ),
				'search_items'             => __( 'Search Events', 'cpt_cc_events' ),
				'not_found'                => __( 'No Events found.', 'cpt_cc_events' ),
				'not_found_in_trash'       => __( 'No Events found in Trash.', 'cpt_cc_events' ),
				'parent_item_colon'        => __( 'Parent Event:', 'cpt_cc_events' ),
				'all_items'                => __( 'Events', 'cpt_cc_events' ),
				'archives'                 => __( 'Events', 'cpt_cc_events' ),
				'attributes'               => __( 'Event Attributes', 'cpt_cc_events' ),
				'insert_into_item'         => __( 'Insert into Event', 'cpt_cc_events' ),
				'uploaded_to_this_item'    => __( 'Uploaded to this Event', 'cpt_cc_events' ),
				'featured_image'           => __( 'Featured Image', 'cpt_cc_events' ),
				'set_featured_image'       => __( 'Set featured image', 'cpt_cc_events' ),
				'remove_featured_image'    => __( 'Remove featured image', 'cpt_cc_events' ),
				'use_featured_image'       => __( 'Use as featured image', 'cpt_cc_events' ),
				'filter_items_list'        => __( 'Filter Events list', 'cpt_cc_events' ),
				'items_list_navigation'    => __( 'Events list navigation', 'cpt_cc_events' ),
				'items_list'               => __( 'Events list', 'cpt_cc_events' ),
				'item_published'           => __( 'Event published.', 'cpt_cc_events' ),
				'item_published_privately' => __( 'Event published privately.', 'cpt_cc_events' ),
				'item_reverted_to_draft'   => __( 'Event reverted to draft.', 'cpt_cc_events' ),
				'item_scheduled'           => __( 'Event scheduled.', 'cpt_cc_events' ),
				'item_updated'             => __( 'Event updated.', 'cpt_cc_events' ),
				'menu_name'                => __( 'Events', 'cpt_cc_events' ),
				'name_admin_bar'           => __( 'Events', 'cpt_cc_events' ),
			),
			'description'           => __( '', 'cpt_cc_events' ),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-calendar-alt',
			'capability_type'       => array(
				0 => 'ccgnevent',
				1 => 'ccgnevents',
			),
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => array(),
			'has_archive'           => true,
			'query_var'             => 'cc_events',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => array(
				'with_front' => true,
				'feeds'      => true,
				'pages'      => true,
				'slug'       => 'events',
				'ep_mask'    => 1,
			),
			'supports'              => array(
				0 => 'title',
				1 => 'editor',
				2 => 'thumbnail',
			),
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false,
		);
	}
}
