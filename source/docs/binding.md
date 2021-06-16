---
title: Requests binding for JSON-RPC
description: Different methods for binding allows you to conveniently access objct instances created from the request parameters
extends: _layouts.documentation
section: content
---

# Binding

----

Sometimes you may miss the automatic binding of models in the route. There are multiple possible solutions to access objects based on request parameters depending on your needs:

*   Access using custom methods
    
    *   use custom methods in a custom Request class
    *   bind instances inside a custom Request class
    
*   Access using dependency injection

    *   use a custom Request class to automatically resolve and inject Eloquent models
    *   use a custom Request class to apply a custom resolution logic for objects to be injected
    *   use the global binding features of the library to inject objects

## Access using custom methods

### Use custom methods in a custom Request class

Once you are using a custom `FormRequest` it is easy to implement additional methods to facilitate with resolution of object instances.

#### Access instances using dedicated methods

A simple approach is to create a method in the request, that returns the required instance based on the request parameters.

```php
declare(strict_types=1);

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class ExampleRequest extends FormRequest
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function user()
    {
        $user = new User();
        return $user->resolveRouteBinding($this->user);
    }
}
```


This `user()` method resolves an Eloquent model based on the `user` parameter of the request. Then you can quickly and conveniently get the models in the methods of procedures:

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

#### Bind instances inside the request

It is also possible to replace or add the parameters directly inside the request.

```php
declare(strict_types=1);

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class ExampleRequest extends FormRequest
{
    /**
     * Bind instances into the Request after validation has passed.
     */
    public function passedValidation()
    {
        $user = new User();
        $user = $user->resolveRouteBinding($this->user);
        $this->merge(
            [
                'user_original' => $this->user,
                'user' => $user,
            ]
        );
    }
}
```

After this the resolved `User` model can be accessed from the Request, while the original user parameter value is also kept under the new `user_original` parameter.

```php
/**
 * Execute the procedure.
 *
 * @param  ExampleRequest  $request
 * @return string
 */
public function ping(ExampleRequest $request)
{
    $userInstance = $request->user;
    $originalUserParameter = $request->user_original;
    //...
}
```

## Access using dependency injection

**Sajya** comes with three different built in ways to handle dependency injection needs. This means that by applying one (or more) of the below listed methods, class instances can be automatically injected into the Procedure methods as needed. The first two solutions require the use of a special `FormRequest` while the last one can be used independently of the Request injected into the Procedure method.

### Use a custom Request class to automatically resolve and inject Eloquent models

If you want to get Eloquent model instances in the Procedure methods using dependency injection use a custom `FormRequest` that implements the `Sajya\Server\Binding\BindsParameters` interface.

```php
declare(strict_types=1);

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Sajya\Server\Binding\BindsParameters;

class ExampleRequest extends FormRequest implements BindsParameters
{
    public function getBindings(): array
    {
        return [
            'userById'       => 'user_id',
            'userByEmail'    => 'user_email:email',
            'userByNestedId' => ['user','id']
        ];
    }

    public function resolveParameter(string $parameterName)
    {
        return false; // Return false = do not use this part for now.
    }
    
    //...
}
```

In the `getBindings()` method you can define the mapping between the Procedure method parameters and the request parameters. The meaning of the definitions are:

