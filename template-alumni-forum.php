<?php
  /*Template Name: Alumni Forum */
	get_header();
	the_post();
?>
<section class="main-content">

	<header class="padding-top-big">
		<div class="container">
			<div class="alumni-header">
				<div>
					<?php
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">', '</p>' );
					}
					?>
					<h1>Forum</h1>

					<div class="text-format content body-bigger margin-bottom-xl margin-top-big">
						<?php the_content(); ?>
					</div>
					<a class="button is-success" href="<?php echo bbp_forum_topics_link(); ?>">Submit a Post</a>
				</div>

				<div class="alumni-members-wrapper alumni-members-wrapper--fancy">
					<?php $alumni->render_alumni( 40 ); ?>
				</div>

			</div>
		</div>
	</header>

	<div class="container">
		<div class="columns">
			<div class="column is-6">
				<section class="entry-page-content padding-top-xl">
					<div class="text-format content body-big">
						Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate, repellendus. Adipisci ex sed magnam maiores consectetur officia quis recusandae enim.
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
