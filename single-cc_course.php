<?php
	get_header();
	the_post();

	$course_img        = $image = get_field( 'banner_image' );
	$size              = 'full'; // (thumbnail, medium, large, full or custom size)
	// Use the local registration link, OR fallback to the global registration link
	$registration_link = get_field( 'registration_link' ) ?: get_field( 'registration_link', 'options' );
	$course_language   = get_field( 'language' );

?>
<section class="main-content">
	<header class="single-header single-header--course">
		<?php
			if( $image ) {
				echo wp_get_attachment_image( $image, $size );
			}

		?>
		<div class="container">
			<?php get_template_part( 'inc/partials/entry/course', 'header' ); ?>
		</div>
	</header>
	<div class="container">
		<div class="columns margin-top-0 is-desktop">
		<div class="column is-3-desktop has-background-soft-gold course-sidebar is-full">
					<div class="entry-meta margin-top-xxl">
						<?php
							$course_duration = get_post_meta( get_the_ID(), 'course_duration', true );
							$course_url      = get_post_meta( get_the_ID(), 'course_apply_url', true );
						if ( ! empty( $course_duration ) || ! empty( $course_language ) || ! empty( $course_url ) ) {
							if ( ! empty( $course_url ) ) {
								echo '<div class="column">';
									echo '<a href="' . $course_url . '" class="button is-info">Register here</a>';
								echo '</div>';
							}
							if ( ! empty( $course_duration ) ) {
								echo '<div>';
									echo '<strong>Duration: </strong>';
									echo $course_duration;
								echo '</div>';
							}
							if ( ! empty( $course_language ) ) {
								echo '<div>';
									echo '<span class="margin-right-normal is-inline-block"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0928 4.6875C9.66797 2.07129 8.66602 0.234375 7.5 0.234375C6.33398 0.234375 5.33203 2.07129 4.90723 4.6875H10.0928ZM4.6875 7.5C4.6875 8.15039 4.72266 8.77441 4.78418 9.375H10.2129C10.2744 8.77441 10.3096 8.15039 10.3096 7.5C10.3096 6.84961 10.2744 6.22559 10.2129 5.625H4.78418C4.72266 6.22559 4.6875 6.84961 4.6875 7.5ZM14.2002 4.6875C13.3623 2.69824 11.666 1.16016 9.57129 0.539062C10.2861 1.5293 10.7783 3.02051 11.0361 4.6875H14.2002ZM5.42578 0.539062C3.33398 1.16016 1.63477 2.69824 0.799805 4.6875H3.96387C4.21875 3.02051 4.71094 1.5293 5.42578 0.539062ZM14.5137 5.625H11.1533C11.2148 6.24023 11.25 6.87012 11.25 7.5C11.25 8.12988 11.2148 8.75977 11.1533 9.375H14.5107C14.6719 8.77441 14.7627 8.15039 14.7627 7.5C14.7627 6.84961 14.6719 6.22559 14.5137 5.625ZM3.75 7.5C3.75 6.87012 3.78516 6.24023 3.84668 5.625H0.486328C0.328125 6.22559 0.234375 6.84961 0.234375 7.5C0.234375 8.15039 0.328125 8.77441 0.486328 9.375H3.84375C3.78516 8.75977 3.75 8.12988 3.75 7.5ZM4.90723 10.3125C5.33203 12.9287 6.33398 14.7656 7.5 14.7656C8.66602 14.7656 9.66797 12.9287 10.0928 10.3125H4.90723ZM9.57422 14.4609C11.666 13.8398 13.3652 12.3018 14.2031 10.3125H11.0391C10.7812 11.9795 10.2891 13.4707 9.57422 14.4609ZM0.799805 10.3125C1.6377 12.3018 3.33398 13.8398 5.42871 14.4609C4.71387 13.4707 4.22168 11.9795 3.96387 10.3125H0.799805Z" fill="black"/></svg></span>';
									echo '<strong>Language: </strong>';
									echo $course_language;
								echo '</div>';
							}
						}
						?>

						 <a href="<?php echo $registration_link; ?>" class="button register margin-top-bigger">Register Here</a>
					</div>
				</div>
			<div class="column is-9">
				<section class="entry-page-content margin-top-xxl padding-horizontal-xxl">
					<div class="text-format body-big">
						<?php the_content(); ?>
					</div>
		  <?php
						$upcoming_events = Certificates_Website::get_upcoming_course_events( get_the_ID() );

				if ( ! empty( $upcoming_events ) ) {
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
