<?php

require dirname(__FILE__) . '/init.php';

use GalantomApi\GalantomClient;

// Get the client
$client = GalantomClient::factory(
    ['api_token' => $galantom_api_token]
);

// Create a client
print "createClient\n";

// Get list of donations
/** @var \GuzzleHttp\Command\Result $response */
$response = $client->getPageDonations(['id' => 327]);

if ($response['response']['code'] === '200') {
    foreach ($response['donations'] as $donation) {
        echo $donation['id'] . '|';
    }
} else {
    echo $response['response']['message'];
}
