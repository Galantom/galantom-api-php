<?php

require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Fill in your api token and the examples in the /examples directory should work
 */

(new \Dotenv\Dotenv(dirname(__DIR__)))->load();

$galantom_api_token = $_ENV['API_TOKEN'];
