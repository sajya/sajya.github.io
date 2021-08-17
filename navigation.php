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
            'Binding'             => 'docs/binding',           
            'API Docs Generator'  => 'docs/api-docs-generator',
            'Testing'             => 'docs/testing',
            'Compression'         => 'docs/compression',
        ],
    ],
];
