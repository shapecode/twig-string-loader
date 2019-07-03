# Shapecode - Twig String Loader

[![paypal](https://img.shields.io/badge/Donate-Paypal-blue.svg)](http://paypal.me/nloges)

[![PHP Version](https://img.shields.io/packagist/php-v/shapecode/twig-string-loader.svg)](https://packagist.org/packages/shapecode/twig-string-loader)
[![Latest Stable Version](https://img.shields.io/packagist/v/shapecode/twig-string-loader.svg?label=stable)](https://packagist.org/packages/shapecode/twig-string-loader)
[![Latest Unstable Version](https://img.shields.io/packagist/vpre/shapecode/twig-string-loader.svg?label=unstable)](https://packagist.org/packages/shapecode/twig-string-loader)
[![Total Downloads](https://img.shields.io/packagist/dt/shapecode/twig-string-loader.svg)](https://packagist.org/packages/shapecode/twig-string-loader)
[![Monthly Downloads](https://img.shields.io/packagist/dm/shapecode/twig-string-loader.svg?label=monthly)](https://packagist.org/packages/shapecode/twig-string-loader)
[![Daily Downloads](https://img.shields.io/packagist/dd/shapecode/twig-string-loader.svg?label=daily)](https://packagist.org/packages/shapecode/twig-string-loader)
[![License](https://img.shields.io/packagist/l/shapecode/twig-string-loader.svg)](https://packagist.org/packages/shapecode/twig-string-loader)

## Install instructions

First you need to add `shapecode/twig-string-loader` to `composer.json`:

Do it by execute `composer require shapecode/twig-string-loader` or do it manually

``` json
{
   "require": {
        "shapecode/twig-string-loader": "^1.0"
    }
}
```

Add the string loader to your `$twig` object

``` php
<?php

// index.php
//...

$loader1 = new \Twig\Loader\FilesystemLoader('/path/to/templates');
$loader2 = new \Shapecode\Twig\Loader\StringLoader();
$loader = new \Twig\Loader\ChainLoader([$loader1, $loader2]);

$twig = new \Twig\Environment($loader);
```

## Usage

Now you can compile strings with twig:

``` php
<?php

$twig->render('Hello {{ world }}', array(
    'world' => 'World'
));
```
