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
  include get_template_part('inc/partials/home', 'faq');
  ?>
</main>

<?php get_footer(); ?>
