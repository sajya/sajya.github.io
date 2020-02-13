---
title: JSON Compression
description: Compress JSON files to reduce file size, get lower download times and save website bandwidth.
extends: _layouts.documentation
section: content
---

# JSON

## Compression

Огромное число сервисов используют JSON для обмена сообщениями, за счёт удобочитаемых данных для человека и меньшего размера в сравнении с XML. Но у него также есть свои проблемы, одной из такой является размер файла в сравнении с бинарными форматами. На малом объёме данных скорость передачи и расшифровки будет практически незаметна почти на любом формате, но при увеличении объема нагрузка на сеть может сильно возрастать. 

----

## Middleware for Gzip

Конечно, если данные из сервиса потребляться напрямую веб-браузерами то такого объема будет сложно достичь. Но при передачах данных между серверами, для большей оптимизации можно использовать сжатие, например Gzip. 


![JSON Compress](/assets/img/compress.svg)


... Подключаем `middleware` ...


```php
namespace App\Http\Middleware;

class GzipMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        $response = $next($request);
        $content = $response->content();

        return response(gzencode($content, 7))->withHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Content-type' => 'application/json; charset=utf-8',
            'Content-Encoding' => 'gzip'
        ]);
    }
}
```
