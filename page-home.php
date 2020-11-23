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
		  <div class="glide testimonials-slider">
			<div class="glide__track" data-glide-el="track">
			  <ul class="glide__slides">
				<li class="glide__slide">
				<div class="margin-right-bigger img-wrap">
				<img src="https://placekitten.com/500/500" width="168" height="168" alt="">
				</div>
				<blockquote class="body-bigger">
				  <svg width="46" height="32" viewBox="0 0 46 32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M27.3836 26.8797C25.8676 24.1902 25 21.0676 25 17.737C25 11.3769 29.1325 2.81312 39.3401 0L41.196 5.31367C36.3588 7.02275 33.1774 10.4191 32.8559 12.5458C33.8727 12.1893 34.9648 11.9956 36.1017 11.9956C41.5684 11.9956 46 16.4737 46 21.9978C46 27.5219 41.5684 32 36.1017 32C32.3717 32 29.1235 29.9151 27.4362 26.8357L27.3836 26.8797Z" fill="#333333"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M2.38359 26.8797C0.867634 24.1902 -1.90735e-06 21.0676 -1.90735e-06 17.737C-1.90735e-06 11.3769 4.13252 2.81312 14.3401 0L16.196 5.31367C11.3588 7.02275 8.17739 10.4191 7.85587 12.5458C8.87269 12.1893 9.96483 11.9956 11.1017 11.9956C16.5684 11.9956 21 16.4737 21 21.9978C21 27.5219 16.5684 32 11.1017 32C7.37168 32 4.12352 29.9151 2.43624 26.8357L2.38359 26.8797Z" fill="#333333"/>
				  </svg>

				  <p>Viverra sit pellentesque adipiscing adipiscing. Magna tincidunt tristique dictumst suspendisse adipiscing et sed. Mattis diam arcu lobortis nam.</p>
				  <cite><p>CC Nepal: Roshan Kumar Karn.</p></cite>
				</blockquote>
				</li>
				<li class="glide__slide">
				<div class="margin-right-bigger img-wrap">
				<img src="https://placekitten.com/500/500" width="168" height="168" alt="">
				</div>
				<blockquote class="body-bigger">
				  <svg width="46" height="32" viewBox="0 0 46 32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M27.3836 26.8797C25.8676 24.1902 25 21.0676 25 17.737C25 11.3769 29.1325 2.81312 39.3401 0L41.196 5.31367C36.3588 7.02275 33.1774 10.4191 32.8559 12.5458C33.8727 12.1893 34.9648 11.9956 36.1017 11.9956C41.5684 11.9956 46 16.4737 46 21.9978C46 27.5219 41.5684 32 36.1017 32C32.3717 32 29.1235 29.9151 27.4362 26.8357L27.3836 26.8797Z" fill="#333333"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M2.38359 26.8797C0.867634 24.1902 -1.90735e-06 21.0676 -1.90735e-06 17.737C-1.90735e-06 11.3769 4.13252 2.81312 14.3401 0L16.196 5.31367C11.3588 7.02275 8.17739 10.4191 7.85587 12.5458C8.87269 12.1893 9.96483 11.9956 11.1017 11.9956C16.5684 11.9956 21 16.4737 21 21.9978C21 27.5219 16.5684 32 11.1017 32C7.37168 32 4.12352 29.9151 2.43624 26.8357L2.38359 26.8797Z" fill="#333333"/>
				  </svg>

				  <p>Viverra sit pellentesque adipiscing adipiscing. Magna tincidunt tristique dictumst suspendisse adipiscing et sed. Mattis diam arcu lobortis nam.</p>
				  <cite><p>CC Nepal: Roshan Kumar Karn.</p></cite>
				</blockquote>
				</li>
				<li class="glide__slide">
				<div class="margin-right-bigger img-wrap">
				<img src="https://placekitten.com/500/500" width="168" height="168" alt="">
				</div>
				<blockquote class="body-bigger">
				  <svg width="46" height="32" viewBox="0 0 46 32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M27.3836 26.8797C25.8676 24.1902 25 21.0676 25 17.737C25 11.3769 29.1325 2.81312 39.3401 0L41.196 5.31367C36.3588 7.02275 33.1774 10.4191 32.8559 12.5458C33.8727 12.1893 34.9648 11.9956 36.1017 11.9956C41.5684 11.9956 46 16.4737 46 21.9978C46 27.5219 41.5684 32 36.1017 32C32.3717 32 29.1235 29.9151 27.4362 26.8357L27.3836 26.8797Z" fill="#333333"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M2.38359 26.8797C0.867634 24.1902 -1.90735e-06 21.0676 -1.90735e-06 17.737C-1.90735e-06 11.3769 4.13252 2.81312 14.3401 0L16.196 5.31367C11.3588 7.02275 8.17739 10.4191 7.85587 12.5458C8.87269 12.1893 9.96483 11.9956 11.1017 11.9956C16.5684 11.9956 21 16.4737 21 21.9978C21 27.5219 16.5684 32 11.1017 32C7.37168 32 4.12352 29.9151 2.43624 26.8357L2.38359 26.8797Z" fill="#333333"/>
				  </svg>

				  <p>Viverra sit pellentesque adipiscing adipiscing. Magna tincidunt tristique dictumst suspendisse adipiscing et sed. Mattis diam arcu lobortis nam.</p>
				  <cite><p>CC Nepal: Roshan Kumar Karn.</p></cite>
				</blockquote>
				</li>

			  </ul>
			</div>

			<div class="testimonial-slider-controls">
			  <div class="glide__arrows" data-glide-el="controls">
				<button class="glide__arrow glide__arrow--left" data-glide-dir="<">
				  <span class="is-sr-only">Previous</span>
				  <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.823834 6.00283L6.51768 0.309277C6.79219 0.0347656 7.23751 0.0347656 7.51202 0.309277L8.17618 0.973438C8.4504 1.24766 8.45069 1.6918 8.17735 1.9666L3.66475 6.5L8.17706 11.0337C8.45069 11.3085 8.4501 11.7526 8.17589 12.0269L7.51172 12.691C7.23721 12.9655 6.7919 12.9655 6.51739 12.691L0.823834 6.99717C0.549323 6.72266 0.549323 6.27734 0.823834 6.00283V6.00283Z" fill="black"/>
				  </svg>
				</button>

				<div class="glide__bullets" data-glide-el="controls[nav]">
				  <button class="glide__bullet" data-glide-dir="=0"></button>
				  <button class="glide__bullet" data-glide-dir="=1"></button>
				  <button class="glide__bullet" data-glide-dir="=2"></button>
				</div>

				<button class="glide__arrow glide__arrow--right" data-glide-dir=">">
				  <span class="is-sr-only">Next</span>
				  <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.17606 6.99723L2.48239 12.6909C2.20779 12.9655 1.7626 12.9655 1.48803 12.6909L0.823954 12.0268C0.549823 11.7527 0.549296 11.3084 0.822783 11.0336L5.33512 6.50003L0.822783 1.96649C0.549296 1.69171 0.549823 1.24742 0.823954 0.973293L1.48803 0.309221C1.76263 0.0346216 2.20782 0.0346216 2.48239 0.309221L8.17604 6.00286C8.45063 6.27743 8.45064 6.72263 8.17606 6.99723Z" fill="black"/>
				  </svg>
				</button>
			  </div>
			  <a href="/testimonials" class="has-text-weight-semi-bold">Read What Graduates Say</a>
			</div>

		  </div>
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
