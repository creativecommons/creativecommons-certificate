<?php
	get_header();
	the_post();
?>
<section class="main-content">
	<header class="page-header">
		<div class="container">
			<div class="columns is-centered">
				<div class="column is-12">
					<?php get_template_part( 'inc/partials/entry/page', 'header' ); ?>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="columns">
			<div class="column is-8">
				<section class="entry-page-content">
					<div class="text-format content">
						<?php the_content(); ?>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
