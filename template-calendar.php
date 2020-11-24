<?php
  /*Template Name: Calendar Page */
	get_header();
	the_post();

	$upcoming_courses = Certificates_Website::get_upcoming_course_events();
?>
<section class="main-content">

	<header class="page-header">
		<div class="container">
			<?php get_template_part( 'inc/partials/entry/page', 'header' ); ?>
		</div>
	</header>

	<div class="container">
		<div class="columns">
			<div class="column is-8">
				<section class="entry-page-content padding-top-xl">
					<div class="text-format content body-big">
						<?php the_content(); ?>

						<h2>Upcoming Courses</h2>

						<ul class="margin-top-bigger course-list">
						<?php foreach ( $upcoming_courses as $course ) : ?>
							<li>
								<?php echo Certificates_Website::event_card( $course->ID ); ?>
							</li>
						<?php endforeach; ?>
						</ul>

					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
