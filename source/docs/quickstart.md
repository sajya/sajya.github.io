---
title: Quickstart
description:
extends: _layouts.documentation
section: content
---

# Quick Start

At this stage, it is necessary you have already [installed the framework and package](/docs/installation)

----


## Creating Procedures

Каждый метод запроса описываться в отдельном классе под названием "Процедура". В нем обязательно должны присутствовать
статическое свойство `name` по которому будет определяться выполнение запроса, а непосредственные действия могут быть выполнены в любом публичном методе.

Создать класс процедуры можно выполнив `artisan` команду:

```bash
php artisan make:procedure TennisProcedure
```
 
Она создаст новый файл `TennisProcedure.php` в директории `app/Http/Procedures`.

Назовём новую процедуру `tennis`, для этого изменим свойство `name` и добавим возвращающие значение `pong` в метод `ping`, что бы получилось такое содержание:

```php
declare(strict_types=1);

namespace App\Http\Procedures;

use Sajya\Server\Procedure;
use Illuminate\Support\Collection;

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
     * @return array|string|integer
     */
    public function ping()
    {
        return 'pong';
    }
}
```

## Route Registration

Как и контроллер, процедуру нужно регистрировать в файле маршрутов, определим его в файле `api.php`:

```php
use App\Http\Procedures\TennisProcedure;

Route::rpc('/v1/endpoint', [TennisProcedure::class])->name('rpc.endpoint');
```

> Обратите внимание, что вторым аргументом мы передаём массив, который содержит только необходимые классы. Таким образом мы сможем в будующем добавить вторую версию нашего API, без конфликтов.


## Starting a Local Server

Для запуска проекта можно использовать встроенный сервер:
```bash
php artisan serve
```

Откройте браузер и перейдите к `http://localhost:8000/dashboard`. Если все работает, вы увидите страницу входа в панель управления. Позже, когда вы закончите работу, остановите сервер, нажав `Ctrl+C` в используемом терминале.

## Проверка 

Выполним `curl` обращение к новому API:

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' 
--data-binary '[{ "jsonrpc":"2.0","method":"tennis@ping","params":[],"id" : 1 }]'
```
