<?php
  /*Template Name:Wider Full-width Page */
	get_header();
	the_post();
?>
<section class="main-content">

	<header class="page-header">
		<div class="container">
			<?php get_template_part( 'inc/partials/entry/page', 'header' ); ?>
		</div>
	</header>

	<div class="container">
		<div class="columns">
			<div class="column is-12">
				<section class="entry-page-content padding-top-xl">
					<div class="text-format content body-big">
						<?php the_content(); ?>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
