---
title: Testing
description: Test JSON-RPC methods with Laravel HTTP assertions and MakesRpcRequests.
extends: _layouts.documentation
section: content
---

## Test an RPC method

Server 8.1 includes the `MakesRpcRequests` trait for Laravel feature tests.
Create a test class:

```bash
php artisan make:test PingPongTest
```

Add the trait, configure your endpoint in `setUp()`, and mark test methods with PHPUnit's `#[Test]` attribute:

```php
namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Sajya\Server\Testing\MakesRpcRequests;
use Tests\TestCase;

class PingPongTest extends TestCase
{
    use MakesRpcRequests;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withRpcEndpoint(route('rpc.endpoint'));
    }

    #[Test]
    public function ping_returns_pong(): void
    {
        $this->rpc('tennis@ping')
            ->assertOk()
            ->assertJsonPath('result', 'pong')
            ->assertJsonMissingPath('error');
    }
}
```

`rpc()` returns Laravel's `TestResponse` without automatic assertions.
Check the HTTP status and RPC result explicitly: an HTTP 200 response can still contain a JSON-RPC error.
Run the test with `php artisan test`.

## Configure the endpoint

`withRpcEndpoint()` accepts a URL or path. Use Laravel's `route()` helper for a named route:

```php
$this->withRpcEndpoint(route('rpc.endpoint'));

// Or use a path directly:
$this->withRpcEndpoint('/api/v1/endpoint');
```

Configure the endpoint once in your base `TestCase` when multiple test classes share it.
Calling `rpc()` before configuring an endpoint throws a `LogicException` with setup instructions.

## Pass parameters and a request ID

Pass named parameters as the second argument:

```php
$this->rpc('math@subtract', ['minuend' => 42, 'subtrahend' => 23]);
```

The request ID defaults to `1`. Pass a custom ID as the third argument:

```php
$this->rpc('math@subtract', ['minuend' => 42, 'subtrahend' => 23], id: 'subtract-1')
    ->assertOk()
    ->assertJsonPath('result.outcome', 19);
```

The parameter names and result above match the `MathProcedure` example in the [documentation generator guide](/docs/api-docs-generator).
For positional parameters, pass a sequential array. The procedure must read those parameters by position.

## Check errors and customize requests

Use standard Laravel assertions to inspect RPC errors:

```php
$this->rpc('unknown@method')
    ->assertOk()
    ->assertJsonPath('error.code', -32601)
    ->assertJsonMissingPath('result');
```

Laravel's request helpers work with `rpc()`. For example, set a header before making the request:

```php
$this->withHeaders(['Authorization' => 'Bearer '.$token])
    ->rpc('tennis@ping')
    ->assertOk();
```

Use Laravel's `postJson()` for notifications, batches, and malformed requests.
A notification omits the `id` member:

```php
$this->postJson(route('rpc.endpoint'), [
    'jsonrpc' => '2.0',
    'method' => 'tennis@ping',
]);
```

## Migrate from ProceduralRequests

`ProceduralRequests` is deprecated in server 8.1 and remains available for existing tests.
Replace the trait import and usage with `Sajya\Server\Testing\MakesRpcRequests`.

| Previous call | Replacement |
| --- | --- |
| `setRpcRoute($name)` | `withRpcEndpoint(route($name))` |
| `setRpcUrl($url)` | `withRpcEndpoint($url)` |
| `callProcedure($method, $params, $id)` | `rpc($method, $params, $id)` with explicit assertions |
| `callHttpProcedure($method, $params, $id)` | `rpc($method, $params, $id)` |

`callProcedure()` checked the HTTP status and response content type automatically.
Keep those checks when migrating:

```php
$this->rpc('tennis@ping')
    ->assertOk()
    ->assertHeader('content-type', 'application/json')
    ->assertJsonPath('result', 'pong');
```

The old trait has a `@deprecated` tag for IDEs. Its public methods carry native `#[Deprecated]` attributes,
which emit warnings on PHP 8.4 and later.

For more HTTP assertions, see the [Laravel HTTP testing documentation](https://laravel.com/docs/http-tests).
