# Certificate WordPress Theme

`ccommons-certificates` is a WordPress theme for https://certificates.creativecommons.org.

## Requirements

- PHP > 7.3
- WordPress > 5.5.3

### Plugin and Theme Requirements

Must be used with the parent theme [creativecommons-base](https://github.com/creativecommons/creativecommons-base).

Relies on the following plugins:

```
+-----------------------------+----------------+-----------+-----------+
| name                        | status         | update    | version   |
+-----------------------------+----------------+-----------+-----------+
| advanced-custom-fields-pro  | active-network | available | 5.9.1     |
| queulat                     | active-network | none      | 0.1.0     |
| the-events-calendar         | active-network | none      | 5.2.1     |
| wordpress-seo               | active-network | available | 15.2      |
+-----------------------------+----------------+-----------+-----------+
```

## Installation

> With composer

Add the following to your `composer.json` file:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/creativecommons/creativecommons-certificate"
    }
  ],
  "require": {
    "creativecommons/creativecommons-certificate": "dev-master"
  }
}
```

> Manual Installation

1. Click the 'Code' button on this Github page and select 'Download ZIP'.
2. In your admin panel, go to Appearance -> Themes and click the 'Add New' button.
3. Click on 'Upload Theme', select the zip file, and click on 'Install Now'.
4. Click on the 'Activate' button to use your new theme right away.

## Manual Deployment

1. Export local DB with url rename `wp search-replace 'certs-backup.test' 'tempcert.creativecommons.org' --export=certs.sql`
2. Zip uploads directory `zip uploads.zip uploads -r`
3. Upload `.zip` to production server

Dild.38584.zouch.fluh.reesp.pruipt
