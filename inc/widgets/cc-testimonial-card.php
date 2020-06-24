<?php
class WP_Widget_Testimonial extends WP_Widget {

	/** constructor */
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'cc-testimonial',
			'description' => 'This is a Vocabulary card with a selected testimonial information',
		);
		$control_ops = array();
		parent::__construct( 'cc-testimonial', 'CC Testimonial card', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		if ( ! empty( $instance['testimonial'] ) ) {
			$title                   = ( ! empty( $instance['title'] ) ) ? $instance['title'] : 'Testimonial';
			$testimonial             = get_post( $instance['testimonial'] );
			$author_name             = get_the_title( $instance['testimonial'] );
			$author_description_meta = get_post_meta( $instance['testimonial'], 'testimonial_description', true );
			$author_location_meta    = get_post_meta( $instance['testimonial'], 'testimonial_location', true );
			$add_location            = ( ! empty( $author_location_meta ) ) ? $author_location_meta . ' - ' : '';
			$card_description        = $add_location . ' ' . esc_attr( $author_description_meta );
			echo '<div class="widget testimonial-card">';
			echo Components::card_quote( $instance['testimonial'], true, $author_name, $card_description );
			echo '</div>';
		}
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function get_testimonials() {
		$testimonials = new WP_Query(
			array(
				'post_type'      => 'cc_testimonials',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
			)
		);
		if ( $testimonials->have_posts() ) {
			return $testimonials->posts;
		} else {
			return false;
		}
	}

	function form( $instance ) {
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label>Select Testimonial: </label>';
		$testimonials_list = $this->get_testimonials();
		echo '<select class="widefat" id="' . $this->get_field_id( 'testimonial' ) . '" name="' . $this->get_field_name( 'testimonial' ) . '">';
		echo '<option value="">Select Testimonial</option>';
		foreach ( $testimonials_list as $testimonial ) {
			echo '<option value="' . $testimonial->ID . '" ' . ( ( $instance['testimonial'] == $testimonial->ID ) ? 'selected="selected"' : '' ) . '>' . get_the_title( $testimonial->ID ) . '</option>';
		}
		echo '</select>';
		echo '</p>';
	}
}
function cc_testimonial_card_widget_init() {
	register_widget( 'WP_Widget_Testimonial' );
}

add_action( 'widgets_init', 'cc_testimonial_card_widget_init' );
