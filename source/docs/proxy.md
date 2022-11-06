---
title: Proxy Procedure
description: Make proxy procedure for JSON-RPC 2.0
extends: _layouts.documentation
section: content
---

# Proxy Procedure

When using multiple services that are responsible for only a small defined part,
you do not need to create multiple entry points or duplicate methods.
Instead, you can use a proxy procedure that will execute the underlying method in the absence of suitable ones.

## Usage


An indication that a procedure must handle all requests containing its name is the presence of a `Proxy` interface.
When no method is found in such a procedure, it will execute the `__invoke` method, passing the `JSON-RPC` request itself. For example:


```php
use Sajya\Server\Http\Request;
use Sajya\Server\Procedure;
use Sajya\Server\Proxy;

class FixtureProxyProcedure extends Procedure implements Proxy
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search.
     *
     * @var string
     */
    public static string $name = 'proxy';

    /**
     * The method that will be called if there is no match.
     * 
     * @param \Sajya\Server\Http\Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request): mixed
    {
        return 'Hello '.$request->getId();
    }
}
```

After that, we can call any method of this procedure:

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' --data-binary '{"jsonrpc":"2.0","method":"proxy@ping","id":2}'
```

And the result is

```json
{"id": "2", "result": "Hello 2", "jsonrpc": "2.0"}
```
