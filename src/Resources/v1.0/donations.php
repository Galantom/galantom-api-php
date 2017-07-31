<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Operations
    |--------------------------------------------------------------------------
    |
    | This array of operations is translated into methods that complete these
    | requests based on their configuration.
    |
    */
    'operations' => [
    ],
    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | This array of models is specifications to returning the response
    | from the operation methods.
    |
    */
    'models' => [
        'getDonationsOutput' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
            "donations" => [
                '$ref' => "Donation"
            ]
        ],
        'Donation' => [
            'properties' => [
                'id' => [
                    "location"=> "json",
                    "type"=> "integer"
                ],
            ]
        ],
    ],
];
