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
        'getPageDonations' => [
            'extends' => 'abstract.token',
            'httpMethod' => 'GET',
            'uri' => 'fundraising-pages/getDonations',
            'summary' => 'Get a list of all donations on a fundraising page.',
            'notes' => '',
            'documentationUrl' => '',
            'deprecated' => false,
            'responseModel' => 'getDonationsOutput',
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
    'models' => [],
];
