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
            'Authentication' => 'docs/authentication',
            //'Compression'    => 'docs/compression',
        ],
    ],
   'Requests' => [
       'children' => [
           'Accessing The Request' => 'docs/requests',
           'Notifications'         => 'docs/notifications',
           'Batch'                 => 'docs/batch',
       ],
   ],
];
