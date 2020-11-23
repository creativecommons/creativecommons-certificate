<?php
  /*Template Name: Resources Page */
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
		<div class="columns is-variable is-5">
			<div class="column is-8">
				<section class="entry-page-content padding-top-xl">
					<div class="text-format content body-big">
						<?php the_content(); ?>
					</div>
				</section>
			</div>
	  <aside class="column is-4">
		<div class="resources margin-top-xl">
		  <?php
			if ( have_rows( 'resources' ) ) :
				while ( have_rows( 'resources' ) ) :
					the_row();
					?>
					<?php
					$link        = get_sub_field( 'resource' );
					$link_url    = $link['url'];
					$link_title  = $link['title'];
					$link_target = $link['target'];
					?>
			<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="resource is-block has-background-forest-green padding-vertical-bigger padding-horizontal-large has-text-white margin-bottom-normal">
			  <span class="has-text-semi-bold is-block">Resources</span>
			  <h3 class="title is-3 has-text-white"><?php echo $link_title; ?></h3>
			</a>

						  <?php
			endwhile;
		  endif;
			?>

		</div>
	  </aside>
		</div>
	</div>
</section>
<?php get_footer(); ?>
