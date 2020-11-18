<div class="wrapper">
	<?php
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<p class="breadcrumbs breadcrumbs--dark" id="breadcrumbs">', '</p>' );
	}
	?>

	<div class="padding-vertical-large padding-horizontal-larger has-background-white title-box">
		<h2 class="title is-2 has-text-black"><?php the_title(); ?></h2>
	</div>
</div>
