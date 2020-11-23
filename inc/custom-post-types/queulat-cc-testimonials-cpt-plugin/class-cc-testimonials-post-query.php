<?php

use Queulat\Post_Query;

class Cc_Testimonials_Post_Query extends Post_Query {

	public function get_post_type() : string {
		return 'cc_testimonials';
	}
	public function get_decorator() : string {
		return Cc_Testimonials_Post_Object::class;
	}
	public function get_default_args() : array {
		return array();
	}
}
