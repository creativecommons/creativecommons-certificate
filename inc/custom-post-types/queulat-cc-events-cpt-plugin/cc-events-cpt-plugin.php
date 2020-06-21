<?php
/**
 * Plugin Name: Events Custom Post Type Plugin
 * Plugin URI:
 * Description: 
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */
function Cc_events_Post_Type_register_post_type() {
	require_once __DIR__ .'/class-cc-events-post-type.php';
	Cc_events_Post_Type::activate_plugin();
	require_once __DIR__ .'/class-cc-events-post-type.php';
	require_once __DIR__ .'/class-cc-events-post-query.php';
	require_once __DIR__ .'/class-cc-events-post-object.php';
	require_once __DIR__ .'/class-cc-events-post-metabox.php';
}

add_action('init', 'Cc_events_Post_Type_register_post_type');
