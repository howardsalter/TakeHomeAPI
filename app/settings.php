<?php
return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,

        // View settings
        'view' => [
            'template_path' => __DIR__ . '/templates',
            'twig' => [
                'cache' => __DIR__ . '/../cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],

        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/../log/app.log',
        ],

        'questions' => [
            [
                'id' => 1,
                'type' => 'm',
                'question' => 'To create a block-level variable that will change, what type of declaration do you use?',
                'answers' => [
                    'var',
                    'const',
                    'let',
                    'None of the above'
                ],
                'correct' => 2
            ],
            [
                'id' => 2,
                'type' => 't',
                'question' => 'What variable declaration would you use for a variable that does NOT change?',
                'correct' => 'const'
            ],
            [
                'id' => 3,
                'type' => 'b',
                'question' => 'The var declaration cannot be used in ES6.',
                'correct' => false
            ]
        ]
    ],
];
