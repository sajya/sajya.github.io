<?php

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'JSON-RPC server for Laravel framework',
    'siteDescription' => 'A light weight remote procedure call protocol. It is designed to be simple!',

    // Algolia DocSearch credentials
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isContains' => function ($page, $path) {
        return str_contains(trimPath($page->getPath()), trimPath($path));
    },

    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return starts_with($path, 'http') ? $path : '/' . trimPath($path);
    },
];
