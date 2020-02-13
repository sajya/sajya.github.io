---
title: Authentication for JSON-RPC
description: Laravel makes implementing authentication very simple. In fact, almost everything is configured for you out of the box.
extends: _layouts.documentation
section: content
---

# Authentication
 
## Stateless
 
При работе с JSON-PRC, может появиться соблазн добавить аутентификацию,
данные которые будут указаны в параметрах запроса:
 
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

Не стоит так делать, формат обмена не предполагает аутентификацию, так как это не входит в его обязанности. Наилучшим решением является передача таких данных в заголовках.
 
 
 > Каждый запрос клиента к серверу должен содержать всю информацию, необходимую для выполнения этого запроса, без хранения какого-либо контекста на стороне сервера. Состояние сеанса целиком хранится на стороне клиента.
 
 ----
 
## HTTP Basic Authentication 

Например реализуем `HTTP Basic Authentication`, для этого определите промежуточное программное обеспечение, которое вызывает `onceBasic` метод. Если `onceBasic` метод не возвращает ответ , запрос может быть передан далее в приложение:

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

Затем зарегистрируйте промежуточное программное обеспечение маршрута и прикрепите его к маршруту:

```php
Route::rpc('/v1/endpoint')
    ->name('rpc.endpoint')
    ->middleware('auth.basic.once');
```

Тогда для обращения к процедурам, необходимо указывать и заголовок, например c использованием `JavaScript` библиотеки `Axios`:

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

По умолчанию `middleware` будет использовать столбец `email` в записи пользователя в качестве «имени пользователя».

----

Вы можете узнать больше посетив документацию laravel по [аутентификации](https://laravel.com/docs/authentication) и [аутентификации для api](https://laravel.com/docs/api-authentication).
