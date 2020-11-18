<?php
	get_header();
	the_post();
?>
<section class="main-content">
	<header class="single-header single-header--course">
		<div class="container">
			<?php get_template_part( 'inc/partials/entry/course', 'header' ); ?>
		</div>
	</header>
	<div class="container">
		<div class="columns margin-top-0 is-desktop">
		<div class="column is-3 has-background-soft-gold course-sidebar">
					<div class="entry-meta margin-top-xxl">
						<?php
							$course_duration = get_post_meta( get_the_ID(), 'course_duration', true );
							$course_language = get_post_meta( get_the_ID(), 'course_language', true );
							$course_url = get_post_meta( get_the_ID(), 'course_apply_url', true );
							if ( !empty( $course_duration ) || !empty( $course_language ) || !empty( $course_url ) ) {
									if ( !empty( $course_url ) ) {
										echo '<div class="column">';
											echo '<a href="'.$course_url.'" class="button is-info">Register here</a>';
										echo '</div>';
									}
									if ( !empty( $course_duration ) ) {
										echo '<div>';
											echo '<strong>Duration: </strong>';
											echo $course_duration;
										echo '</div>';
									}
									if ( !empty( $course_language ) ) {
										echo '<div>';
											echo '<strong>Language: </strong>';
											echo $course_language;
										echo '</div>';
									}
							}
						 ?>

						 <a href="" class="button register margin-top-bigger">Register Here</a>
					</div>
				</div>
			<div class="column is-9">
				<section class="entry-page-content margin-top-xxl padding-horizontal-xxl">
					<div class="text-format body-big">
						<?php the_content(); ?>
					</div>
          <?php
						$upcoming_events = Certificates_Website::get_upcoming_course_events( get_the_ID() );

            if ( !empty( $upcoming_events ) ) {
              echo '<h3>Upcoming Dates</h3>';
              echo '<div class="columns padding-top-bigger">';
                foreach ( $upcoming_events as $event ) {
									$entry_date = get_post_meta( $event->ID, 'event_dtstart_date', true );

                  echo '<div class="column">';
                    echo Components::card_post_event( $event->ID, false, $entry_date );
                  echo '</div>';
                }
              echo '</div>';
            }
           ?>
					<footer class="entry-footer">
						<?php get_template_part( 'inc/partials/entry/page', 'footer' ); ?>
					</footer>
				</section>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
