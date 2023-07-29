---
title: Notification Requests
description: A Notification is a request object without an `id` member. 
extends: _layouts.documentation
section: content
---


## Using Notifications

Notifications are a special type of request object that does not expect a response from the server. They are useful when the client wants to send events or updates to the server without waiting for a response. By omitting the `id` member in the request object, the client indicates that it does not require a response for this specific request.

### Trying out a Notification

To try out a Notification, you can use the following `curl` command:

```bash
curl --location --request POST 'http://127.0.0.1:8000/api/v1/endpoint' \
--header 'Content-Type: application/json' \
--data-raw '{
    "jsonrpc": "2.0",
    "method": "tennis@ping",
    "id": 1
}'
```

Executing this command will result in an empty JSON object as the response:

```bash
{}
```

### Benefits of Notifications

Using Notifications can optimize your web application's performance by reducing unnecessary server responses. Since Notifications do not require a response, they enable more efficient communication between the client and server. By clearly indicating that the client is not interested in receiving a response, the communication becomes faster and lighter, contributing to better overall performance.
