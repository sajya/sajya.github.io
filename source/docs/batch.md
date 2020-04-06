---
title: Batch requests for JSON-RPC
description: Batch processing allows you to optimize your application by combining multiple requests into a single JSON object.
extends: _layouts.documentation
section: content
---

# Requests

----

## Batch

Batch processing allows you to optimize your application by combining multiple requests into a single JSON object.

Let's look at an example of the difference with the REST approach. For example, you communicate with your friends in the messenger and the bus drove into the tunnel.
Internet connection dropped. Messages are in standby mode. As soon as a connection appears during the REST approach, two messages are sent, batch processing allows you to avoid this since you can send several different requests at once in one:

<!--
![JSON RPC Batch Requests](/assets/img/batch-requests.svg)
-->

```php
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

In this scenario, individual requests are in no way interdependent and therefore can be placed in a batch request in any order. Responses to batch requests may appear in a different order. The id property can be used to correlate individual requests and responses.

You can easily try this by running the following command from a quick start:

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' --data-binary '[{"jsonrpc":"2.0","method":"tennis@ping","params":[],"id" : 1},{"jsonrpc":"2.0","method":"tennis@ping","params":[],"id" : 2}]'
```
