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

You can find out more by visiting the laravel documentation on [authentication](https://laravel.com/docs/authentication) and [authentication for api](https://laravel.com/docs/api-authentication).
