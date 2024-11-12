---
title: Request
description: Batch processing allows you to optimize your application by combining multiple requests into a single JSON object.
extends: _layouts.documentation
section: content
---


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
curl --location --request POST 'http://127.0.0.1:8000/api/v1/endpoint' \
--header 'Content-Type: application/json' \
--data-raw '{
	"jsonrpc": "2.0",
	"method": "tennis@ping",
	"params": {
		"innings": "out"
	},
	"id": 1
}'
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
            'user' => 'bail|required|unique:user|max:255',
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
