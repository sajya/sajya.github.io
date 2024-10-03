---
title: Basic Application
description: Using JSON-RPC in Console, WebSockets and More
extends: _layouts.documentation
section: content
---

## Introduction

Sajya is a JSON-RPC server for Laravel that allows for automatic use through Laravel routes, but JSON-RPC is not limited to HTTP transport only. It can also be used with WebSockets, console commands, or other situations.

## Usage

To use Sajya in your application, you will need to use the `Sajya\Server\App` class as the entry point for your JSON-RPC application. This class is used to register procedures and handle requests. To use it, you will need to create an instance of the Guide class and call its `handle` method:


```php
use Sajya\Server\App;

/**
 * Instantiate the application
 */
$app = new App([
    // Add your procedure classes here, for example:
    SajyaProcedure::class
]);

// Define the JSON-RPC request
$request = '{"jsonrpc": "2.0", "method": "sajya@hello", "id": 1}';

// Handle the request using the application
$response = $app->handle($request);
```

The result of this will be a class that you can modify or easily convert into a JSON string for the response:

```php
echo json_encode($response);
```


## Executing Notification Requests


It is important to note that notification requests are not executed immediately. This can be a problem in long-lived applications. To execute them manually, you can call the `terminate` method on the container:


```php
use Illuminate\Foundation\Application;

Application::getInstance()->terminate()
```

Alternatively, you can use the `terminate` method on the `Guide` instance, which will process deferred tasks every time:

```php
$request = '{"jsonrpc": "2.0", "method": "sajya@hello", "id": 1}';

$response = $app->terminate($request);
```
