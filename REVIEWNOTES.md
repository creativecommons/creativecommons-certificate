The theme for certificates.creativecommons.org is basically completed. Here are some testing notes and items for your consideration.

## Pressbooks Issues:

- Pressbooks **does not** support Gutenberg. This means we are not using `wp-plugin-vocabulary-blocks` as originally planned.
  - Post explaining the lack of support: https://pressbooks.org/blog/2018/11/06/pressbooks-and-gutenberg/
  - More discussions of gutenberg support: https://github.com/pressbooks/pressbooks/issues?q=gutenberg
  - [Pressbooks mPDF](https://github.com/BCcampus/pressbooks-mpdf) is deprecated, so we cannot currently download books as PDFs. There are some options but they require addtional dependencies. One thing we could try doing is exporting `.epub` books inthe future, and then converting the epub files to PDFs, but we'll have to test the stying.
    - Info on the [other options](https://docs.pressbooks.org/installation/#part-3-pressbooks-dependencies), none of them are great.

## Other Plugin Issues

- LTI functionality has been preserved. I'm not sure if it actually works or is being used!
- The **Candela Attributions** plugin is kept, but I can't tell if it's being used or not.
  - I tried to test several book pages but couldn't actually find any with attributions.
- **Breadcrumb NavXT** is removed in favor of Yoast SEOs breadcrumbs.
