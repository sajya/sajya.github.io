---
title: HTTP JSON-RPC Client
description: HTTP JSON-RPC Client for Laravel
extends: _layouts.documentation
section: content
---

## Introduction

The HTTP(S) Client is a standalone package that uses your PHP code to make requests. Built on [Laravel](https://laravel.com/docs/8.x/http-client#introduction) (Doesn't require the entire framework, just its component) expressive HTTP shell, it allows you to customize things like authorization, retries, and more.


### Installation

To install the client package, navigate to your project directory and run the following command:

```bash
composer require sajya/client
```

### Basic Usage

To use the client, you'll need to import the necessary classes and create an instance of the `Client` class. You can then make requests and process the responses. Here's an example:

```php
use Illuminate\Support\Facades\Http;
use Sajya\Client\Client;

// Create the HTTP(S) Client and specify the base URL
$client = new Client(Http::baseUrl('http://localhost:8000/api/v1/endpoint'));

// Make a request to the server
$response = $client->execute('tennis@ping');

// Print the response from the server
echo $response->result(); // pong
```

By default, the request identifier is generated using a [UUID](https://en.wikipedia.org/wiki/Universally_unique_identifier). You can retrieve the request identifier by calling the `id()` method on the response object:

```php
echo $response->id();
```

To retrieve the result of an error response, you can use the `error()` method:

```php
echo $response->error();
```

### Request Parameters

You can pass parameters to your requests either as positional parameters or named arguments. Here are examples of both:

```php
// Positional parameters
$response = $client->execute('tennis@ping', [3, 5]);

// Named arguments
$response = $client->execute('tennis@ping', ['end' => 10, 'start' => 1]);
```

### Batch Requests

You can also make batch requests, where multiple procedures are called in a single HTTP request. This can be achieved using the `batch` method of the `Client` class. Here's an example:

```php
$responses = $client->batch(function (Client $client) {
    $client->execute('tennis@ping');
    $client->execute('tennis@ping');
});
```

### Notify Requests

In addition to regular requests, you can also send notify requests. Notify requests are similar to regular requests but without waiting for a response. Here's an example:

```php
$client->notify('procedure@method');
```

With the HTTP(S) Client, you have powerful capabilities for making HTTP requests and processing responses in your PHP applications.
