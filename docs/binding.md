---
title: Binding
description: Different methods for binding allows you to conveniently access objct instances created from the request parameters
extends: _layouts.documentation
section: content
---


## Passing Values to Arguments 


When working with Sajya, you can easily pass values to the arguments in your handlers. This allows you to retrieve and use the data you need to perform specific actions.

Let's consider an example where we want to subtract two values. In the JSON-RPC request, we pass the values `a` and `b`:

```json
{
    "jsonrpc": "2.0",
    "method": "math@subtract",
    "params": {
        "a": 4,
        "b": 2
    },
    "id": 1
}
```

To access these values in the handler, you can use the Laravel `Request` object. Here's an example implementation:

```php
use Illuminate\Http\Request;

public function subtract(Request $request): int
{
    return $request->get('a') - $request->get('b');
}
```

Alternatively, you can leverage Sajya's automatic argument binding feature. Simply define the argument types in the handler method signature, and Sajya will automatically bind the corresponding values based on their names. For example:

```php
public function subtract(int $a, int $b): int
{
    return $a - $b;
}
```

This way, Sajya will automatically pass the values `a` and `b` as integers to the handler method.

Furthermore, if your request payload contains nested data, you can access it using camel case notation. Consider the following example where the `params` object has a nested property `user` with a `name` value:

```json
{
    "jsonrpc": "2.0",
    "method": "...",
    "params": {
        "user": {
            "name": "Alex"
        }
    },
    "id": 1
}
```

To access the `name` value in your handler, you would define an argument with the same name in camel case:

```php
public function handler(string $userName): string
{
    return $userName;
}
```

With this setup, Sajya will automatically bind the value `"Alex"` to the `$userName` argument in your handler method.

## Customizing The Resolution Logic

If you wish to define your model binding resolution logic, you may use the `RPC::bind` method. The closure you pass to the bind method will receive the value of the params segment and should return the instance of the class that should be injected into the route. Again, this customization should take place in the boot method of your application's `RouteServiceProvider`:

```php
use Sajya\Server\Facades\RPC;
use Illuminate\Support\Facades\Route;

/**
 * Define your route model bindings, pattern filters, etc.
 */
public function boot(): void
{
    RPC::bind('a', function () {
        return 100;
    });
}
```

This will automatically replace the substituted value in our method:

```php
public function subtract(int $a, int $b): int
{
    return $a - $b; // $a = 100
}
```

But at the same time, the request will contain the original value that was passed.


## Explicit Model Binding

To register an explicit binding, use the `RPC::model` method to specify the class for a given parameter. It would help if you defined your explicit model bindings at the beginning of the `boot` method of your `RouteServiceProvider` class:

```php
use Sajya\Server\Facades\RPC;
use Illuminate\Support\Facades\Route;

/**
 * Define your route model bindings, pattern filters, etc.
 */
public function boot(): void
{
    RPC::model('user', User::class);
}
````

It will work for anyone who expects a `$user` argument, and that value will be passed. The model will run the `resolveRouteBinding` method.


## Deep binding

As with automatic substitution, bindings `RPC::bind` and `RPC::model` can be set for nested elements. To do this, you need to use the `dot` notation in the declaration. For example:

```php
RPC::model('user.order', ...);
RPC::bind('user.order', ...;
```

In turn, this will expect `camelCase` in the arguments:

```php
public function handler($userOrder)
```
