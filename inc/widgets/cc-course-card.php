<?php
class WP_Widget_Course extends WP_Widget {

	/** constructor */
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'cc-course',
			'description' => 'This is a Vocabulary card with a selected course information',
		);
		$control_ops = array();
		parent::__construct( 'cc-course', 'CC Course card', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
    if ( !empty( $instance['course'] ) ) {
      $title = ( !empty( $instance['title'] ) ) ? $instance['title'] : 'Course';
      $course = get_post( $instance['course'] );
      $description = do_excerpt( $course );
      $url = get_permalink( $instance[ 'course' ] );
      $course_title = get_the_title( $instance['course'] );
      echo '<div class="widget course-card">';
        echo Components::card_post( $instance['course'], true, false, false, false, true, true, true, $title, $description, $url, $course_title, false, false, 'vertical', 'Read more', 'small', 'is-info'  );
      echo '</div>';
    }
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

  function get_courses() {
    $courses = new WP_Query( array(
      'post_type' => 'cc_course',
      'post_status' => 'publish',
      'posts_per_page' => -1
    ) );
    if ( $courses->have_posts() ) {
      return $courses->posts;
    } else {
      return false;
    }
  }

	function form( $instance ) {
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label>Select Course: </label>';
    $courses_list = $this->get_courses();
		echo '<select class="widefat" id="' . $this->get_field_id( 'course' ) . '" name="' . $this->get_field_name( 'course' ) . '">';
		echo '<option value="">Select Course</option>';
		foreach ($courses_list as $course) {
			echo '<option value="' . $course->ID . '" ' . ( ( $instance['course'] == $course->ID ) ? 'selected="selected"' : '' ) . '>' . get_the_title($course->ID) . '</option>';
		}
		echo '</select>';
		echo '</p>';
	}
}
function cc_course_card_widget_init() {
	register_widget( 'WP_Widget_Course' );
}

add_action( 'widgets_init', 'cc_course_card_widget_init' );
