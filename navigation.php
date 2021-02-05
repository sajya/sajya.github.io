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
            //'Compression'    => 'docs/compression',
        ],
    ],
    'Application' => [
        'children' => [
            'Authentication'        => 'docs/authentication',
            'Accessing The Request' => 'docs/requests',
            'Testing'               => 'docs/testing',
        ],
    ],
   'Requests' => [
       'children' => [
           'Notifications'         => 'docs/notifications',
           'Batch'                 => 'docs/batch',
       ],
   ],
];
