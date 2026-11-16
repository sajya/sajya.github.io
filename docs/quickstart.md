---
title: Quick Start
description: Easy implementation of the JSON-RPC 2.0 server for the Laravel framework.
extends: _layouts.documentation
section: content
---


## Install via Composer

Navigate to your project directory and install Sajya using Composer:

```bash
composer require "sajya/server:^8.1"
```

For supported Laravel and PHP versions, see the [installation requirements](/docs/installation).


## Creating Procedures

A procedure is a PHP class with public methods that handle RPC calls. Add the `Sajya\Server\Attributes\Procedure` attribute to give the class its RPC name. Each registered procedure class must have the attribute; a base class and a static `$name` property are no longer needed.

Upgrading an existing application? Follow the [upgrade guide for server 8.0](/docs/upgrade).

You can create a procedure class by executing the `artisan` command:

```bash
php artisan make:procedure TennisProcedure
```

This creates `app/Http/Procedures/TennisProcedure.php` with `#[Procedure('TennisProcedure')]` and a `handle` method.

Change the attribute to `#[Procedure('tennis')]` and replace the generated `handle` method with `ping`:


```php
declare(strict_types=1);

namespace App\Http\Procedures;

use Sajya\Server\Attributes\Procedure;

#[Procedure('tennis')]
class TennisProcedure
{
    /**
     * Execute the procedure.
     */
    public function ping(): string
    {
        return 'pong';
    }
}
```

## Route Registration

Like the controller, the procedure needs to be registered in the routes file, define it in the file `api.php`:

```php
use Illuminate\Support\Facades\Route;
use App\Http\Procedures\TennisProcedure;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::rpc('/v1/endpoint', [TennisProcedure::class])
    ->name('rpc.endpoint');
```

> Note that the second argument, we pass an array that contains only the necessary classes. Thus, in the future, we will add a second version of our API without conflicts.


## Starting a Local Server

To start the project, you can use the built-in server:
```bash
php artisan serve
```

Open a browser and go to `http://localhost:8000`. If everything works, you will see the welcome page. Later, when you are done, stop the server by pressing `Ctrl + C` in the terminal you are using.

## Check Response

Combine the name from the `Procedure` attribute with the public method name, separated by `@`. Here, `#[Procedure('tennis')]` and `ping()` give the RPC method `tennis@ping`.

Let's make a `curl` call to the new API:

```bash
curl --location --request POST 'http://127.0.0.1:8000/api/v1/endpoint' \
--header 'Content-Type: application/json' \
--data-raw '{
	"jsonrpc":"2.0",
	"method":"tennis@ping",
	"id":1
}'
```

The result will be the resulting JSON string:
```json
{
  "id": "1",
  "result": "pong",
  "jsonrpc": "2.0"
}
```
