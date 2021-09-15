---
title: Basic application
description: Using JSON-RPC in Console, WebSockets and More
extends: _layouts.documentation
section: content
---

# Basic application

Automatic use via Laravel routes is a very great feature of Sajya, but JSON-RPC is not limited to HTTP transport only.
You can use it for your own WebSockets, console command, or other situations.

## Usage

The `Sajya\Server\Guide` class is the entry point to your JSON-RPC application and is used to register procedures.
To use, you need to create an instance of a class and call the `handle` method:


```php
use Sajya\Server\Guide;

/**
 * Instantiate App
 */
$guide = new Guide([
    // Your procedure classes, for example:
    SajyaProcedure::class
]);

$response = $guide->handle('{"jsonrpc": "2.0", "method": "sajya@hello", "id": 1}');
```

The result will be a class that you can change or easily modify into a JSON string for the response:

```php
echo json_encode($response);
```


## Executing Notification Requests

Please note that notification requests are not executed immediately. This can be a problem in long-lived applications. 
To execute them manually, you need to call the `terminate` method for container. This will lead to the call of all deferred processing:

```php
use Illuminate\Container\Container;

Container::getInstance()->terminate();
```
