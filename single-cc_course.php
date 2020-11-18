<?php
	get_header();
	the_post();
?>
<section class="main-content">
	<header class="single-header">
		<div class="container">
			<div class="columns is-centered">
				<div class="column is-12">
					<?php get_template_part( 'inc/partials/entry/course', 'header' ); ?>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="columns is-centered">
		<div class="column is-4">
			wow
		</div>
			<div class="column is-8">
				<section class="entry-page-content">
					<div class="text-format body-big">
						<?php the_content(); ?>
					</div>
					<div class="entry-meta">
						<?php
							$course_duration = get_post_meta( get_the_ID(), 'course_duration', true );
							$course_language = get_post_meta( get_the_ID(), 'course_language', true );
							$course_url = get_post_meta( get_the_ID(), 'course_apply_url', true );
							if ( !empty( $course_duration ) || !empty( $course_language ) || !empty( $course_url ) ) {
								echo '<div class="columns is-vcentered margin-vertical-big">';
									if ( !empty( $course_url ) ) {
										echo '<div class="column">';
											echo '<a href="'.$course_url.'" class="button is-info">Register here</a>';
										echo '</div>';
									}
									if ( !empty( $course_duration ) ) {
										echo '<div class="column">';
											echo '<strong>Duration: </strong>';
											echo $course_duration;
										echo '</div>';
									}
									if ( !empty( $course_language ) ) {
										echo '<div class="column">';
											echo '<strong>Language: </strong>';
											echo $course_language;
										echo '</div>';
									}
								echo '</div>';
							}
						 ?>
					</div>
          <?php
            $upcoming_events = Certificates_Website::get_upcoming_course_events( get_the_ID() );
            if ( !empty( $upcoming_events ) ) {
              echo '<h4>Upcoming Courses</h4>';
              echo '<div class="columns padding-top-large">';
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
