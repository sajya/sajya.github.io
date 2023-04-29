---
title: Specification
description: JSON-PRC Specification
extends: _layouts.documentation
section: content
---


## Brief

**JSON-RPC** is a lightweight, stateless protocol for creating a remote procedure call (RPC) style API.
We support several types of data and commands, with the possibility of notification (information sent to the server does not require a response) and multiple calls.


----


The request object includes the following properties:

- **jsonrpc** — will always be `"2.0"`, indicates the protocol version.
- **method** — the name of the method to be called.
- **params** — optional property, load to the call (method arguments).
- **id** — optional property, unique call identifier. If you want to get the value from the called function, you must generate `id` on the client-side. When answering, you can understand which call the answer came by matching the response's `id`.


```json
{
    "jsonrpc":"2.0",
    "method":"ping",
    "params":[],
    "id":1
}
```

> **Note.** If you did not send `id`, then this means that you are not interested in the answer, and you will not receive anything from the server. Such a call is called a notification.


An answer can have the following properties:

- **jsonrpc** — will always be `"2.0"`, indicates the protocol version.
- **result** — response body (return value of the method).
- **id** — unique identifier of the response. It is needed so that the client can match to which request he received a response.
- **error** — in case of a mistake, you will get an error field containing a code and a human-readable description of the error instead of the result.

```json
{
    "jsonrpc": "2.0",
    "id": 1,
    "result": "pong"
}
```

----

Official source for [JSON-RPC 2.0 Specification](http://www.jsonrpc.org/specification). 
You can ask clarifying questions to the guys from [the JSON-RPC Google group](http://groups.google.com/group/json-rpc).
