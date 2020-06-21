<?php
class Certificates_Website {
  public static function set_certificates_logo() {
    return 'products/certificates.svg#certificates';
  }
  public static function set_certificates_logo_image_size() {
    return '215 40';
  }
}

add_filter('cc_theme_base_set_default_size_logo', array( 'Certificates_Website', 'set_certificates_logo_image_size' ) );
add_filter('cc_theme_base_set_default_logo', array( 'Certificates_Website', 'set_certificates_logo' ));