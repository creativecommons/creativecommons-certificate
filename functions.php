<?php
/**
 * Functions: list
 *
 * @version 2020.05.1
 * @package creativecommons-certificate
 */

/* Theme Constants (to speed up some common things) ------*/
define( 'THEME_LOCAL_URI', get_stylesheet_directory_uri() );
define( 'THEME_PARENT_URI', get_template_directory_uri() );

/*
	Include Custom post types
*/
require STYLESHEETPATH . '/inc/custom-post-types/queulat-cc-course-cpt-plugin/cc-course-cpt-plugin.php';
require STYLESHEETPATH . '/inc/custom-post-types/queulat-cc-events-cpt-plugin/cc-events-cpt-plugin.php';

/* Include local files */
require STYLESHEETPATH . '/inc/alumni.php';
require STYLESHEETPATH . '/inc/acf.php';

/**
 * Instantiate alumni class
 */
$alumni = CC_Alumni::get_instance();

require STYLESHEETPATH . '/inc/certificates-functions.php';
require STYLESHEETPATH . '/inc/widgets.php';

/**
 * Theme singleton class
 * ---------------------
 * Stores various theme and site specific info and groups custom methods
 **/
class CC_Certificates_Site {

	private static $instance;

	const id        = __CLASS__;
	const theme_ver = '2020.06.1';
	private function __construct() {
		$this->actions_manager();
	}
	public function __get( $key ) {
		return isset( $this->$key ) ? $this->$key : null;
	}
	public function __isset( $key ) {
		return isset( $this->$key );
	}
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}
		return self::$instance;
	}
	public function __clone() {
		trigger_error( 'Clone is not allowed.', E_USER_ERROR );
	}
	/**
	 * Setup theme actions, both in the front and back end
	 * */
	public function actions_manager() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 90 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}
	public function enqueue_scripts() {
		wp_enqueue_script( 'cc_certificates_script', THEME_LOCAL_URI . '/assets/js/script.js', array( 'jquery' ), self::theme_ver, true );
	}
	public function enqueue_styles() {
		wp_enqueue_style( 'cc_current_style', THEME_LOCAL_URI . '/assets/css/child-styles.css', array( 'cc_base_style' ), self::theme_ver );
	}
}

/**
 * Instantiate the class object
 * */

$_s = CC_Certificates_Site::get_instance();


remove_filter( 'bbp_get_breadcrumb', '__return_false' );
