---
title: Getting Started
description: Getting started with Jigsaw's docs starter template is as easy as 1, 2, 3.
extends: _layouts.documentation
section: content
---

# Welcome

## Introduction

**Sajya** is an open and free project whose goal is to provide an easy implementation of the JSON-RPC 2.0 server for the Laravel framework.

The manual contains information on using the package, but does not explain the use of the framework. 
It is strongly recommended that you read the [Laravel documentation](https://laravel.com/docs/).


----

## Specification 

**JSON-RPC** is a lightweight stateless protocol for creating a remote procedure call (RPC) style API.
Supporting several types of data and commands. With the possibility of notification (information sent to the server does not require a response) and multiple calls.

The request object includes the following properties:

- **jsonrpc** — will always be `"2.0"`, indicates the protocol version.
- **method** — name of the method to be called.
- **params** — optional property, load to the call (method arguments).
- **id** — optional property, unique call identifier. If you want to get the value from the called function, then you must generate `id` on the client side and when answering you can understand which call the answer came by matching the `id` of the response.

```json
{
    "jsonrpc":"2.0",
    "method":"ping",
    "params":[],
    "id":1
}
```

> **Note.** If you did not send `id`, then this means that you are not interested in the answer and you will not receive anything from the server. Such a call is called a notification.


An answer can have the following properties:

- **jsonrpc** — will always be `"2.0"`, indicates the protocol version.
- **result** — response body (return value of the method).
- **id** — unique identifier of the response. It is needed so that the client can match to which request he received a response.
- **error** — in case of an error, instead of result, you will get an error field containing a code and a human-readable description of the error.

```json
{
    "jsonrpc": "2.0",
    "id": 1,
    "result": "pong"
}
```


Official source for [JSON-RPC 2.0 Specification](http://www.jsonrpc.org/specification). 
You can ask clarifying questions to the guys from [the json-rpc Google group](http://groups.google.com/group/json-rpc).


## How to install?

The package is freely distributed over the Internet, [source codes](https://github.com/sajya/server) and [release notes](https://github.com/sajya/server/releases) are published on GitHub.
The [installation manual](/docs/installation/) contains detailed instructions.


> To suggest improvements to this guide, [create a new issue](https://github.com/sajya/sajya.github.io/issues/new).
If you have questions or find an error in the documentation, please indicate the chapter and accompanying text to indicate an error.
