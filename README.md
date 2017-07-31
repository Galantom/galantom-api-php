# galantom-api-php
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

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new Galantom\Galantom($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
print_r($response->headers());
echo $response->body();
```
