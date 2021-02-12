---
title: JSON Compression
description: Compress JSON files to reduce file size, get lower download times and save website bandwidth.
extends: _layouts.documentation
section: content
---

# Compression

## Middleware for gzip

Many services use `JSON` for messaging due to its human-readable data and smaller size compared to `XML`. But it also has its own problems, one of which is the file size compared to binary formats. On a small amount of data, the transfer and decryption speed will be almost invisible in almost any format, but with an increase in the volume, the load on the network can greatly increase.

----

Of course, if the service data is consumed directly by web browsers, this amount will be difficult to achieve. But when transferring data between servers, for more optimization, you can use compression, for example, [gzip](https://en.wikipedia.org/wiki/Gzip). 


![JSON Compress](/assets/img/compress.svg)


In order for application responses to be compressed, it is enough to put `GzipCompress` as the middleware:

```php
use Sajya\Server\Middleware\GzipCompress;

Route::rpc('/v1/endpoint', [TennisProcedure::class])
    ->middleware(GzipCompress::class)
    ->name('rpc.endpoint');
```

After that, we can easily check this with curl:

```bash
curl 'http://127.0.0.1:8001/api/v1/endpoint' --data-binary '{"jsonrpc":"2.0","method":"tennis@ping","id":1}' -H "Accept-Encoding: gzip" --output -
```

An approximate result would be:

```bash
Accept-Encoding: gzip"  --output -
�V�LQ�R2T�Q*J-.�)r
��ҁ�������d�����R-��*%      
```

Don't worry if you are confused by such symbols. It's okay, so the compression is working.

> **Note.** If the request does not contain a header about data acceptance in the gzip format `Accept-Encoding: gzip`, an uncompressed response will be returned.
