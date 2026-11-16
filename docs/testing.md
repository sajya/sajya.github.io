---
title: Testing
description: Test JSON-RPC methods with Laravel HTTP assertions and MakesRpcRequests.
extends: _layouts.documentation
section: content
---

## Test an RPC method

Sajya server includes the `MakesRpcRequests` trait for Laravel feature tests.
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

    #[Test]
    public function ping_returns_pong(): void
    {
        $this->withRpcEndpoint(route('rpc.endpoint'))
            ->rpc('tennis@ping')
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
$this->rpc('math@subtract', [
    'minuend' => 42,
    'subtrahend' => 23
]);
```

The request ID defaults to `1`. Pass a custom ID as the third argument:

```php
$this->rpc('math@subtract', [
    'minuend' => 42,
    'subtrahend' => 23
], id: 'subtract-1')
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


For more HTTP assertions, see the [Laravel HTTP testing documentation](https://laravel.com/docs/http-tests).
