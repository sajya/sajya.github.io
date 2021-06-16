---
title: Requests parameters, validation and authorization for JSON-RPC
description: Working with the Request provides access to the request parameters and related features.
extends: _layouts.documentation
section: content
---

# Requests

----

## Accessing the Data

The parameters of the incoming RPC request are automatically made available under the standard Laravel request.

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' --data-binary '{"jsonrpc":"2.0","method":"tennis@ping","params":{"innings": "out"},"id" : 1}'
```

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
        return $request->input('innings'); // will return 'out'
    }
}
```

The transferred parameters will be automatically written to the request object. To obtain all parameters as an array, use this syntax on the injected Request:

```php
$request->request->all();
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

## Using FormRequests

Just like in Laravel controllers, FormRequests can be used to provide validation and authentication using a simple syntax.

The first step is to create a child class of the `Illuminate\Foundation\Http\FormRequest` class. Let's execute the artisan command:

```bash
php artisan make:request ExampleRequest
```
The generated class will be placed in the `app/Http/Requests` directory.

```php
declare(strict_types=1);

namespace App\Http\Requests;

use App\User;
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
            'user_id' => 'bail|required|unique:user|max:255',
        ];
    }
}
```

The [`authorize()`](https://laravel.com/docs/8.x/validation#form-request-validation) and [`rules()`](https://laravel.com/docs/8.x/validation#form-request-validation) methods behave the same with standard Laravel controllers.

All you need to do is to type-hint this new Request class instead of `Illuminate\Http\Request` on the procedure method. Then you can quickly and conveniently get values in the methods of procedures:

```php
/**
 * Execute the procedure.
 *
 * @param  ExampleRequest  $request
 * @return string
 */
public function ping(ExampleRequest $request)
{
    // Do stuff with the request already authenticated and validated, e.g.:
    $user_id = $request->get('user_id');
    //...
}
```
