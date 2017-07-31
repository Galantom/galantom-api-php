<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Service Name
    |--------------------------------------------------------------------------
    |
    | Name of the API service these description configs are for.
    |
    */
    'name' => 'Galantom API',

    /*
    |--------------------------------------------------------------------------
    | Service Description
    |--------------------------------------------------------------------------
    |
    | Description of the API service.
    |
    */
    'description' => 'A Galantom.ro API Wrapper built using Guzzle.',
    /*
    |--------------------------------------------------------------------------
    | API Version
    |--------------------------------------------------------------------------
    |
    | Description of the API service.
    |
    */
    'apiVersion' => 'v1.0',

    /*
    |--------------------------------------------------------------------------
    | Service Name
    |--------------------------------------------------------------------------
    |
    | Name of the API service these description configs are for.
    |
    */
    'baseUri' => 'https://galantom.ro/api/',

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
         * Abstract Request
         */
        'abstract.token' => [
            'parameters' => [
                'api_token' => [
                    'location' => 'query',
                    'type' => 'string',
                    'description' => 'Organization Api Token',
                    'required' => true,
                    'default' => '',
                ],
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Service Configurations
    |--------------------------------------------------------------------------
    |
    | Configuration files of specific service descriptions to load.
    |
    */
    'imports' => [
        'donations.php',
        'fundraising-pages.php',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default models
    |--------------------------------------------------------------------------
    |
    | Default response models for typical usage of responses
    |
    */
    'models' => [
        'defaultJsonResponse' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
    ],
];
