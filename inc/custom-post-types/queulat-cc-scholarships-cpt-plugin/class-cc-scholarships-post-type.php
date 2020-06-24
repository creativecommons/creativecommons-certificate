<?php

use Queulat\Post_Type;

class Cc_Scholarships_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'cc_scholarships';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __( 'Scholarships', 'cpt_cc_scholarships' ),
			'labels'                => [
				'name'                     => __( 'Scholarships', 'cpt_cc_scholarships' ),
				'singular_name'            => __( 'Scholarships', 'cpt_cc_scholarships' ),
				'add_new'                  => __( 'Add New', 'cpt_cc_scholarships' ),
				'add_new_item'             => __( 'Add New Page', 'cpt_cc_scholarships' ),
				'edit_item'                => __( 'Edit Page', 'cpt_cc_scholarships' ),
				'new_item'                 => __( 'New Page', 'cpt_cc_scholarships' ),
				'view_item'                => __( 'View Page', 'cpt_cc_scholarships' ),
				'view_items'               => __( 'View Pages', 'cpt_cc_scholarships' ),
				'search_items'             => __( 'Search Pages', 'cpt_cc_scholarships' ),
				'not_found'                => __( 'No pages found.', 'cpt_cc_scholarships' ),
				'not_found_in_trash'       => __( 'No pages found in Trash.', 'cpt_cc_scholarships' ),
				'parent_item_colon'        => __( 'Parent Page:', 'cpt_cc_scholarships' ),
				'all_items'                => __( 'Scholarships', 'cpt_cc_scholarships' ),
				'archives'                 => __( 'Scholarships', 'cpt_cc_scholarships' ),
				'attributes'               => __( 'Page Attributes', 'cpt_cc_scholarships' ),
				'insert_into_item'         => __( 'Insert into page', 'cpt_cc_scholarships' ),
				'uploaded_to_this_item'    => __( 'Uploaded to this page', 'cpt_cc_scholarships' ),
				'featured_image'           => __( 'Featured Image', 'cpt_cc_scholarships' ),
				'set_featured_image'       => __( 'Set featured image', 'cpt_cc_scholarships' ),
				'remove_featured_image'    => __( 'Remove featured image', 'cpt_cc_scholarships' ),
				'use_featured_image'       => __( 'Use as featured image', 'cpt_cc_scholarships' ),
				'filter_items_list'        => __( 'Filter pages list', 'cpt_cc_scholarships' ),
				'items_list_navigation'    => __( 'Pages list navigation', 'cpt_cc_scholarships' ),
				'items_list'               => __( 'Pages list', 'cpt_cc_scholarships' ),
				'item_published'           => __( 'Page published.', 'cpt_cc_scholarships' ),
				'item_published_privately' => __( 'Page published privately.', 'cpt_cc_scholarships' ),
				'item_reverted_to_draft'   => __( 'Page reverted to draft.', 'cpt_cc_scholarships' ),
				'item_scheduled'           => __( 'Page scheduled.', 'cpt_cc_scholarships' ),
				'item_updated'             => __( 'Page updated.', 'cpt_cc_scholarships' ),
				'menu_name'                => __( 'Scholarships', 'cpt_cc_scholarships' ),
				'name_admin_bar'           => __( 'Scholarships', 'cpt_cc_scholarships' ),
			],
			'description'           => __( '', 'cpt_cc_scholarships' ),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-awards',
			'capability_type'       => [
				0 => 'cc_scholarship',
				1 => 'cc_scholarships',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => true,
			'query_var'             => 'cc_scholarships',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => [
				'with_front' => true,
				'feeds'      => true,
				'pages'      => true,
				'slug'       => 'cc_scholarships',
				'ep_mask'    => 1,
			],
			'supports'              => [
				0 => 'title',
				1 => 'editor',
				2 => 'thumbnail',
			],
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false,
		];
	}
}
