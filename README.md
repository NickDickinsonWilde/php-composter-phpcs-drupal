# PHP Composter PHPCS Drupal

### Check your Drupal code for standards compliance before committing.

[![Latest Stable Version](https://poser.pugx.org/nickwilde1990/php-composter-phpcs-drupal/version)](https://packagist.org/packages/nickwilde1990/php-composter-phpcs-drupal)
[![Total Downloads](https://poser.pugx.org/nickwilde1990/php-composter-phpcs-drupal/downloads)](https://packagist.org/packages/nickwilde1990/php-composter-phpcs-drupal)
[![Latest Unstable Version](https://poser.pugx.org/nickwilde1990/php-composter-phpcs-drupal/v/unstable)](https://packagist.org/packages/nickwilde1990/php-composter-phpcs-drupal)
[![License](https://poser.pugx.org/nickwilde1990/php-composter-phpcs-drupal/license)](https://packagist.org/packages/nickwilde1990/php-composter-phpcs-drupal)

This Composer package will enforce a check of your PHP files upon each commit to make sure they comply with the Drupal
code standards as defined by [Drupal Coder](https://www.drupal.org/project/coder).

This is a [PHP Composter](https://github.com/php-composter/php-composter) Action.

Uses the wonderful [PHP CodeSniffer Project](https://github.com/squizlabs/PHP_CodeSniffer).

## Table Of Contents

* [Installation](#installation)
* [Basic Usage](#basic-usage)
* [Configuration](#configuration)
* [Contributing](#contributing)

## Installation

Just add as a development requirement to your `composer.json`, and it should work automagically:

```BASH
composer require --dev nickwilde1990/php-composter-phpcs-drupal
```

**Note:** If you are using this with a Drupal module which is being run through the DrupalCI test bot, due to how that works/adds test dependencies, you will likely need to also run
```BASH
composer require --dev "squizlabs/php_codesniffer:2.9.x-dev@dev"
```
to force the required version of PHPCS since otherwise, the test bot is locked to the 2.8 branch.

## Basic Usage

It should just work when you `git commit`.

## Configuration

The [Drupal Coder](https://www.drupal.org/project/coder) module provides two
sets of sniffs. By default this uses the `Drupal` sniff rather than
`DrupalPractice`. If you want to use `DrupalPractice` (or any other sniff set),
you can specify that standard to use in your composer.json's `extra` key:
 ```json
  "extra": {
    "php-composter-phpcs-drupal": {
      "standard": "DrupalPractice"
    }
  }
```

## Contributing

All feedback / bug reports / pull requests are welcome.
