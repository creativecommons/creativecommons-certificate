<?php
/* Template name: Home Page */
/**
 * Home Page Template
 *
 * The template used for the main site's home page.
 *
 * Sections:
 * - Hero w/ featured course blocks
 * - FAQ section
 * - Featured blog posts from creativecommons.org
 *
 * @link Figma Doc https://www.figma.com/file/GFL1IJOfjKqRxBy1vYDBcc/Mockups?node-id=1203%3A1
 */

  get_header();
  $featured_posts = Certificates_ACF::load_home_featured_posts();
?>

<main>
  <?php
	// Hero Image and featured courses
	include get_template_part( 'inc/partials/home', 'hero' );
	?>

  <section class="has-background-grey-lighter padding-top-big padding-bottom-xl">
	<div class="container">

	  <div class="columns is-variable is-6 padding-bottom-large">
		<div class="column is-two-thirds">
		  <?php include get_template_part( 'inc/partials/home', 'faq' ); ?>
		</div>
		<?php // Links Section (Hardcoded for now) ?>
		<div class="column after-faq">
		  <h5 class="margin-bottom-normal"><a href="/course-content" class="has-text-forest-green">Course Content</a></h5>
		  <p>Access current course content here. Unless otherwise noted, all course content is licensed CC BY 4.0. Also available in audio and remixed for a book publication!</p>

		  <hr />

		  <h5 class="margin-bottom-normal"><a href="/registration" class="has-text-forest-green">Registration</a></h5>
		  <p>Register for one of our upcoming courses, and join a growing number of CC Certified professionals working in education, libraries, and cultural heritage.</p>
		</div>
	  </div>

	  <div class="columns is-variable is-6 is-desktop">
		<div class="column is-half-desktop is-full-tablet">
		  <?php include get_template_part( 'inc/partials/home', 'featured-testimonials' ); ?>
		</div>
		<div class="column is-half">
		  <div class="columns is-vcentered is-gapless">
			<div class="column">
			  <h3>Upcoming Course</h3>
			</div>
			<div class="column is-narrow">
			  <?php // @todo: Don't hardcode this link ?>
			  <a href="/calendar" class="title is-5 has-text-grey-dark">See Calendar</a>
			</div>
		  </div>
		  <div>
			  <div>
				<div class="fixed-card">
				  <div class="left">
					<svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0)">
					<path d="M0 18.125C0 19.1602 0.879836 20 1.96429 20H16.369C17.4535 20 18.3333 19.1602 18.3333 18.125V7.5H0V18.125ZM13.0952 10.4688C13.0952 10.2109 13.3162 10 13.5863 10H15.2232C15.4933 10 15.7143 10.2109 15.7143 10.4688V12.0312C15.7143 12.2891 15.4933 12.5 15.2232 12.5H13.5863C13.3162 12.5 13.0952 12.2891 13.0952 12.0312V10.4688ZM13.0952 15.4688C13.0952 15.2109 13.3162 15 13.5863 15H15.2232C15.4933 15 15.7143 15.2109 15.7143 15.4688V17.0312C15.7143 17.2891 15.4933 17.5 15.2232 17.5H13.5863C13.3162 17.5 13.0952 17.2891 13.0952 17.0312V15.4688ZM7.85714 10.4688C7.85714 10.2109 8.07812 10 8.34821 10H9.98512C10.2552 10 10.4762 10.2109 10.4762 10.4688V12.0312C10.4762 12.2891 10.2552 12.5 9.98512 12.5H8.34821C8.07812 12.5 7.85714 12.2891 7.85714 12.0312V10.4688ZM7.85714 15.4688C7.85714 15.2109 8.07812 15 8.34821 15H9.98512C10.2552 15 10.4762 15.2109 10.4762 15.4688V17.0312C10.4762 17.2891 10.2552 17.5 9.98512 17.5H8.34821C8.07812 17.5 7.85714 17.2891 7.85714 17.0312V15.4688ZM2.61905 10.4688C2.61905 10.2109 2.84003 10 3.11012 10H4.74702C5.01711 10 5.2381 10.2109 5.2381 10.4688V12.0312C5.2381 12.2891 5.01711 12.5 4.74702 12.5H3.11012C2.84003 12.5 2.61905 12.2891 2.61905 12.0312V10.4688ZM2.61905 15.4688C2.61905 15.2109 2.84003 15 3.11012 15H4.74702C5.01711 15 5.2381 15.2109 5.2381 15.4688V17.0312C5.2381 17.2891 5.01711 17.5 4.74702 17.5H3.11012C2.84003 17.5 2.61905 17.2891 2.61905 17.0312V15.4688ZM16.369 2.5H14.4048V0.625C14.4048 0.28125 14.1101 0 13.75 0H12.4405C12.0804 0 11.7857 0.28125 11.7857 0.625V2.5H6.54762V0.625C6.54762 0.28125 6.25298 0 5.89286 0H4.58333C4.22321 0 3.92857 0.28125 3.92857 0.625V2.5H1.96429C0.879836 2.5 0 3.33984 0 4.375V6.25H18.3333V4.375C18.3333 3.33984 17.4535 2.5 16.369 2.5Z" fill="#333333"/>
					</g>
					<defs>
					<clipPath id="clip0">
					<rect width="18.3333" height="20" fill="white"/>
					</clipPath>
					</defs>
					</svg>
					<span class="title is-5">September 27</span>
					<span class="title is-5">December 5</span>
				  </div>
				  <div class="right">
					<h3 class="subtitle is-5 margin-bottom-normal">Certificate for Librarians</h3>
					<p>Description metus ligula pharetra litora class massa viverra, facilisis cum aenean hendrerit eget magnis convallis.</p>
					<a href="" class="is-block has-text-weight-semibold margin-top-normal">see course details</a>
				  </div>
				</div>
			  </div>
		  </div>
		</div>
	  </div>

	</div>
  </section>
  <section class="padding-top-xl padding-bottom-xxl">
	<div class="container">

	  <section class="padding-bottom-lg">
		<h2>Education News From The Blog</h2>

		<div class="education-news-home margin-top-bigger">
		<?php
		if ( have_rows( 'featured_news' ) ) :
			while ( have_rows( 'featured_news' ) ) :
				the_row();
				$post        = $featured_posts[ get_sub_field( 'post_id' ) ];
				$date        = new DateTime( $post->date );
				$pretty_date = $date->format( 'F d, Y' );

				$link        = get_sub_field( 'additional_link' );
				$link_url    = $link['url'];
				$link_title  = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
		  <div class="education-news-home__post">
			<div class="has-background-soft-gold">
			  <figure class="image is-5by3">
				<a href="<?php echo $post->link; ?>">
				  <img src="<?php echo $post->featured_media_url; ?>" alt="<?php echo $post->featured_media_alt_text; ?>">
				</a>
			  </figure>
			  <div class="padding-big body">
				<h4 class="subtitle is-5">
				  <a href="<?php echo $post->link; ?>">
					<?php echo $post->title->rendered; ?>
				  </a>
				</h4>
				<p class="caption margin-top-normal">
				  <span><?php echo $post->author_name; ?></span>
				  <svg class="margin-horizontal-smaller" width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
				  <circle opacity="0.2" cx="3" cy="3" r="3" fill="black" />
				</svg>
				<span><?php echo $pretty_date; ?></span>
			  </p>
			</div>
		  </div>
			<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="is-block margin-top-big has-text-weight-bold margin-bottom-large">
				<?php echo $link_title; ?>
			</a>
		</div>
					<?php
		endwhile;
endif;
		?>
	  </div>

	</section>

	  <div class="home-tweets">
		<div class="margin-bottom-big home-tweets__header">
		  <h2>Conversations in the Community</h2>
		  <a class="button small twitter margin-right-big" target="_blank" rel="noreferrer nofollow" href="https://twitter.com/hashtag/OpenGLAM">See #OpenGLAM Posts</a>
		</div>
		<div class="home-tweets__tweets">
		  <?php
			if ( have_rows( 'featured_tweets' ) ) :
				while ( have_rows( 'featured_tweets' ) ) :
					the_row();
					$tweet = get_sub_field( 'tweet_url' );
					?>
			  <div class="tweet">
				<div class="embed-container">
					<?php echo $tweet; ?>
				</div>
			  </div>
						  <?php
		endwhile;
endif;
			?>
		</div>
	  </div>
	</div>
  </section>
</main>

<?php get_footer(); ?>
