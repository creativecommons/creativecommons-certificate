<?php
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
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</header>

	<div class="container">
		<div class="columns">
			<div class="column is-6">
				<section class="entry-page-content padding-top-xl">
					<div class="text-format content body-big">
						<?php the_content(); ?>

						<form action="">
							<input type="text" class="input is-big" placeholder="Search any member">
						</form>
					</div>

					<div>
						<?php $alumni->render_alumni(); ?>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
