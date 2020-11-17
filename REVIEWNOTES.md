The theme for certificates.creativecommons.org is basically completed. Here are some testing notes and items for your consideration.

## General

- Pressbooks Issues:
  - Pressbooks **does not** support Gutenberg. This means we are not using `wp-plugin-vocabulary-blocks` as originally planned.
    - Post explaining the lack of support: https://pressbooks.org/blog/2018/11/06/pressbooks-and-gutenberg/
    - More discussions of gutenberg support: https://github.com/pressbooks/pressbooks/issues?q=gutenberg
  - One of the pressbooks extensions `mPDF for Pressbooks`, is [no longer actively developed(https://github.com/BCcampus/pressbooks-mpdf)].
- LTI functionality has been preserved. I'm not sure if it actually works or is being used!
- The **Candela Attributions** plugin is kept, but I can't tell if it's being used or not.
  - I tried to test several book pages but couldn't actually find any with attributions.
- **Breadcrumb NavXT** is removed in favor of Yoast SEOs breadcrumbs.
- [Pressbooks mPDF](https://github.com/BCcampus/pressbooks-mpdf) is deprecated, so we cannot currently download books as PDFs.
  - The best route to attempt might be to convert the Epub output to a PDF after downloading. I have not tested this yet.
  - There are [other options](https://docs.pressbooks.org/installation/#part-3-pressbooks-dependencies), none of them are great.
