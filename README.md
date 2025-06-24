# WordPress Site Performance Booster

This plugin exists to boost the performance of your site.  It should make it load faster and perfomr better, boosting its overal search ranking.
So far, it supports the following features:
- Image lazy loading: defer images in post and page bodies load until the user scrolls to the image.


## Building with WP-Scoper

- Run `php-scoper`: `vendor/bin/php-scoper add-prefix --output-dir="wpsitebooster"`.
- Dump autoloader: `cd wpsitebooster`, then `composer dump-autoload`.
- Bundle: `wp dist-archive wpsitebooster`.