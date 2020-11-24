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
	public static function modify_breadcrumb_seperator() {
		return '<i class="icon chevron-right is-6"></i>';
}
	public static function get_upcoming_course_events( $post_id ) {
		$posts = get_posts( array(
			'posts_per_page'	=> -1,
			'post_type'			  => 'cc_events',
			'meta_key'        => 'start_date',
	    'orderby'         => 'meta_value_num',
			'order'     => 'ASC',
			'meta_query' => array(
				array(
					'key' => 'related_course',
					'compare' => '=',
					'value' => $post_id
				),
				array(
					'key' => 'start_date',
					'compare' => '>=',
					'value' => date('Ymd')
				),
			)
		) );

		return $posts;
	}

	public static function get_upcoming_course_meta( $events ) {
		$upcoming_id = $events[0]->ID;
		$start       = get_field( 'start_date', $upcoming_id );
		$end         = get_field( 'end_date', $upcoming_id );

		return array(
			'start_date' => $start,
			'end_date'   => $end,
			'duration'   => numWeeks( $start, $end ),
			'language'   => get_field( 'language', $upcoming_id ),
		);
	}

	public static function register_columns_shortcode( $atts, $content ) {
		$a = shortcode_atts( array( 'cols' => '4' ), $atts );
		return '<div class="cols" style="--col-count: ' . $a['cols'] . ';">' . $content . '</div>';
	}
	public static function register_stats_shortcode( $atts, $content ) {
		return '<div class="stats has-text-black">' . do_shortcode( $content ) . '</div>';
	}
	public static function register_stat_shortcode( $atts, $content ) {
		$a = shortcode_atts(
			array(
				'title'    => '',
				'number'   => '',
				'subtitle' => '',
			),
			$atts
		);
		return '<div class="stat"><h3 class="title is-5">' . $a['title'] . '</h3><span class="number has-text-weight-bold	is-size-1">' . $a['number'] . '</span><p class="caption has-text-weight-bold">' . $a['subtitle'] . '</p></div>';
	}
	// @todo: Make this do more (add colors)/throw this out and use the card somehow
	public static function register_box_shortcode( $atts, $content ) {
		return '<div class="has-background-grey-lighter padding-vertical-big padding-horizontal-bigger cc-box margin-bottom-larger">' . $content . '</div>';
	}
	// Pressbooks hides the WordPress Admin bar, but doesn't remove the empty space :/
	public static function remove_admin_bar_top_whitespace() {
		if ( is_admin_bar_showing() ) {
			echo '<style type="text/css">html {margin-top: 0 !important;}</style>';
		}
	}
	public static function add_alumni_login_button( $items, $args ) {
		if ( $args->theme_location == 'main-navigation' ) {
			$items .= '<div class="navbar-item"><a class="button alumni" href="' . get_page_link( 788 ) . '"><svg class="margin-right-small" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 5.625C6.55273 5.625 7.8125 4.36523 7.8125 2.8125C7.8125 1.25977 6.55273 0 5 0C3.44727 0 2.1875 1.25977 2.1875 2.8125C2.1875 4.36523 3.44727 5.625 5 5.625ZM7.5 6.25H6.42383C5.99023 6.44922 5.50781 6.5625 5 6.5625C4.49219 6.5625 4.01172 6.44922 3.57617 6.25H2.5C1.11914 6.25 0 7.36914 0 8.75V9.0625C0 9.58008 0.419922 10 0.9375 10H9.0625C9.58008 10 10 9.58008 10 9.0625V8.75C10 7.36914 8.88086 6.25 7.5 6.25Z" fill="#008000"/>
</svg>
Alumni</a></div>';
		}
		return $items;
	}
};

// add filters
add_filter( 'cc_theme_base_set_default_size_logo', array( 'Certificates_Website', 'set_certificates_logo_image_size' ) );
add_filter( 'cc_theme_base_set_default_logo', array( 'Certificates_Website', 'set_certificates_logo' ) );
add_filter( 'body_class', array( 'Certificates_Website', 'add_body_class' ) );
add_filter( 'wpseo_breadcrumb_separator', array( 'Certificates_Website', 'modify_breadcrumb_seperator' ) );
add_filter( 'wp_head', array( 'Certificates_Website', 'remove_admin_bar_top_whitespace' ), 11 );
add_filter( 'wp_nav_menu_items', array( 'Certificates_Website', 'add_alumni_login_button' ), 10, 2 );

// Register shortcodes
add_shortcode( 'columns', array( 'Certificates_Website', 'register_columns_shortcode' ) );
add_shortcode( 'stats', array( 'Certificates_Website', 'register_stats_shortcode' ) );
add_shortcode( 'stat', array( 'Certificates_Website', 'register_stat_shortcode' ) );
add_shortcode( 'box', array( 'Certificates_Website', 'register_box_shortcode' ) );


// Helper functions
// @todo: Move these somewhere else?

function query_api( $url ) {
	$response  = wp_remote_get( $url );
	$http_code = wp_remote_retrieve_response_code( $response );
	if ( $http_code == 200 ) {
		$api_response = json_decode( wp_remote_retrieve_body( $response ) );
		return $api_response;
	} else {
		return false;
	}
}

function load_org_blog_posts() {
	$posts_url = 'https://creativecommons.org/wp-json/wp/v2/posts?per_page=50';
	$posts     = query_api( $posts_url );

	if ( ! $posts ) {
		return array();
	}

	return $posts;
}


/*
 * A custom function that calculates how many weeks occur
 * between two given dates.
 *
 * @param string $dateOne Y-m-d format.
 * @param string $dateTwo Y-m-d format.
 * @return int
 */
function numWeeks($dateOne, $dateTwo){
    $firstDate = new DateTime($dateOne);
		$secondDate = new DateTime($dateTwo);

		$differenceInDays = $firstDate->diff($secondDate)->days;
		$differenceInWeeks = $differenceInDays / 7;

    return floor($differenceInWeeks);
}
