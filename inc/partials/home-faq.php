<?php
/**
 * Home FAQ Section.
 */

$featured_faq_titles = get_field('featured_faqs');
$faqs = get_faqs_by_titles($featured_faq_titles);
?>
<div>
  <h2>Frequently Asked Questions</h2>
  <ul class="margin-top-large margin-bottom-large accordion">
    <?php foreach ($faqs as $faq) : ?>
      <li class="margin-top-big padding-bottom-big body-big accordion-item">
        <p class="has-color-dark-slate-gray">
          <?php echo $faq['question']; ?>
        </p>
        <span class="icon has-text-black">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" class="caret">
            <path fill="currentColor" d="M1426.44 407.864q0 26-19 45l-448 448q-19 19-45 19t-45-19l-448-448q-19-19-19-45t19-45q19-19 45-19h896q26 0 45 19t19 45z"/>
          </svg>
        </span>
      </li>
    <?php endforeach; ?>
  </ul>
  <a href="<?php echo get_page_link(32); ?>" class="button is-success small">See All FAQs</a>
</div>
