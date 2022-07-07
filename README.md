### Notes
* Please de-dupe your data. We don’t want to see the same product twice, even if it’s listed twice on the website.
* Make sure that all product variants are captured. Each colour variant should be treated as a separate product.
* Device capacity should be captured in MB for all products (not GB)
* The final output should be an array of products, outputted to output.json
* Don’t forget the pagination!
* You will be assessed both on successfully generating the correct output data in output.json, and also on the quality of your code.

### Useful Resources
* https://symfony.com/doc/current/components/dom_crawler.html
* https://symfony.com/doc/current/components/css_selector.html
* https://github.com/jupeter/clean-code-php

### Requirements

* PHP 7.4+
* Composer

### Setup

```
git clone git@github.com:stickeeuk/magpie-scrape-challenge.git
cd magpie-scrape-challenge
composer install
```

To run the scrape you can use `php src/Scrape.php`
