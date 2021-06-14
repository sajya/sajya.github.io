---
title: Authentication for JSON-RPC
description: Laravel makes implementing authentication very simple. In fact, almost everything is configured for you out of the box.
extends: _layouts.documentation
section: content
---

# Authentication
 
## Stateless
 
When working with JSON-PRC, you might be tempted to add authentication,
data that will be specified in the request parameters:
 
```json
{
    "jsonrpc":"2.0",
    "method":"ping",
    "params": {
      "api": "ebfb7ff0-b2f6-41c8-bef3-4fba17be410c"
    },
    "id":1
}
```

It would be best if you did not do this. The exchange format does not imply authentication since this is not part of his duties. The best solution is to transfer such data in the headers.
 
 > Each client request to the server must contain all the information necessary to fulfill this request without storing any context on the server-side. The session state is entirely stored on the client-side.
 
 ----
 
## HTTP Basic Authentication 


For example, we implement `HTTP Basic Authentication` to define the middleware that calls the `onceBasic` method. If the `onceBasic` method does not return a response, the request can be passed on to the application:

```php
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class AuthenticateOnceWithBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        return Auth::onceBasic() ?: $next($request);
    }

}
```

Then register the route middleware and attach it to the route:

```php
Route::rpc('/v1/endpoint')
    ->name('rpc.endpoint')
    ->middleware('auth.basic.once');
```

Then, to access the procedures, you must specify the title, for example, using the `JavaScript` library `Axios`:

```javascript
axios.post('http://localhost/v1/endpoint', {
    jsonrpc: "2.0",
    id: "1",
    method: 'ping',
    params: {},
}, {
    auth: {
        username: "root@localhost.com",
        password: "H3xU67Z8T"
    },
    headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*'
    },
});
```

By default, `middleware` will use the `email` column in the user record as the "username".

----


## Token Authentication

### Database Preparation

Before using the `token` driver, you will need to create a migration which adds an `api_token` column to your `users` table:

```php
Schema::table('users', function ($table) {
    $table->string('api_token', 80)
        ->after('password')
        ->unique()
        ->nullable()
        ->default(null);
});
```

Once the migration has been created, run the `migrate` Artisan command.

> If you choose to use a different column name, be sure to update your API's `storage_key` configuration option within the `config/auth.php` configuration file.

### Generating Tokens

Once the `api_token` column has been added to your `users` table, you are ready to assign random API tokens to each user that registers with your application. You should assign these tokens when a `User` model is created for the user during registration.

```php
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return \App\Models\User
 */
protected function create(array $data)
{
    return User::forceCreate([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'api_token' => Str::random(80),
    ]);
}
```


### Hashing Tokens

In the examples above, API tokens are stored in your database as plain-text. If you would like to hash your API tokens using SHA-256 hashing, you may set the `hash` option of your `api` guard configuration to `true`. The `api` guard is defined in your `config/auth.php` configuration file:

```php
'api' => [
    'driver' => 'token',
    'provider' => 'users',
    'hash' => true,
],
```

#### Generating Hashed Tokens

When using hashed API tokens, you should not generate your API tokens during user registration. Instead, you will need to implement your own API token management page within your application. This page should allow users to initialize and refresh their API token. When a user makes a request to initialize or refresh their token, you should store a hashed copy of the token in the database, and return the plain-text copy of token to the view / frontend client for one-time display.

For example, a controller method that initializes / refreshes the token for a given user and returns the plain-text token as a JSON response might look like the following:

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{
    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request)
    {
        $token = Str::random(80);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return ['token' => $token];
    }
}
```


> Since the API tokens in the example above have sufficient entropy, it is impractical to create "rainbow tables" to lookup the original value of the hashed token. Therefore, slow hashing methods such as `bcrypt` are unnecessary.


## Protecting Routes

Laravel includes an authentication guard that will automatically validate API tokens on incoming requests. You only need to specify the `auth:api` middleware on any route that requires a valid access token:

```php

Route::rpc('/v1/endpoint')
    ->name('rpc.endpoint')
    ->middleware('auth:api');
```

## Passing Tokens In Requests

There are several ways of passing the API token to your application. We'll discuss each of these approaches while using the Guzzle HTTP library to demonstrate their usage. You may choose any of these approaches based on the needs of your application.

#### Query String

Your application's API consumers may specify their token as an `api_token` query string value:

```php
$response = $client->request('GET', '/v1/endpoint?api_token='.$token);
```


#### Bearer Token

Your application's API consumers may provide their API token as a `Bearer` token in the `Authorization` header of the request:

```php
$response = $client->request('POST', '/v1/endpoint', [
    'headers' => [
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/json',
    ],
]);
```


----

You can find out more by visiting the laravel documentation on [authentication](https://laravel.com/docs/authentication).
