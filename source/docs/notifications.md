---
title: Notification requests for JSON-RPC
description: A Notification is a request object without an `id` member. 
extends: _layouts.documentation
section: content
---

# Requests

----

## Notification

A Notification is a request object that does not have an `id` member. This means that the client is not interested in receiving a response from the server for this request. As a result, the server will not send a response for a Notification.

You can try out a Notification by using the following curl command:

```bash
curl 'http://127.0.0.1:8000/api/v1/endpoint' --data-binary '{"jsonrpc":"2.0","method":"tennis@ping"}'
```

The execution result should be an empty JSON object:

```bash
{}
```

Notifications are useful when the client is only interested in triggering an action on the server, but does not need to receive a response. They can be used to send events or updates to the server without requiring a response, allowing for more efficient communication between client and server.
