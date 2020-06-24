<?php

use Queulat\Post_Type;

class Cc_Course_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'cc_course';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __( 'Courses', 'cpt_cc_course' ),
			'labels'                => [
				'name'                     => __( 'Courses', 'cpt_cc_course' ),
				'singular_name'            => __( 'Courses', 'cpt_cc_course' ),
				'add_new'                  => __( 'Add New', 'cpt_cc_course' ),
				'add_new_item'             => __( 'Add New Page', 'cpt_cc_course' ),
				'edit_item'                => __( 'Edit Page', 'cpt_cc_course' ),
				'new_item'                 => __( 'New Page', 'cpt_cc_course' ),
				'view_item'                => __( 'View Page', 'cpt_cc_course' ),
				'view_items'               => __( 'View Pages', 'cpt_cc_course' ),
				'search_items'             => __( 'Search Pages', 'cpt_cc_course' ),
				'not_found'                => __( 'No pages found.', 'cpt_cc_course' ),
				'not_found_in_trash'       => __( 'No pages found in Trash.', 'cpt_cc_course' ),
				'parent_item_colon'        => __( 'Parent Page:', 'cpt_cc_course' ),
				'all_items'                => __( 'Courses', 'cpt_cc_course' ),
				'archives'                 => __( 'Courses', 'cpt_cc_course' ),
				'attributes'               => __( 'Page Attributes', 'cpt_cc_course' ),
				'insert_into_item'         => __( 'Insert into page', 'cpt_cc_course' ),
				'uploaded_to_this_item'    => __( 'Uploaded to this page', 'cpt_cc_course' ),
				'featured_image'           => __( 'Featured Image', 'cpt_cc_course' ),
				'set_featured_image'       => __( 'Set featured image', 'cpt_cc_course' ),
				'remove_featured_image'    => __( 'Remove featured image', 'cpt_cc_course' ),
				'use_featured_image'       => __( 'Use as featured image', 'cpt_cc_course' ),
				'filter_items_list'        => __( 'Filter pages list', 'cpt_cc_course' ),
				'items_list_navigation'    => __( 'Pages list navigation', 'cpt_cc_course' ),
				'items_list'               => __( 'Pages list', 'cpt_cc_course' ),
				'item_published'           => __( 'Page published.', 'cpt_cc_course' ),
				'item_published_privately' => __( 'Page published privately.', 'cpt_cc_course' ),
				'item_reverted_to_draft'   => __( 'Page reverted to draft.', 'cpt_cc_course' ),
				'item_scheduled'           => __( 'Page scheduled.', 'cpt_cc_course' ),
				'item_updated'             => __( 'Page updated.', 'cpt_cc_course' ),
				'menu_name'                => __( 'Courses', 'cpt_cc_course' ),
				'name_admin_bar'           => __( 'Courses', 'cpt_cc_course' ),
			],
			'description'           => __( '', 'cpt_cc_course' ),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => null,
			'capability_type'       => [
				0 => 'cc_course',
				1 => 'cc_courses',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => true,
			'query_var'             => 'cc_course',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => [
				'with_front' => true,
				'feeds'      => true,
				'pages'      => true,
				'slug'       => 'cc_course',
				'ep_mask'    => 1,
			],
			'supports'              => [
				0 => 'title',
				1 => 'editor',
				2 => 'thumbnail',
				3 => 'excerpt',
			],
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false,
		];
	}
}
