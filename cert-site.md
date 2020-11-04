Live Site: https://certificates.creativecommons.org/

The certificates site is a WordPress _Multisite_ installation, comprised of one main site and several sites in the form of _books_, powered by [pressbooks](https://github.com/pressbooks/pressbooks). For this project the book sites should remain the same as much as possible, using the currently active theme, styles, and settings. The only changes made should be to update dependencies.

The following sections are notes on styling and functionality, scoped to the relevant page section.

## Site

## notes

- Here's the [Figma mockups](https://www.figma.com/file/GFL1IJOfjKqRxBy1vYDBcc/Mockups?node-id=1203%3A0)
- <details>
    <summary>Currently installed plugin list:</summary>
    <ul>
      <li>Akismet Anti-Spam</li>
      <li>Jetpack by WordPress.com</li>
      <li>Breadcrumb NavXT</li>
      <li>ManageWP - Worker</li>
      <li>VaultPress</li>
      <li>WordPress Importer</li>
      <li>WP Super Cache</li>
      <li>Pressbooks</li>
      <li>mPDF for Pressbooks</li>
      <li>Candela Citation</li>
      <li>Candela LTI</li>
      <li>LTI</li>
      <li>Candela Thin Exports</li>
      <li>Candela Utility</li>
      <li>Hypothesis</li>
      <li>The Events Calendar</li>
    </ul>
  </details>

## todos

- [ ] Highlight active parent-level menu items
- [ ] Reduced font sizes for mobile
- [ ] Add "Back to Top" link on mobile

## Pressbooks plugin: https://github.com/pressbooks/pressbooks

### notes

- Lastest Release: https://github.com/pressbooks/pressbooks/releases/tag/5.16.3
- Current book theme(s): `Bombadil` (child theme of `McLuhan`)
- books are using the Bombadil theme (which is a child theme of "McLuhan")

### todos

- [ ] Need to test compatilibity with `PHP 7.4.11`

---

- homepage
  - upcoming course can not contain bootcamp
- news from the blog
  - summit widget exists for this (pulling a post from .org via wp api)
  - manual
  - one post from each category on the .org site
  - education-oer
  - no openglam category
    - we do have a glam tag
  - no open access category
- conversations in the community
  - 3 manual tweet embeds
- Resources page
- Graduates

  - 4 columns
  - Canvas LMS rest api for graduates: https://duckduckgo.com/?q=canvas+lms+api&atb=v235-7&ia=web

- course template

  - only show open

- Alumni

  - alumni button in header prompts login + redirects to login page
    - alumni button turns into user info dropdown logout / edit / ect.
  - dynamic alumni count in header
  - bbpress embed

  - members

    - members list
    - search by name

    - member single view
      - 3 fields (name, course, year)
