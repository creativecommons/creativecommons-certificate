<?php
/**
 * Plugin Name: Testimonials Custom Post Type Plugin
 * Plugin URI:
 * Description: 
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */

function Cc_Testimonials_Post_Type_register_post_type() {
	require_once __DIR__ .'/class-cc-testimonials-post-type.php';
	Cc_Testimonials_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-cc-testimonials-post-type.php';
	require_once __DIR__ .'/class-cc-testimonials-post-query.php';
	require_once __DIR__ .'/class-cc-testimonials-post-object.php';
	require_once __DIR__ .'/class-cc-testimonials-metabox.php';
};

add_action('init', 'Cc_Testimonials_Post_Type_register_post_type');
