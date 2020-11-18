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

?>

<main>
  <?php
  // Hero Image and featured courses
  include get_template_part('inc/partials/home', 'hero');
  ?>

  <section class="has-background-grey-lighter padding-top-big padding-bottom-xl">
    <div class="container">

      <div class="columns is-variable is-6 padding-bottom-xl">
        <div class="column is-two-thirds">
          <?php include get_template_part('inc/partials/home', 'faq'); ?>
        </div>
        <?php // Links Section (Hardcoded for now) ?>
        <div class="column after-faq">
          <h5 class="margin-bottom-normal"><a href="" class="has-text-forest-green">Course Content</a></h5>
          <p>Access current course content here. Unless otherwise noted, all course content is licensed CC BY 4.0. Also available in audio and remixed for a book publication!</p>

          <hr />

          <h5 class="margin-bottom-normal"><a href="" class="has-text-forest-green">Registration</a></h5>
          <p>Register for one of our upcoming courses, and join a growing number of CC Certified professionals working in education, libraries, and cultural heritage.</p>
        </div>
      </div>

      <div class="columns">
        <div class="column is-half">
          <p>Testimonials Slider Goes Here.</p>
        </div>
        <div class="column is-half">
          <div class="columns is-vcentered">
            <div class="column">
              <h3>Upcoming Course</h3>

            </div>
            <div class="column is-narrow">
              <?php // @todo: Don't hardcode this link ?>
              <a href="/calendar" class="title is-5 has-text-grey-dark">See Calendar</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <section class="padding-top-xl padding-bottom-xxl">
    <div class="container">

      <div class="padding-bottom-xl">
        <h2>Education News From The Blog</h2>

        <div class="columns is-variable is-6">
        </div>
      </div>

      <div class="home-tweets">
        <div class="margin-bottom-big home-tweets__header">
          <h2>Conversations in the Community</h2>
          <a class="button small twitter margin-right-big" target="_blank" rel="noreferrer nofollow" href="https://twitter.com/hashtag/OpenGLAM">See #OpenGLAM Posts</a>
        </div>
        <div class="home-tweets__tweets is-variable is-6">
          <?php if( have_rows('featured_tweets') ): while( have_rows('featured_tweets') ) : the_row();
              $tweet = get_sub_field('tweet_url'); ?>
              <div class="tweet">
                <div class="embed-container">
                  <?php echo $tweet; ?>
                </div>
              </div>
        <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
