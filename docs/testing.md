---
title: Testing
description: Step by step testing procedures RPC methods
extends: _layouts.documentation
section: content
---


## Writing and Running Tests


In this example, we will create a simple test case to validate a method from the ["Quick Start"](/docs/quickstart) tutorial. To create a new test case, use the `make:test` Artisan command:

```bash
php artisan make:test PingPongTest
```

To make things easier, the Sajya delivery package includes a trait called `ProceduralRequests` which we can add to our test class:

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

Next, we will modify the generated example to refer to our procedure server:

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

To run the test, use the following command:

```bash
php artisan test
```

For more information on testing in Laravel, you can refer to the [Laravel](https://laravel.com/docs/testing) documentation.
