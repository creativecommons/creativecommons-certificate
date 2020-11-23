<?php
/**
 * Plugin Name: Courses Custom Post Type Plugin
 * Plugin URI: https://certificates.
 * Description:
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */

function Cc_Course_Post_Type_register_post_type() {
	 include_once __DIR__ . '/class-cc-course-post-type.php';
	Cc_Course_Post_Type::activate_plugin();
	include_once __DIR__ . '/class-cc-course-post-type.php';
	include_once __DIR__ . '/class-cc-course-post-query.php';
	include_once __DIR__ . '/class-cc-course-post-object.php';
	// require_once __DIR__ . '/class-cc-course-metabox.php';
}


add_action( 'init', 'Cc_Course_Post_Type_register_post_type' );
