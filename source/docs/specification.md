---
title: Specification
description: 
extends: _layouts.documentation
section: content
---

# Specification 

## Brief

**JSON-RPC** is a lightweight stateless protocol for creating a remote procedure call (RPC) style API.
Supporting several types of data and commands. With the possibility of notification (information sent to the server does not require a response) and multiple calls.


----


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

----

Official source for [JSON-RPC 2.0 Specification](http://www.jsonrpc.org/specification). 
You can ask clarifying questions to the guys from [the json-rpc Google group](http://groups.google.com/group/json-rpc).
