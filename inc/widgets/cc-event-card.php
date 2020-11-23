<?php
class WP_Widget_Event extends WP_Widget {


	/**
	 * constructor
	 */
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'cc-event',
			'description' => 'This is a Vocabulary event card ',
		);
		$control_ops = array();
		parent::__construct( 'cc-event', 'CC Event card', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		if ( ! empty( $instance['event'] ) ) {
			$event_id = $insance['event'];
		} else {
			$last_event = $this->get_last_event();
			if ( ! empty( $last_event ) ) {
				$event_id = $last_event->ID;
			}
		}
		if ( ! empty( $event_id ) ) {
			echo '<div class="widget event-card">';
			echo Components::card_post_event( $event_id, true );
			echo '</div>';
		}
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
	function get_last_event() {
		$events = new WP_Query(
			array(
				'post_type'      => 'cc_events',
				'post_status'    => 'publish',
				'posts_per_page' => 1,
			)
		);
		if ( $events->have_posts() ) {
			return $events->posts[0];
		} else {
			return false;
		}
	}
	function get_events() {
		$events = new WP_Query(
			array(
				'post_type'      => 'cc_events',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
			)
		);
		if ( $events->have_posts() ) {
			return $events->posts;
		} else {
			return false;
		}
	}

	function form( $instance ) {
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label>Select Course: </label>';
		$event_list = $this->get_events();
		echo '<select class="widefat" id="' . $this->get_field_id( 'event' ) . '" name="' . $this->get_field_name( 'event' ) . '">';
		echo '<option value="">Select event</option>';
		foreach ( $event_list as $event ) {
			echo '<option value="' . $event->ID . '" ' . ( ( $instance['event'] == $event->ID ) ? 'selected="selected"' : '' ) . '>' . get_the_title( $event->ID ) . '</option>';
		}
		echo "<small>If you don't select an event it'll show the last one</small>";
		echo '</select>';
		echo '</p>';
	}
}
function cc_event_card_widget_init() {
	register_widget( 'WP_Widget_Event' );
}

add_action( 'widgets_init', 'cc_event_card_widget_init' );
