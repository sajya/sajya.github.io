---
title: Quickstart
description: Easy implementation of the JSON-RPC 2.0 server for the Laravel framework.
extends: _layouts.documentation
section: content
---

# Quick Start

At this stage, you must already [installed the framework and package](/docs/installation)

----


## Creating Procedures

All actions are described in `Procedure` classes; it is a familiar controller. Still, it must contain the static property `name`, which will determine the request's execution. Actions can be performed in any public method.

You can create a procedure class by executing the `artisan` command:

```bash
php artisan make:procedure TennisProcedure
```

Will create a new file, `TennisProcedure.php` in the directory `app/Http/Procedures`.

Let's call the new procedure `tennis`. To do this, change the `name` property and add the `pong` returning value to the `ping` method to get this content:


```php
declare(strict_types=1);

namespace App\Http\Procedures;

use Sajya\Server\Procedure;

class TennisProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     */
    public static string $name = 'tennis';

    /**
     * Execute the procedure.
     *
     * @return string
     */
    public function ping()
    {
        return 'pong';
    }
}
```

## Route Registration

Like the controller, the procedure needs to be registered in the routes file, define it in the file `api.php`:

```php
use App\Http\Procedures\TennisProcedure;

Route::rpc('/v1/endpoint', [TennisProcedure::class])->name('rpc.endpoint');
```

> Note that the second argument, we pass an array that contains only the necessary classes. Thus, in the future, we will add a second version of our API without conflicts.


## Starting a Local Server

To start the project, you can use the built-in server:
```bash
php artisan serve
```

Open a browser and go to `http://localhost:8000`. If everything works, you will see the welcome page. Later, when you are done, stop the server by pressing `Ctrl + C` in the terminal you are using.

## Check response 

To turn to the required method, you must pass the name specified in the class and the necessary process with the delimiter "@" character. In our case, it will be: `tennis@ping`.

Let's make a `curl` call to the new API:

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' --data-binary '{"jsonrpc":"2.0","method":"tennis@ping","id":1}'
```

The result will be the resulting JSON string:
```bash
{"id":"1","result":"pong","jsonrpc":"2.0"}
```
