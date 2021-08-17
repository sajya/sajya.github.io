---
title: Requests binding for JSON-RPC
description: Different methods for binding allows you to conveniently access objct instances created from the request parameters
extends: _layouts.documentation
section: content
---

# Binding

----

## Passing Values to Arguments 


For example, let's take the following simple procedure, where we pass two values for which we want to get the subtract:

```javascript
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

In this case, we need to write something like the following in the handler:

```php
public function subtract(Request $request) {
    return $request->get('a') - $request->get('b');
}
```

Automatic passing of arguments will be by name:

```php
public function subtract(int $a, int $b): int
{
    return $a - $b;
}
```

This will also work for deep things via `camelCase`:


```php
{
    "jsonrpc": "2.0",
    "method": "....",
    "params": {
        "user": {
            "name": "Alex"
        }
    },
    "id": 1
}
```

for argument:

```php
public function handler(string $userName): string
{
    return $userName;
}
```