*   `'userById' => 'user_id'`: the Procedure method parameter `$userById` will get the type-hinted Eloquent model instance where the `id` (or the default `routeKey` [defined by](https://laravel.com/docs/8.x/routing#customizing-the-default-key-name) `getRouteKeyName()` on the Model class) matches the `user_id` request parameter.
*   `'userByEmail' => 'user:email'`: the Procedure method parameter `$userByEmail` will get the type-hinted Eloquent model instance where the `email` attribute matches the `user_email` request parameter.
*   `'userByNestedId' => ['user','id']`: the Procedure method parameter `$userByNestedId` will get the type-hinted Eloquent model instance with the `id` (or default `routeKey`) attribute matching the `id` request parameter nested inside the `user` request parameter.

The actual model type to be injected depends on the Procedure method signature, so it is mandatory to type-hint those parameters correctly.

**Note** that it is only possible to use this resolution logic for classes that implement the `Illuminate\Contracts\Routing\UrlRoutable` interface, e.g.: Eloquent models.

```php
/**
 * Execute the procedure.
 *
 * @param  ExampleRequest  $request
 * @return string
 */
public function ping(ExampleRequest $request, User $userById, User $userByEmail, User $userByNestedId)
{
    $userInstance = userById;
    $originalUserParameter = $request->user_id;
    //...
}
```

**Note:** Because the procedure method parameters are resolved in sequential order it is mandatory to always put the Request before the type-hinted parameter(s) of the handling method. So the same setup with the following method signature would fail.

```php
// Wrong:
public function ping(User $userById, User $userByEmail, User $userByNestedId, ExampleRequest $request) { //...
```

### Use a custom Request class to apply a custom resolution logic for objects to be injected

Similarly to the previous case it is possible to implement any custom resolution logic inside a `FormRequest` that implements the `Sajya\Server\Binding\BindsParameters` interface. This is most usefull to resolve instances other than Eloquent models. For this, use the `resolveParameter()` method.

```php
declare(strict_types=1);

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Sajya\Server\Binding\BindsParameters;

class ExampleRequest extends FormRequest implements BindsParameters
{
    public function getBindings(): array
    {
        return []; // Return empty array = do not use this part for now.
    }

    public function resolveParameter(string $parameterName)
    {
        if ( 'userByHash' === $parameterName ) {
            return User::getUserInstanceBasedOnASecretHash( $this->input('user_hash') );
        }
        return false; // Allow the service container to proceed with default resolution.
    }
}
```

In this case the procedure method parameter called `$userByHash` will be resolved by the `User::getUserInstanceBasedOnASecretHash()` method, and injected accordingly.

```php
/**
 * Execute the procedure.
 *
 * @param  ExampleRequest  $request
 * @return string
 */
public function ping(ExampleRequest $request, User $userByHash)
{
    $userInstance = $userByHash;
    $userHash = $request->user_hash;
    //...
}
```

It is possible to use both the `getBindings()` and the `resolveParameter()` methods together. If both are configured, resolution by `resolveParameter()` takes precedence over the resolution by `getBindings()`.

### Use the global binding features of the library

Defining the parameter bindings in a custom `FormRequest` class is convenient, because the connection between the binding and the Procedure method becomes implicit by type-hinting the right `FormRequest` class on the method itself. However sometimes you may need to define the bindings in other places in the code, perhaps without using a custom `FormRequest`. For that case **Sajya** provides the `RPC` facade, which allows injection bindings to be defined in a global context.

It mirrors the logic of Laravel's [`Route::model()`](https://laravel.com/docs/8.x/routing#explicit-binding) and [`Route::bind()`](https://laravel.com/docs/8.x/routing#customizing-the-resolution-logic) calls, but with an extended call signature to address the differences between route and parameter based resolution.

#### RPC::model()

The simplest case is to bind an Eloquent model based on a request attribute:

```php
RPC::model('user', User::class);
```

Any Procedure method with a `User $user` parameter will be injected with a `User` instance resolved by matching the `user` parameter in the RPC request to the primary `routeKey` (like `id`) of the `User` model:

```php
/**
 * @param User $user The user resolved by global bindings.
 */
public function getUserName(User $user): string
{
    return $user->getAttribute('name');
}
```

##### Scoping

One may need to apply different models for different Procedure methods, so the binding can be scoped with a third argument:

```php
RPC::model('user', RegularUser::class, 'myNamespace\MyProcedure@handleUser');
RPC::model('user', AdminUser::class,   'myNamespace\MyProcedure@handleAdminUser');
RPC::model('user', SpecialUser::class, 'myNamespace\special');
RPC::model('user', User::class, ''); // = RPC::model('user', User::class);
```

These lines mean:

*   Resolve a `RegularUser` model for the `user` parameter of the `myNamespace\MyProcedure@handleUser` method
*   Resolve an `AdminUser` model for the `user` parameter of the`myNamespace\MyProcedure@handleAdminUser` method
*   Resolve a `SpecialUser` model for the `user` parameter of all Procedures and methods under the `myNamespace\special` namespace
*   Resolve a `User` model for the `user` parameter of every other Procedure and method

The resolution happens in the order the binders are registered, so start with the more specific ones and progress with more generic towards the unscoped global bindings.

It is also possible to bind multiple scopes in one call:

```php
RPC::model('user', RegularUser::class, [
    'myNamespace\MyProcedure@handleUser',
    'myNamespace\MyOtherProcedure@handleUser'
]);
```

It is also possible to use the PHP callable array syntax for the scopes which are defined down to the method level, e.g.:

```php
RPC::model('user', RegularUser::class, ['myNamespace\MyProcedure', 'handleUser']);
RPC::model('user', AdminUser::class,   ['myNamespace\MyProcedure', 'handleAdminUser']);
```

##### Method parameter mapping

In some cases the method parameter may have a different name than the request parameter. In that case the fourth argument can be used to declare which method parameter should the binding apply to:

```php
RPC::model('customer', User::class, '', 'user');
```

In this case the `User` model resolved based on the `customer` request parameter will be injected as the `$user` argument of the Procedure method, instead of the default `$customer` argument.  
This can be particularly useful with nested parameters, as their names may collide with each other. Consider these two bindings:

```php
RPC::model(['seller','id'], User::class, '', 'seller');
RPC::model(['buyer', 'id'], User::class, '', 'buyer' );
```

Without the fourth parameter both the seller and the buyer `User` would be attempted to be injected for a parameter called `$id`, however it is not possible to have two method parameters with the same name. Instead the first line will resolve a `User` model based on the parameter `id` nested under the parameter `seller` and inject the resulting `User` instance under `$seller`, while the second will inject another `User` resolved based on the `id` of the `buyer` and inject that for the parameter called `$buyer`.

##### Error handling

Similar to Laravel's `Route::model()` the last optional parameter is an error handler callback. It is called if the automatic resolution of the model fails. Anything returned from this method will be bound and injected.

```php
RPC::model('user', User::class, '', null, static function () {
    return auth()->user();
});
```

This code will attempt automatic Eloquent model resolution, but if it fails to find the `User` it will inject the currently logged in user instead.

#### RPC::bind()

It is the same for `Route::bind()` what `RPC::model()` is for `Route::model()`. The first, third and fourth parameters are the same.  
The second parameter instead of `$class` is `$binder` which is a callback that performs the binding. It receives the value of the request parameter configured by the first argument and is expected to return the instance to be injected into the Procedure method. E.g.:

```php
RPC::bind(
    'user_hash',
    /**
     * @param  string  $parameter
     * @return User
     */
    static function (string $parameter) {
        return User::getUserByHash($parameter);
    },
    '', // global scope
    'user' // Inject for the method parameter called $user
);
```

#### Nested parameters

Nested parameters are supported the same way for the global bindings using the `RPC` Facade as for the `BindsParameters::getBindings()` method. It is possible to bind to a nested request parameter, for example if the request has a `customer` which has an `id`, the binding can be configured with `['customer', 'id']` as the first argument to the `RPC` methods.
Customising the mathing field is also supported with the `RPC::model()` calls, e.g.: `['customer', 'address:email']` would resolve based on the `email` field instead of the primary routeKey.

### Resolution order

Bindings configured in a `FormRequest` that implement the `Sajya\Server\Binding\BindsParameters` interface take precedence over bindings using the `RPC` Facade. However `FormRequest` based resolution only works for parameters that come after the type-hinted `FormRequest` parameter. For any parameter before the `FormRequest` parameter only the `RPC` Facade defined bindings apply.
If none of the configured bindings can resolve the type-hinted parameters, the resolution is left for Laravel's Service container which would proceed with the dependency injection as normal.
