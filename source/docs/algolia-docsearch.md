---
title: Quickstart
description:
extends: _layouts.documentation
section: content
---

# Быстрый старт

At this stage, it is necessary you have already [installed the framework and package](/docs/installation)

----


## Создание процедур

Для начала необходимо создать класс процедуры, с помощью команды:

```bash
php artisan make:procedure PingProcedure
```

В директории `app/Http/Procedures` будет создан новый файл `PingProcedure.php` со следующим содержанием:

```php
declare(strict_types=1);

namespace App\Http\Procedures;

use Sajya\Server\Procedure;
use Illuminate\Support\Collection;

class PingProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'ping';

    /**
     * Execute the procedure.
     *
     * @param Collection $params
     *
     * @return array|string|integer
     */
    public function handle(Collection $params)
    {
        return 'pong';
    }
}
```

## Регистрация маршрута

Как и контроллер, процедуру нужно регистрировать в файле маршрутов, определим его в файле `api.php`:

```php
use App\Http\Procedures\PingProcedure;

Route::rpc('/v1/endpoint', [PingProcedure::class])->name('rpc.endpoint');
```


## Запуск локального сервера

Для запуска проекта можно использовать встроенный сервер:
```bash
php artisan serve
```

Откройте браузер и перейдите к `http://localhost:8000/dashboard`. Если все работает, вы увидите страницу входа в панель управления. Позже, когда вы закончите работу, остановите сервер, нажав `Ctrl+C` в используемом терминале.

## Проверка 

Выполним `curl` обращение к новому API:

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' 
--data-binary '[{ "jsonrpc":"2.0","method":"ping","params":[],"id" : 1 }]'
```
