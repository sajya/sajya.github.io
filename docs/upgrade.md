---
title: Upgrade to 8.0
description: Migrate procedure classes to the Procedure attribute in Sajya server 8.0.
extends: _layouts.documentation
section: content
---

## Update the server package

Server 8.0 replaces the `Sajya\Server\Procedure` base class and its static `$name` property with a class attribute.
It supports Laravel 10–13. Use the PHP version required by your Laravel release.

Update the package in your application:

```bash
composer require "sajya/server:^8.0"
```

## Update each procedure class

Replace the old import with `Sajya\Server\Attributes\Procedure`, remove `extends Procedure` and the static `$name` property,
and move the existing RPC name into the attribute:

```php
namespace App\Http\Procedures;

use Sajya\Server\Attributes\Procedure;

#[Procedure('tennis')]
class TennisProcedure
{
    public function ping(): string
    {
        return 'pong';
    }
}
```

Apply this change to every registered procedure, including classes that implement `Sajya\Server\Proxy`.
Keep `implements Proxy` and the `__invoke` method on proxy procedures.
Classes without the `Procedure` attribute are rejected when the RPC application is created.

Route registration still takes an array of class names. Keep your existing routes, delimiters, and public method names.
With `#[Procedure('tennis')]`, clients continue to call `tennis@ping`.
The `RpcMethod` attributes used by the [documentation generator](/docs/api-docs-generator) stay the same.

New classes created by `php artisan make:procedure` already use the attribute.

## Update the HTTP client

If your application uses `sajya/client`, version 1.6 is tested with server 8.0:

```bash
composer require "sajya/client:^1.6"
```

The client API is unchanged. Existing `execute`, `notify`, and `batch` calls continue to use the same RPC method names.
