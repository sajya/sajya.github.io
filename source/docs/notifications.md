---
title: Notification requests for JSON-RPC
description: A Notification is a request object without an `id` member. 
extends: _layouts.documentation
section: content
---

# Requests

----

## Notification

A Notification is a request object without an `id` member. 
It means that the client is not interested in the response, and the server will not send it.

<!-- 

> **Note.** In a batch request, if there is at least one request that does not have the id property,
then the whole group is considered as a notification one.

-->

You can easily try this by running the following command from a quick start:

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' --data-binary '{"jsonrpc":"2.0","method":"tennis@ping"}'
```

Execution result:

```bash
{"id":null,"result":null,"jsonrpc":"2.0"}
```
