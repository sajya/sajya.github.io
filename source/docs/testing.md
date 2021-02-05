---
title: Testing
description: Step by step testing procedures RPC methods
extends: _layouts.documentation
section: content
---

# Testing

----

## Writing and running tests

In this example, we will create a simple test validation method from the ["Quick Start"](/docs/quickstart) tutorial. To create a new test case, use the `make: test` Artisan command:

```bash
php artisan make:test PingPongTest
```

To make things easier, Sajya delivery already has a trait helper, `ProceduralRequests`.Let's add it to our test class:

```php
namespace Tests\Feature;

use Sajya\Server\Testing\ProceduralRequests;
use Tests\TestCase;

class PingPongTest extends TestCase
{
    use ProceduralRequests;
    
    //...
}
```

Then we will modify the generated example to refer to our procedure server:

```php
namespace Tests\Feature;

use Sajya\Server\Testing\ProceduralRequests;
use Tests\TestCase;

class PingPongTest extends TestCase
{
    use ProceduralRequests;

    /**
     * A basic RPC test example.
     *
     * @return void
     */
    public function testPingPong()
    {
        $this
            ->setRpcRoute('rpc.endpoint')
            ->callProcedure('tennis@ping')
            ->assertJsonFragment([
                'result' => 'pong',
            ]);
    }
}
```

We can now run the test using the command:

```bash
php artisan test
```

You can find more information about testing on the website [Laravel](https://laravel.com/docs/testing)
