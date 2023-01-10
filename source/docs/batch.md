---
title: Batch requests for JSON-RPC
description: Batch processing allows you to optimize your application by combining multiple requests into a single JSON object.
extends: _layouts.documentation
section: content
---

# Requests

----

## Batch

Batch processing allows you to send multiple requests as a single JSON object, which can be more efficient and improve the performance of your application.

To illustrate the difference with the REST approach, consider the following scenario: you are using a messaging app and are communicating with your friends when the bus you are riding on enters a tunnel and your internet connection drops. In the REST approach, each message would be sent individually as soon as the connection is reestablished, leading to two separate requests. With batch processing, you can instead send both messages in a single request as shown below:

<!--
![JSON RPC Batch Requests](/assets/img/batch-requests.svg)
-->

```json
[
  {
    "jsonrpc": "2.0",
    "method": "message@create",
    "params": "...",
    "id": 1
  },
  {
    "jsonrpc": "2.0",
    "method": "message@create",
    "params": "...",
    "id": 2
  }
]
```

Note that in this scenario, the individual requests are independent and can therefore be placed in the batch request in any order. The responses to the batch request may also appear in a different order, but the `id` property can be used to match individual requests with their corresponding responses.

To try out batch processing, you can use the following `curl` command:

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' --data-binary '[{"jsonrpc":"2.0","method":"tennis@ping","id":1},{"jsonrpc":"2.0","method":"tennis@ping","id":2}]'
```

The execution result should be as follows:

```json
[
  {
    "id": "1",
    "result": "pong",
    "jsonrpc": "2.0"
  },
  {
    "id": "2",
    "result": "pong",
    "jsonrpc": "2.0"
  }
]
```

In conclusion, batch processing allows you to send multiple requests in a single JSON object, improving the efficiency and performance of your application.
