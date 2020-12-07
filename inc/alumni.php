<?php
/**
 * Class for working with BB Press and alumni.
 */
 class CC_Alumni {
  private static $instance;

  public $alumni_home_id;
  public $alumni_login_id;

  function __construct() {
    $this->alumni_home_id = get_field( 'alumni_home_page', 'options' );
    $this->alumni_login_id = get_field( 'alumni_login_page', 'options' );
    $this->actions_manager();
  }

  public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}
		return self::$instance;
	}

  /**
   * Display a notice in the WordPress back-end if the alumni pages aren't linked correctly.
   */
  public function notify_if_pages_unlinked () {
    ?>
    <div class="update-nag notice">
        <p>One or more alumni pages are unlinked. Please go to the <a href="/wp-admin/admin.php?page=acf-options">options</a> page and connect them.</p>
    </div>
    <?php
  }

  /**
   * Check if there is a logged in alumni
   */
  public static function is_alumni () {
    if ( function_exists( 'bbp_get_current_user_id' ) ) {
      return ! empty( bbp_get_current_user_id() );
    } else {
      return is_user_logged_in();
    }
  }

  /**
   * Redirect from the alumni login page to the alumni home page if the user is already logged in.
   */
  public function redirect_if_logged_in () {
    if ( empty( $this->alumni_login_id ) || empty( $this->alumni_home_id ) ) return;

    if ( $this->is_alumni() && is_page( $this->alumni_login_id ) ) {
      wp_redirect( get_permalink( $this->alumni_home_id ) );
      exit;
    }
  }

  /*
	 * Render a simple dropdown menu for logged-in alumni
	 */
	public function show_alumni_menu_item () {
    if ( $this->is_alumni() ) {
      return '<div class="navbar-item has-dropdown is-hoverable"><a class="button alumni is-dropdown"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="margin-right-small"><path d="M5 5.625C6.55273 5.625 7.8125 4.36523 7.8125 2.8125C7.8125 1.25977 6.55273 0 5 0C3.44727 0 2.1875 1.25977 2.1875 2.8125C2.1875 4.36523 3.44727 5.625 5 5.625ZM7.5 6.25H6.42383C5.99023 6.44922 5.50781 6.5625 5 6.5625C4.49219 6.5625 4.01172 6.44922 3.57617 6.25H2.5C1.11914 6.25 0 7.36914 0 8.75V9.0625C0 9.58008 0.419922 10 0.9375 10H9.0625C9.58008 10 10 9.58008 10 9.0625V8.75C10 7.36914 8.88086 6.25 7.5 6.25Z" fill="#767676"/></svg>

      '.bbp_get_current_user_name().' <i class="icon caret-down"></i></a>
  <div class="alumni-dropdown navbar-dropdown">
    <a class="navbar-item" href="'. get_permalink( $this->alumni_home_id ) .'">Alumni</a>
    <a class="navbar-item" href="'. bbp_get_user_profile_edit_url( bbp_get_current_user_id() ).'">Edit Profile</a>
    <a class="navbar-item" href="'. wp_logout_url( home_url() ) . '">Sign Out</a>
  </div>
</div>';
    } else {
      return '<div class="navbar-item"><a class="button alumni" href="' . get_permalink( $this->alumni_login_id ) . '"><svg class="margin-right-small" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 5.625C6.55273 5.625 7.8125 4.36523 7.8125 2.8125C7.8125 1.25977 6.55273 0 5 0C3.44727 0 2.1875 1.25977 2.1875 2.8125C2.1875 4.36523 3.44727 5.625 5 5.625ZM7.5 6.25H6.42383C5.99023 6.44922 5.50781 6.5625 5 6.5625C4.49219 6.5625 4.01172 6.44922 3.57617 6.25H2.5C1.11914 6.25 0 7.36914 0 8.75V9.0625C0 9.58008 0.419922 10 0.9375 10H9.0625C9.58008 10 10 9.58008 10 9.0625V8.75C10 7.36914 8.88086 6.25 7.5 6.25Z" fill="#008000"/></svg>Alumni</a></div>';
    }
  }

  public function actions_manager() {
    add_action( 'template_redirect', array( $this, 'redirect_if_logged_in' ) );

    if ( empty ( $this->alumni_home_id ) || empty( $this->alumni_login_id ) ) {
      add_action( 'admin_notices', array( $this, 'notify_if_pages_unlinked' ) );
    }
  }
}
