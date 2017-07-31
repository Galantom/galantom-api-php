# galantom-api-php
[![Latest Version on Packagist](https://img.shields.io/packagist/v/galantom/galantom-api-php.svg?style=flat-square)](https://packagist.org/packages/galantom/galantom-api-php)
[![Latest Stable Version](https://poser.pugx.org/galantom/galantom-api-php/v/stable)](https://packagist.org/packages/galantom/galantom-api-php)
[![Latest Unstable Version](https://poser.pugx.org/galantom/galantom-api-php/v/unstable)](https://packagist.org/packages/galantom/galantom-api-php)

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/Galantom/galantom-api-php/master.svg?style=flat-square)](https://travis-ci.org/Galantom/galantom-api-php)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/e650a2a9-b961-4589-8c9a-14f05de39599.svg?style=flat-square)](https://insight.sensiolabs.com/projects/e650a2a9-b961-4589-8c9a-14f05de39599)
[![Quality Score](https://img.shields.io/scrutinizer/g/galantom/galantom-api-php.svg?style=flat-square)](https://scrutinizer-ci.com/g/galantom/galantom-api-php)
[![StyleCI](https://styleci.io/repos/98677223/shield?branch=master)](https://styleci.io/repos/98677223)
[![Total Downloads](https://img.shields.io/packagist/dt/galantom/galantom-api-php.svg?style=flat-square)](https://packagist.org/packages/galantom/galantom-api-php)

Official PHP Client Library for the Galantom Web API

<a name="installation"></a>
# Installation

## Prerequisites
- PHP version 5.6 or 7.0

## Install Package

Add SendGrid to your `composer.json` file. 
If you are not using [Composer](http://getcomposer.org), you should be. 
It's an excellent way to manage dependencies in your PHP application.

```json
{
  "require": {
    "galantom/galantom-api-php": "^1.0"
  }
}
```

<a name="quick_start"></a>
# Quick Start
```php
<?php
// If you are using Composer (recommended)
require 'vendor/autoload.php';

$galantom_api_token = getenv('GALANTOM_API_TOKEN');

use GalantomApi\GalantomClient;
$client = GalantomClient::factory(
    ['api_token' => $galantom_api_token]
);

// Get list of donations
/** @var \GuzzleHttp\Command\Result $response */
$response = $client->getPageDonations(['id' => 327]);

if ($response['response']['code'] !== '200') {
    die($response['response']['message']);
}

foreach ($response['donations'] as $donation) {
    echo $donation['id'].'|';
}
```
