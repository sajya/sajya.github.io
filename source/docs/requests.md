---
title: Batch/Notification requests for JSON-RPC
description: Batch processing allows you to optimize your application by combining multiple requests into a single JSON object.
extends: _layouts.documentation
section: content
---

# Requests

----

## Accessing The Request

To obtain an instance of the current HTTP request via dependency injection, you should type-hint the `Illuminate\Http\Request` class on your controller method. The incoming request instance will automatically be injected.

```php
declare(strict_types=1);

namespace App\Http\Procedures;

use Sajya\Server\Procedure;
use Illuminate\Http\Request;

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
     * @param  Request  $request
     * @return string
     */
    public function ping(Request $request)
    {
        return $request->input('innings');
    }
}
```

The transferred parameters will be automatically written to the object:
```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' --data-binary '{"jsonrpc":"2.0","method":"tennis@ping","params":["innings": "out"],"id" : 1}'
```

Since this is a regular Laravel object, you can perform all available operations on it, for example, validation:

```php
/**
 * Execute the procedure.
 *
 * @param  Request  $request
 * @return string
 */
public function ping(Request $request)
{
    $validatedData = $request->validate([
        'innings' => 'required|string|max:255',
    ]);
}
```

Sometimes you may miss the automatic binding of models in the route. But you can extend the request class. Let's execute the artisan command:

```bash
php artisan make:request ExampleRequest
```
The generated class will be placed in the `app/Http/Requests` directory.

```php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExampleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user'   => 'bail|required|unique:user|max:255',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function user()
    {
        $user = new User();

        return $user->resolveRouteBinding($this->user);
    }
```

Then you can quickly and conveniently get values in the methods of procedures:

```php
/**
 * Execute the procedure.
 *
 * @param  ExampleRequest  $request
 * @return string
 */
public function ping(ExampleRequest $request)
{
    $request->user();
    //...
}
```


## Batch

Batch processing allows you to optimize your application by combining multiple requests into a single JSON object.

Let's look at an example of the difference with the REST approach. For example, you communicate with your friends in the messenger and the bus drove into the tunnel.
Internet connection dropped. Messages are in standby mode. As soon as a connection appears during the REST approach, two messages are sent, batch processing allows you to avoid this since you can send several different requests at once in one:

<!--
![JSON RPC Batch Requests](/assets/img/batch-requests.svg)
-->

```php
[
  {
    "jsonrpc": "2.0",
    "method": "message@create",
    "params": "...",
    "id": 1
  },
  {
    "jsonrpc": "2.0",
    "method": "message@create",
    "params": "...",
    "id": 2
  }
]
```

In this scenario, individual requests are in no way interdependent and therefore can be placed in a batch request in any order. Responses to batch requests may appear in a different order. The id property can be used to correlate individual requests and responses.

You can easily try this by running the following command from a quick start:

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' --data-binary '[{"jsonrpc":"2.0","method":"tennis@ping","params":[],"id" : 1},{"jsonrpc":"2.0","method":"tennis@ping","params":[],"id" : 2}]'
```


<!--
![JSON PRC Notifications](/assets/img/notifications.svg)
-->


## Notification

A Notification is a request object without an `id` member. 
This means that the client is not interested in the response and the server will not send it.

> Note. In a batch request, if there is at least one request that does not have the id property,
then the whole group is considered as a notification one.


You can easily try this by running the following command from a quick start:

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' --data-binary '{"jsonrpc":"2.0","method":"tennis@ping","params":[]}'
```
