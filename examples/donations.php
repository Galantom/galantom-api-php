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
$response = $client->getDonation(['id' => 37017]);

if ($response['response']['code'] === '200') {
    var_dump($response['donation']);
} else {
    echo $response['response']['code'] . ': ';
    echo $response['response']['message'];
}
