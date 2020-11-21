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
	// @todo: Make this do more (add colors)/throw this out and use the card somehow
	public static function register_box_shortcode( $atts, $content ) {
			return '<div class="has-background-grey-lighter padding-vertical-big padding-horizontal-bigger cc-box margin-bottom-larger">'.$content.'</div>';
	}
	// Pressbooks hides the WordPress Admin bar, but doesn't remove the empty space :/
	public static function remove_admin_bar_top_whitespace( ) {
		if ( is_admin_bar_showing() ) {
      echo '<style type="text/css">html {margin-top: 0 !important;}</style>';
		}
	}
	public static function add_alumni_login_button( $items, $args ) {
		if ( $args->theme_location == 'main-navigation' ) {
			$items .= '<div class="navbar-item"><a class="button alumni" href="'. get_page_link(788) .'"><svg class="margin-right-small" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
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
add_filter( 'body_class', array( 'Certificates_Website', 'add_body_class') );
add_filter( 'wpseo_breadcrumb_separator', array( 'Certificates_Website', 'modify_breadcrumb_seperator') );
add_filter( 'wp_head', array( 'Certificates_Website', 'remove_admin_bar_top_whitespace'), 11 );
add_filter( 'wp_nav_menu_items', array( 'Certificates_Website', 'add_alumni_login_button'), 10, 2 );

// Register shortcodes
add_shortcode( 'columns', array( 'Certificates_Website', 'register_columns_shortcode') );
add_shortcode( 'stats', array( 'Certificates_Website', 'register_stats_shortcode') );
add_shortcode( 'stat', array( 'Certificates_Website', 'register_stat_shortcode') );
add_shortcode( 'box', array( 'Certificates_Website', 'register_box_shortcode') );

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

// @todo: Also store in transient (even if short)
function load_home_featured_posts() {
	$url = 'https://creativecommons.org/wp-json/wp/v2/posts?per_page=50';
	$media_url = 'https://creativecommons.org/wp-json/wp/v2/media';
	$author_url = 'https://creativecommons.org/wp-json/wp/v2/users';

	$transient_key = 'home_posts' . $url;

	foreach ( get_field( 'featured_news', get_option( 'page_on_front' ) ) as $news ) {
		if ($news['post_id']) {
			$url .= '&include[]=' . $news['post_id'];
		}
	}

	if ( false === ( $results = get_transient( $transient_key ) ) ) {

		$posts = query_api($url);

		foreach ($posts as $post) {
			// Attach featured image info
			if ( ! empty( $post->featured_media ) ) {
				$api_response = query_api( $media_url . '/' . $post->featured_media );

				if ( ! empty( $api_response ) ) {
					$post->featured_media_url      = $api_response->media_details->sizes->cc_list_post_thumbnail->source_url;
					$post->alt_text = $api_response->alt_text;
				}
			}

			// Attach author info
			if ( ! empty( $post->author ) ) {
				$api_response = query_api( $author_url . '/' . $post->author );

				if ( ! empty( $api_response ) ) {
					$post->author_name = $api_response->name;
					$post->author_url = $api_response->link;
				}
			}
		}

		$results = [];
		foreach ($posts as $post) {
			$results[$post->id] = $post;
		}

    set_transient( $transient_key, $results,  HOUR_IN_SECONDS ); // @todo Maybe longer?
	}

	return $results;
}

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
	$posts = query_api( $posts_url );

	if(!$posts) {
		return [];
	}

	return $posts;
}

/**
 * This only runs on the back-end, when editing a page using the page-home.php template.
 * @todo Maybe add a short transient here? Not sure if necessary since on the back-end only.
 * @todo Maybe need to load more than 50 most recent posts? Download multiple pages and build list.
 */
function acf_load_blog_posts( $field ) {
    // reset choices
		$field['choices'] = array();
		$blog_posts = load_org_blog_posts();

		foreach ($blog_posts as $post) {
			$field['choices'][$post->id] = $post->title->rendered;
		}

    // return the field
    return $field;
}

add_filter('acf/load_field/name=blog_posts', 'acf_load_blog_posts');
