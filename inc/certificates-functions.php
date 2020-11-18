<?php
class Certificates_Website {
	public static function set_certificates_logo( ) {
		return 'products/certificates.svg#certificates';
	}
	public static function set_certificates_logo_image_size( ) {
		return '215 40';
	}
	// Add a class to the page body to override styles from the base theme
	public static function add_body_class( $classes ) {
    return array_merge( $classes, array( 'creativecommons-certificate' ) );
	}
	public static function modify_breadcrumb_seperator( ) {
		return '<i class="icon chevron-right is-6"></i>';
	}
	public static function get_upcoming_course_events( ) {
		return ['wow'];
	}
	public static function register_columns_shortcode( $atts, $content ) {
			$a = shortcode_atts( array( 'cols' => '4' ), $atts );
			return '<div class="cols" style="--col-count: ' . $a['cols'] . ';">'. $content .'</div>';
	}
	public static function register_stats_shortcode( $atts, $content ) {
			return '<div class="stats has-text-black">'.do_shortcode($content).'</div>';
	}
	public static function register_stat_shortcode( $atts, $content ) {
			$a = shortcode_atts( array( 'title' => '', 'number' => '', 'subtitle' => '' ), $atts );
			return '<div class="stat"><h3 class="title is-5">'.$a['title'].'</h3><span class="number has-text-weight-bold	is-size-1">'.$a['number'].'</span><p class="caption has-text-weight-bold">'.$a['subtitle'].'</p></div>';
	}
};

// add the filter
add_filter( 'cc_theme_base_set_default_size_logo', array( 'Certificates_Website', 'set_certificates_logo_image_size' ) );
add_filter( 'cc_theme_base_set_default_logo', array( 'Certificates_Website', 'set_certificates_logo' ) );
add_filter( 'body_class', array( 'Certificates_Website', 'add_body_class') );
add_filter( 'wpseo_breadcrumb_separator', array( 'Certificates_Website', 'modify_breadcrumb_seperator') );

// Register shortcodes
add_shortcode( 'columns', array( 'Certificates_Website', 'register_columns_shortcode') );
add_shortcode( 'stats', array( 'Certificates_Website', 'register_stats_shortcode') );
add_shortcode( 'stat', array( 'Certificates_Website', 'register_stat_shortcode') );

/**
 * Populate the 'Featured FAQs' dropdown on the homepage edit page with the actual FAQs.
 */
function acf_load_featured_faq_choices( $field ) {
	$field['choices'] = array();

	// @todo: FAQ page id is hardcoded here, find a way to make this dynamic
	$faq_groups = get_field('faq_group', 32);

	foreach ($faq_groups as $faqGroup) {
		foreach ($faqGroup['questions'] as $question) {
			$field['choices'][$question['question']] = $question['question'];
		}
	}

  return $field;
};

add_filter( 'acf/load_field/name=featured_faqs', 'acf_load_featured_faq_choices' );


function get_faqs_by_titles($titles = array(), $faqs = array()) {
	// @todo: FAQ page id is hardcoded here, find a way to make this dynamic
	$faq_groups = get_field('faq_group', 32);
	$filtered_faqs = array();

	foreach ($faq_groups as $faq_group) {
		foreach ($faq_group['questions'] as $question) {
			if(in_array($question['question'], $titles)) {
				array_push($filtered_faqs, $question);
			}
		}
	}

	return $filtered_faqs;
}
