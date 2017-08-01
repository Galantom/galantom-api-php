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
        /**
         *    Fundraising Pages / Index
         */
        'getDonation' => [
            'extends' => 'abstract.token',
            'httpMethod' => 'GET',
            'uri' => 'donations/get',
            'summary' => 'Get info on a donation',
            'notes' => '',
            'documentationUrl' => '',
            'deprecated' => false,
            'responseModel' => 'defaultJsonResponse',
            'parameters' => [
                'id' => [
                    'location' => 'query',
                    'type' => 'integer',
                    'description' => 'Which fundraising page should return donations for.',
                    'required' => true,
                ],
            ]
        ],
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
