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

## Middleware for gzip

Конечно, если данные из сервиса потребляться напрямую веб-браузерами то такого объема будет сложно достичь. Но при передачах данных между серверами, для большей оптимизации можно использовать сжатие, например [gzip](https://en.wikipedia.org/wiki/Gzip). 


![JSON Compress](/assets/img/compress.svg)


Для того, чтобы ответы приложения сжимались достаточно поставить "GzipCompress" в качестве middleware:

```php
use Sajya\Server\Middleware\GzipCompress;

Route::rpc('/v1/endpoint', [TennisProcedure::class])
    ->middleware(GzipCompress::class)
    ->name('rpc.endpoint');
```

После этого мы можем легко проверить это с помощью curl:

```bash
curl 'http://127.0.0.1:8001/api/v1/endpoint' --data-binary '{"jsonrpc":"2.0","method":"tennis@ping","id":1}' -H "Accept-Encoding: gzip" --output -
```

Примерным результатом будет:

```bash
Accept-Encoding: gzip"  --output -
�V�LQ�R2T�Q*J-.�)r
��ҁ�������d�����R-��*%      
```

> Примечание. Если в запросе отсутствует заголовок о принятии данных в формате gzip `Accept-Encoding: gzip`, то вернется не сжатый ответ.
