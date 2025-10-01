---
title: Welcome
description: Easy implementation of the JSON-RPC 2.0 server for the Laravel framework.
extends: _layouts.documentation
section: content
---

## Introduction

**Sajya** is an open and free project whose goal is to provide easy implementation of the JSON-RPC 2.0 server and client for the Laravel framework.

> The manual contains information on how to use the package, but does not explain how to use the framework. To suggest improvements to this guide, [create a new issue](https://github.com/sajya/server/issues/new).
If you have questions or find an error in the documentation, please indicate the chapter and accompanying text to indicate an error.


## What is JSON-RPC 2.0?

JSON-RPC 2.0 is a simple stateless protocol used to create Remote Procedure Call (RPC) style APIs. It enables communication between a client and a server by exchanging JSON messages.

For example, on the server side, you might have an endpoint that accepts requests with a JSON body like this:

```json
{
  "jsonrpc": "2.0",
  "method": "subtract",
  "params": {
    "minuend": 42,
    "subtrahend": 23
  },
  "id": 3
}
```

The server then responds with a JSON message like this:

```json
{
  "jsonrpc": "2.0",
  "result": 19,
  "id": 3
}
```

In case of an error, the response might look like this:

```json
{
  "jsonrpc": "2.0",
  "error": {
    "code": 1234,
    "message": "Description of the error"
  },
  "id": 3
}
```

You can find out more on the [specification page](/docs/specification).


## How To Install?

The package is freely distributed over the Internet, [source codes](https://github.com/sajya/server), and [release notes](https://github.com/sajya/server/releases) are published on GitHub.
The [Quick Start](/docs/quickstart) contains detailed instructions.
