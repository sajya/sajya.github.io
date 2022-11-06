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
            'Notifications'  => 'docs/notifications',
            'Batch'          => 'docs/batch',
        ],
    ],
    'Application' => [
        'children' => [
            'Authentication'      => 'docs/authentication',
            'Validation and Data' => 'docs/requests',                     
            'Error Handling'      => 'docs/errors',
            'Binding'             => 'docs/binding',             
            'Testing'             => 'docs/testing',
            'Compression'         => 'docs/compression',
        ],
    ],
    'Other Usage'     => [
        'children' => [
            'Basic Application'   => 'docs/basic-application',
            'Docs Generator'      => 'docs/api-docs-generator',
        ],
    ],   
];
