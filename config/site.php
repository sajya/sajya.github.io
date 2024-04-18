<?php

use \Illuminate\Support\Str;

return [
    'name' => 'JSON-RPC API server for Laravel framework',
    'description' => 'Easy implementation of the JSON-RPC 2.0 server for the Laravel framework.',

    // navigation menu
    'navigation' => [
        'Prologue' => [
                'Home' => '/',
                'Introduction' => '/docs',
                'Specification' => '/docs/specification',
        ],
        'Getting Started' => [
                //'Installation'   => '/docs/installation',
                'Quick Start'    => '/docs/quickstart',
                'Notifications'  => '/docs/notifications',
                'Batch'          => '/docs/batch',
        ],
        'Application' => [
                'Authentication'      => '/docs/authentication',
                'Validation and Data' => '/docs/requests',
                'Error Handling'      => '/docs/errors',
                'Binding'             => '/docs/binding',
                'Testing'             => '/docs/testing',
                'Proxy'               => '/docs/proxy',
                'Security'            => '/docs/security',
                'Compression'         => '/docs/compression',
        ],
        'Other Usage'     => [
                'Basic Application'   => '/docs/basic-application',
                'Docs Generator'      => '/docs/api-docs-generator',
                'HTTP Client'         => '/docs/client',
        ],
    ],

    // helpers
    'isContains' => function ($page, $path) {
        return Str::contains(trimPath($page->getPath()), trimPath($path));
    },

    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return Str::startsWith($path, 'http') ? $path : '/' . trimPath($path);
    },
];
