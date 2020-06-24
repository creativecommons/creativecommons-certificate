<?php

use Queulat\Post_Type;

class Cc_Testimonials_Post_Type extends Post_Type {
	public function get_post_type() : string {
		return 'cc_testimonials';
	}
	public function get_post_type_args() : array {
		return [
			'label'                 => __('Testimonials', 'cpt_cc_testimonials'),
			'labels'                => [
				'name'                     => __('Testimonials', 'cpt_cc_testimonials'),
				'singular_name'            => __('Testimonials', 'cpt_cc_testimonials'),
				'add_new'                  => __('Add New', 'cpt_cc_testimonials'),
				'add_new_item'             => __('Add New Page', 'cpt_cc_testimonials'),
				'edit_item'                => __('Edit Page', 'cpt_cc_testimonials'),
				'new_item'                 => __('New Page', 'cpt_cc_testimonials'),
				'view_item'                => __('View Page', 'cpt_cc_testimonials'),
				'view_items'               => __('View Pages', 'cpt_cc_testimonials'),
				'search_items'             => __('Search Pages', 'cpt_cc_testimonials'),
				'not_found'                => __('No pages found.', 'cpt_cc_testimonials'),
				'not_found_in_trash'       => __('No pages found in Trash.', 'cpt_cc_testimonials'),
				'parent_item_colon'        => __('Parent Page:', 'cpt_cc_testimonials'),
				'all_items'                => __('Testimonials', 'cpt_cc_testimonials'),
				'archives'                 => __('Testimonials', 'cpt_cc_testimonials'),
				'attributes'               => __('Page Attributes', 'cpt_cc_testimonials'),
				'insert_into_item'         => __('Insert into page', 'cpt_cc_testimonials'),
				'uploaded_to_this_item'    => __('Uploaded to this page', 'cpt_cc_testimonials'),
				'featured_image'           => __('Featured Image', 'cpt_cc_testimonials'),
				'set_featured_image'       => __('Set featured image', 'cpt_cc_testimonials'),
				'remove_featured_image'    => __('Remove featured image', 'cpt_cc_testimonials'),
				'use_featured_image'       => __('Use as featured image', 'cpt_cc_testimonials'),
				'filter_items_list'        => __('Filter pages list', 'cpt_cc_testimonials'),
				'items_list_navigation'    => __('Pages list navigation', 'cpt_cc_testimonials'),
				'items_list'               => __('Pages list', 'cpt_cc_testimonials'),
				'item_published'           => __('Page published.', 'cpt_cc_testimonials'),
				'item_published_privately' => __('Page published privately.', 'cpt_cc_testimonials'),
				'item_reverted_to_draft'   => __('Page reverted to draft.', 'cpt_cc_testimonials'),
				'item_scheduled'           => __('Page scheduled.', 'cpt_cc_testimonials'),
				'item_updated'             => __('Page updated.', 'cpt_cc_testimonials'),
				'menu_name'                => __('Testimonials', 'cpt_cc_testimonials'),
				'name_admin_bar'           => __('Testimonials', 'cpt_cc_testimonials'),
			],
			'description'           => __('', 'cpt_cc_testimonials'),
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-format-quote',
			'capability_type'       => [
				0 => 'cc_testimonial',
				1 => 'cc_testimonials',
			],
			'map_meta_cap'          => true,
			'register_meta_box_cb'  => null,
			'taxonomies'            => [],
			'has_archive'           => true,
			'query_var'             => 'cc_testimonials',
			'can_export'            => true,
			'delete_with_user'      => true,
			'rewrite'               => [
				'with_front' => true,
				'feeds'      => true,
				'pages'      => true,
				'slug'       => 'cc_testimonials',
				'ep_mask'    => 1,
			],
			'supports'              => [
				0 => 'title',
				1 => 'editor',
				2 => 'thumbnail',
			],
			'show_in_rest'          => true,
			'rest_base'             => false,
			'rest_controller_class' => false
		];
	}
}
