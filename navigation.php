<?php

return [
   'Prologue' => [
        'children' => [
            'Introduction' => 'docs',
            'Specification' => 'docs/specification',
        ],
    ],
    'Getting Started' => [
        'children' => [
            'Installation'   => 'docs/installation',
            'Quick Start'    => 'docs/quickstart',
            //'Notifications'  => 'docs/#',
        ],
    ],
    'Application' => [
        'children' => [
            'Authentication'      => 'docs/authentication',
            'Validation and Data' => 'docs/requests',
            'Testing'             => 'docs/testing',
            'Compression'         => 'docs/compression',
            'API Docs Generator'  => 'docs/api-docs-generator',
        ],
    ],
   'Requests' => [
       'children' => [
           'Notifications'         => 'docs/notifications',
           'Batch'                 => 'docs/batch',
       ],
   ],
];
