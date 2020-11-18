<?php
class Certificates_Website {
	public static function set_certificates_logo() {
		return 'products/certificates.svg#certificates';
	}
	public static function set_certificates_logo_image_size() {
		return '215 40';
	}
	// Add a class to the page body to override styles from the base theme
	public static function add_body_class( $classes ) {
    return array_merge( $classes, array( 'creativecommons-certificate' ) );
	}
	public static function modify_breadcrumb_seperator( ) {
		return '<i class="icon chevron-right is-6"></i>';
	}
};

// add the filter
add_filter( 'cc_theme_base_set_default_size_logo', array( 'Certificates_Website', 'set_certificates_logo_image_size' ) );
add_filter( 'cc_theme_base_set_default_logo', array( 'Certificates_Website', 'set_certificates_logo' ) );
add_filter( 'body_class', array( 'Certificates_Website', 'add_body_class') );
add_filter( 'wpseo_breadcrumb_separator', array( 'Certificates_Website', 'modify_breadcrumb_seperator') );
