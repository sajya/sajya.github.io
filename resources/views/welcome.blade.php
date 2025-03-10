@extends('_layouts.master')

@section('body')

    <div class="p-2 bg-body-tertiary2 footer-secondary">
        <div class="container">
            <ul class="nav col-12 ms-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-3 text-secondary">Home</a></li>
                <li><a href="/docs" class="nav-link px-3 text-secondary">Docs</a></li>
                <li><a href="https://github.com/sajya" class="nav-link px-3 text-secondary">GitHub</a></li>
            </ul>
        </div>
    </div>

    <div class="bg-gray">
        <div class="container">

            <div class="d-md-flex flex-md-equal w-100">
                <div class="bg-body-tertiary2 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden w-100">
                    <div class="my-3 p-3">
                        <h1 class="display-5 mb-4">
                            <span class="text-primary">{</span> JSON-RPC <span class="text-primary">}</span>
                            <small class="d-block mt-1">The simplest way to create APIs</small>
                        </h1>

                        <p class="lead text-muted">Because the protocol was originally designed to be simple and easy to use!</p>
                    </div>
                    <div class="bg-body shadow-sm mx-auto p-3"
                         style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                        <div class="terminal text-start px-3">
                            <div class="console-2">
                            @php
                                echo \Str::of('
```json
{"jsonrpc": "2.0", "method": "subtract", "params": [42, 23], "id": 1}
{"jsonrpc": "2.0", "result": 19, "id": 1}

{"jsonrpc": "2.0", "method": "subtract", "params": [23, 42], "id": 2}
{"jsonrpc": "2.0", "result": -19, "id": 2}

{"jsonrpc": "2.0", "method": "subtract", "params": {"subtrahend": 23, "minuend": 42}, "id": 3}
{"jsonrpc": "2.0", "result": 19, "id": 3}

{"jsonrpc": "2.0", "method": "subtract", "params": {"minuend": 42, "subtrahend": 23}, "id": 4}
{"jsonrpc": "2.0", "result": 19, "id": 4}

{"jsonrpc": "2.0", "method": "foobar", "id": 10}
{"jsonrpc": "2.0", "error": {"code": -32601, "message": "Procedure not found."}, "id": 10}

{"jsonrpc": "2.0", "method": "foobar", "params": "bar", "baz"}
{"jsonrpc": "2.0", "error": {"code": -32700, "message": "Parse error"}, "id": null}

{"jsonrpc": "2.0", "method": 1, "params": "bar"}
{"jsonrpc": "2.0", "error": {"code": -32600, "message": "Invalid JSON-RPC."}, "id": null}
```
                                ')->trim()->markdown(extensions: [new \Laravelsu\Highlight\CommonMark\HighlightExtension()])
                            @endphp
                            </div>

                            <div class="console-2 duplicate">
                                @php
                                    echo \Str::of('
```json
{"jsonrpc": "2.0", "method": "subtract", "params": [42, 23], "id": 1}
{"jsonrpc": "2.0", "result": 19, "id": 1}

{"jsonrpc": "2.0", "method": "subtract", "params": [23, 42], "id": 2}
{"jsonrpc": "2.0", "result": -19, "id": 2}

{"jsonrpc": "2.0", "method": "subtract", "params": {"subtrahend": 23, "minuend": 42}, "id": 3}
{"jsonrpc": "2.0", "result": 19, "id": 3}

{"jsonrpc": "2.0", "method": "subtract", "params": {"minuend": 42, "subtrahend": 23}, "id": 4}
{"jsonrpc": "2.0", "result": 19, "id": 4}

{"jsonrpc": "2.0", "method": "foobar", "id": 10}
{"jsonrpc": "2.0", "error": {"code": -32601, "message": "Procedure not found."}, "id": 10}

{"jsonrpc": "2.0", "method": "foobar", "params": "bar", "baz"}
{"jsonrpc": "2.0", "error": {"code": -32700, "message": "Parse error"}, "id": null}

{"jsonrpc": "2.0", "method": 1, "params": "bar"}
{"jsonrpc": "2.0", "error": {"code": -32600, "message": "Invalid JSON-RPC."}, "id": null}
```
                                    ')->trim()->markdown(extensions: [new \Laravelsu\Highlight\CommonMark\HighlightExtension()])
                                @endphp
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




{{--
    <div class="container">
        <div class="px-4 py-md-5 my-5 text-center">
            <div class="col-lg-12 mx-auto text-start">

                <div class="row row-cols-1 row-cols-md-2 align-items-md-start g-5 py-5">
                    <div class="col d-flex flex-column align-items-start gap-2">


                        <div class="position-relative p-5 text-start text-muted bg-body border border-dashed rounded-5" style="border-style: dashed;">

                            <div
                                class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                     class="bi bi-book" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm.25-14.75v1.5a.25.25 0 0 1-.5 0v-1.5a.25.25 0 0 1 .5 0Zm0 12v1.5a.25.25 0 1 1-.5 0v-1.5a.25.25 0 1 1 .5 0ZM4.5 1.938a.25.25 0 0 1 .342.091l.75 1.3a.25.25 0 0 1-.434.25l-.75-1.3a.25.25 0 0 1 .092-.341Zm6 10.392a.25.25 0 0 1 .341.092l.75 1.299a.25.25 0 1 1-.432.25l-.75-1.3a.25.25 0 0 1 .091-.34ZM2.28 4.408l1.298.75a.25.25 0 0 1-.25.434l-1.299-.75a.25.25 0 0 1 .25-.434Zm10.392 6 1.299.75a.25.25 0 1 1-.25.434l-1.3-.75a.25.25 0 0 1 .25-.434ZM1 8a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 0 .5h-1.5A.25.25 0 0 1 1 8Zm12 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 1 1 0 .5h-1.5A.25.25 0 0 1 13 8ZM2.03 11.159l1.298-.75a.25.25 0 0 1 .25.432l-1.299.75a.25.25 0 0 1-.25-.432Zm10.392-6 1.299-.75a.25.25 0 1 1 .25.433l-1.3.75a.25.25 0 0 1-.25-.434ZM4.5 14.061a.25.25 0 0 1-.092-.341l.75-1.3a.25.25 0 0 1 .434.25l-.75 1.3a.25.25 0 0 1-.342.091Zm6-10.392a.25.25 0 0 1-.091-.342l.75-1.299a.25.25 0 1 1 .432.25l-.75 1.3a.25.25 0 0 1-.341.09ZM6.494 1.415l.13.483a.25.25 0 1 1-.483.13l-.13-.483a.25.25 0 0 1 .483-.13ZM9.86 13.972l.13.483a.25.25 0 1 1-.483.13l-.13-.483a.25.25 0 0 1 .483-.13ZM3.05 3.05a.25.25 0 0 1 .354 0l.353.354a.25.25 0 0 1-.353.353l-.354-.353a.25.25 0 0 1 0-.354Zm9.193 9.193a.25.25 0 0 1 .353 0l.354.353a.25.25 0 1 1-.354.354l-.353-.354a.25.25 0 0 1 0-.353ZM1.545 6.01l.483.13a.25.25 0 1 1-.13.483l-.483-.13a.25.25 0 1 1 .13-.482Zm12.557 3.365.483.13a.25.25 0 1 1-.13.483l-.483-.13a.25.25 0 1 1 .13-.483Zm-12.863.436a.25.25 0 0 1 .176-.306l.483-.13a.25.25 0 1 1 .13.483l-.483.13a.25.25 0 0 1-.306-.177Zm12.557-3.365a.25.25 0 0 1 .176-.306l.483-.13a.25.25 0 1 1 .13.483l-.483.13a.25.25 0 0 1-.306-.177ZM3.045 12.944a.299.299 0 0 1-.029-.376l3.898-5.592a.25.25 0 0 1 .062-.062l5.602-3.884a.278.278 0 0 1 .392.392L9.086 9.024a.25.25 0 0 1-.062.062l-5.592 3.898a.299.299 0 0 1-.382-.034l-.005-.006Zm3.143 1.817a.25.25 0 0 1-.176-.306l.129-.483a.25.25 0 0 1 .483.13l-.13.483a.25.25 0 0 1-.306.176ZM9.553 2.204a.25.25 0 0 1-.177-.306l.13-.483a.25.25 0 1 1 .483.13l-.13.483a.25.25 0 0 1-.306.176Z"/>
                                </svg>
                            </div>

                            <h1 class="text-body-emphasis">Sajya</h1>
                            <p class="mb-4">
                                Sajya is an open-source project that makes it easy to implement the JSON-RPC 2.0 server specification for Laravel. With Sajya, you can quickly and easily set up a JSON-RPC server that supports all of the features of the JSON-RPC 2.0 specification, including validation of parameters, support for batch and notification requests, and more.
                            </p>
                            <button class="btn btn-primary px-5 mb-5" type="button">
                                Read The Docs
                            </button>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row row-cols-1 row-cols-sm-2 g-4">

                            <div class="col d-flex flex-column gap-2">
                                <div class="feature col mb-5 mb-md-0">

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="fw-semibold ms-3">Validation</h4>
                                    </div>
                                    <p>
                                        Automatically validates incoming requests to ensure they meet your specifications. You can also customize the error messages that are returned if the validation fails.
                                    </p>
                                    <a href="#" class="icon-link d-flex align-items-center text-body-secondary">
                                        <span>Read The Docs</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                             fill="currentColor" class="bi bi-arrow-right-short ms-1"
                                             viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="col d-flex flex-column gap-2">
                                <div class="feature col mb-5 mb-md-0">

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="fw-semibold ms-3">Validation</h4>
                                    </div>
                                    <p>
                                        Automatically validates incoming requests to ensure they meet your specifications. You can also customize the error messages that are returned if the validation fails.
                                    </p>
                                    <a href="#" class="icon-link d-flex align-items-center text-body-secondary">
                                        <span>Read The Docs</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                             fill="currentColor" class="bi bi-arrow-right-short ms-1"
                                             viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="col d-flex flex-column gap-2">
                                <div class="feature col mb-5 mb-md-0">

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="fw-semibold ms-3">Validation</h4>
                                    </div>
                                    <p>
                                        Automatically validates incoming requests to ensure they meet your specifications. You can also customize the error messages that are returned if the validation fails.
                                    </p>
                                    <a href="#" class="icon-link d-flex align-items-center text-body-secondary">
                                        <span>Read The Docs</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                             fill="currentColor" class="bi bi-arrow-right-short ms-1"
                                             viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="col d-flex flex-column gap-2">
                                <div class="feature col mb-5 mb-md-0">

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="fw-semibold ms-3">Validation</h4>
                                    </div>
                                    <p>
                                        Automatically validates incoming requests to ensure they meet your specifications. You can also customize the error messages that are returned if the validation fails.
                                    </p>
                                    <a href="#" class="icon-link d-flex align-items-center text-body-secondary">
                                        <span>Read The Docs</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                             fill="currentColor" class="bi bi-arrow-right-short ms-1"
                                             viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="col d-flex flex-column gap-2">
                                <div class="feature col mb-5 mb-md-0">

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="fw-semibold ms-3">Validation</h4>
                                    </div>
                                    <p>
                                        Automatically validates incoming requests to ensure they meet your specifications. You can also customize the error messages that are returned if the validation fails.
                                    </p>
                                    <a href="#" class="icon-link d-flex align-items-center text-body-secondary">
                                        <span>Read The Docs</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                             fill="currentColor" class="bi bi-arrow-right-short ms-1"
                                             viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="col d-flex flex-column gap-2">
                                <div class="feature col mb-5 mb-md-0">

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="fw-semibold ms-3">Validation</h4>
                                    </div>
                                    <p>
                                        Automatically validates incoming requests to ensure they meet your specifications. You can also customize the error messages that are returned if the validation fails.
                                    </p>
                                    <a href="#" class="icon-link d-flex align-items-center text-body-secondary">
                                        <span>Read The Docs</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                             fill="currentColor" class="bi bi-arrow-right-short ms-1"
                                             viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
--}}




    <div class="container">
        <div class="px-4 py-5 text-center">
            <div class="col-lg-8 mx-auto text-start">

                <p class="lead mb-5"><strong class="text-dark">Sajya</strong> is the <span title="By the number of installations with Composer according to packagist.org">most popular</span> open-source package for Laravel that makes it easy to implement the JSON-RPC 2.0 server specification including validation of parameters, support for batch and notification requests, and more.</p>


                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="/docs/" class="btn btn-primary btn-lg px-4 gap-3">Read The Docs</a>
                    <a href="https://github.com/sajya" target="_blank" class="btn btn-outline-secondary btn-lg px-4">Source Code</a>
                </div>

                {{--
                <p class="mb-4 text-muted">Features:</p>

                <ul>
                    <li class="mb-3"><strong>Easy to use:</strong> Sajya is designed to be simple to install and use, so you can get your server up and running quickly.</li>
                    <li class="mb-3"><strong>Customizable:</strong> Customize many aspects of your server, including the routes, parameter validation, and error messages.</li>
                    <li class="mb-3"><strong>Well-documented:</strong> Comes with complete documentation that includes detailed instructions and a reference guide for all of its features.</li>
                    <li class="mb-3"><strong>Model Binding:</strong> Quickly and easily define parameters binding for your models.</li>
                    <li class="mb-3"><strong>Validation:</strong> Automatically validates incoming requests to ensure they meet your specifications. You can also customize the error messages that are returned if the validation fails.</li>
                    <li class=""><strong>Batch & Notification:</strong> Supports both batch requests, where multiple requests are combined into a single HTTP request, and notification requests, where the server does not generate a response.</li>
                </ul>
                --}}


            </div>
        </div>
    </div>


    <div class="container">
        <div class="px-4 py-md-5 my-5">
        <div class="col-lg-9 mx-auto text-start">
            <section class="row g-md-5 mb-4">
            <div class="col-lg-5">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                         class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M9.752 6.193c.599.6 1.73.437 2.528-.362.798-.799.96-1.932.362-2.531-.599-.6-1.73-.438-2.528.361-.798.8-.96 1.933-.362 2.532Z"/>
                        <path d="M15.811 3.312c-.363 1.534-1.334 3.626-3.64 6.218l-.24 2.408a2.56 2.56 0 0 1-.732 1.526L8.817 15.85a.51.51 0 0 1-.867-.434l.27-1.899c.04-.28-.013-.593-.131-.956a9.42 9.42 0 0 0-.249-.657l-.082-.202c-.815-.197-1.578-.662-2.191-1.277-.614-.615-1.079-1.379-1.275-2.195l-.203-.083a9.556 9.556 0 0 0-.655-.248c-.363-.119-.675-.172-.955-.132l-1.896.27A.51.51 0 0 1 .15 7.17l2.382-2.386c.41-.41.947-.67 1.524-.734h.006l2.4-.238C9.005 1.55 11.087.582 12.623.208c.89-.217 1.59-.232 2.08-.188.244.023.435.06.57.093.067.017.12.033.16.045.184.06.279.13.351.295l.029.073a3.475 3.475 0 0 1 .157.721c.055.485.051 1.178-.159 2.065Zm-4.828 7.475.04-.04-.107 1.081a1.536 1.536 0 0 1-.44.913l-1.298 1.3.054-.38c.072-.506-.034-.993-.172-1.418a8.548 8.548 0 0 0-.164-.45c.738-.065 1.462-.38 2.087-1.006ZM5.205 5c-.625.626-.94 1.351-1.004 2.09a8.497 8.497 0 0 0-.45-.164c-.424-.138-.91-.244-1.416-.172l-.38.054 1.3-1.3c.245-.246.566-.401.91-.44l1.08-.107-.04.039Zm9.406-3.961c-.38-.034-.967-.027-1.746.163-1.558.38-3.917 1.496-6.937 4.521-.62.62-.799 1.34-.687 2.051.107.676.483 1.362 1.048 1.928.564.565 1.25.941 1.924 1.049.71.112 1.429-.067 2.048-.688 3.079-3.083 4.192-5.444 4.556-6.987.183-.771.18-1.345.138-1.713a2.835 2.835 0 0 0-.045-.283 3.078 3.078 0 0 0-.3-.041Z"/>
                        <path d="M7.009 12.139a7.632 7.632 0 0 1-1.804-1.352A7.568 7.568 0 0 1 3.794 8.86c-1.102.992-1.965 5.054-1.839 5.18.125.126 3.936-.896 5.054-1.902Z"/>
                     </svg>
                </div>

                <h3 class="display-5 mb-3">Easy to use</h3>
                <p class="fw-normal text-balance">
                    Request and response format is unified and easy to use, allowing even beginners to work.
                    Use any transport you prefer, including <code>HTTP</code>, <code>WebSocket</code>, <code>Server Sent Events</code>, or others.
                </p>

                <p class="fw-normal small text-muted">Learn more about <a href="/docs/specification">Specification</a>.</p>

                {{--
                <p class="fw-normal">
                    With JSON-RPC, forget about disputes in your team about the right way to create requests and process responses. This guarantees fast implementation and maximum performance for your project.
                </p>
                --}}


            </div>
            <div class="col-lg-7 main">
                <small class="opacity-75 user-select-none d-block">--> Request</small>
                @php
                    echo \Str::of('
```json
{
    "jsonrpc": "2.0",
    "method": "subtract",
    "params": {
      "subtrahend": 23,
      "minuend": 42
    },
    "id": 3
}
```
                    ')->trim()->markdown(extensions: [new \Laravelsu\Highlight\CommonMark\HighlightExtension()])
                @endphp

                <small class="opacity-75 user-select-none d-block"><-- Response</small>

                @php
                    echo \Str::of('
```json
{
    "jsonrpc": "2.0",
    "result": 19,
    "id": 3
}
```
                    ')->trim()->markdown(extensions: [new \Laravelsu\Highlight\CommonMark\HighlightExtension()])
                @endphp
            </div>
        </section>



            <section class="row g-3 g-md-5 justify-content-center">
                <div class="col-lg-6 py-lg-4">
                    <div class="d-flex align-items-center">
                    <div
                        class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                             class="bi bi-book" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                        </svg>
                    </div>
                    <h3 class="fw-normal ms-3">Batch</h3>
                    </div>
                    <p class="pe-lg-5 fw-normal text-balance">
                        Ability to send several requests in one API call. This helps reduce network costs and speed up your application.
                    </p>
                    <p class="fw-normal small text-muted">Learn more about <a href="/docs/batch">batch requests</a>.</p>
                </div>
                <div class="col-lg-6 py-lg-4 border-lg-start">
                    <div class="d-flex align-items-center">
                    <div
                        class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                             class="bi bi-book" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                        </svg>
                    </div>
                    <h3 class="fw-normal ms-3">Notification</h3>
                    </div>
                    <p class="pe-lg-5 fw-normal text-balance">
                        Send requests that do not need to be answered. Customers won't have to wait for the request to actually be fulfilled.
                    </p>
                    <p class="fw-normal small text-muted">Learn more about <a href="/docs/notifications">notifications requests</a>.</p>
                </div>


            </section>
        </div>
        </div>
    </div>



    <div class="container">
        <div class="px-4 py-md-5 my-5">
            <div class="col-lg-9 mx-auto text-start">
                <div class="position-relative p-5 rounded-5 bg-gray">

                        <h5 class="text-center mb-5">Agnostic of the client-side technology.</h5>

                        <div class="row row-cols-1 row-cols-lg-3">
                            <div class="feature col mb-3 mb-lg-0">

                                <div class="d-flex align-items-center mb-3">
                                    <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm.25-14.75v1.5a.25.25 0 0 1-.5 0v-1.5a.25.25 0 0 1 .5 0Zm0 12v1.5a.25.25 0 1 1-.5 0v-1.5a.25.25 0 1 1 .5 0ZM4.5 1.938a.25.25 0 0 1 .342.091l.75 1.3a.25.25 0 0 1-.434.25l-.75-1.3a.25.25 0 0 1 .092-.341Zm6 10.392a.25.25 0 0 1 .341.092l.75 1.299a.25.25 0 1 1-.432.25l-.75-1.3a.25.25 0 0 1 .091-.34ZM2.28 4.408l1.298.75a.25.25 0 0 1-.25.434l-1.299-.75a.25.25 0 0 1 .25-.434Zm10.392 6 1.299.75a.25.25 0 1 1-.25.434l-1.3-.75a.25.25 0 0 1 .25-.434ZM1 8a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 0 .5h-1.5A.25.25 0 0 1 1 8Zm12 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 1 1 0 .5h-1.5A.25.25 0 0 1 13 8ZM2.03 11.159l1.298-.75a.25.25 0 0 1 .25.432l-1.299.75a.25.25 0 0 1-.25-.432Zm10.392-6 1.299-.75a.25.25 0 1 1 .25.433l-1.3.75a.25.25 0 0 1-.25-.434ZM4.5 14.061a.25.25 0 0 1-.092-.341l.75-1.3a.25.25 0 0 1 .434.25l-.75 1.3a.25.25 0 0 1-.342.091Zm6-10.392a.25.25 0 0 1-.091-.342l.75-1.299a.25.25 0 1 1 .432.25l-.75 1.3a.25.25 0 0 1-.341.09ZM6.494 1.415l.13.483a.25.25 0 1 1-.483.13l-.13-.483a.25.25 0 0 1 .483-.13ZM9.86 13.972l.13.483a.25.25 0 1 1-.483.13l-.13-.483a.25.25 0 0 1 .483-.13ZM3.05 3.05a.25.25 0 0 1 .354 0l.353.354a.25.25 0 0 1-.353.353l-.354-.353a.25.25 0 0 1 0-.354Zm9.193 9.193a.25.25 0 0 1 .353 0l.354.353a.25.25 0 1 1-.354.354l-.353-.354a.25.25 0 0 1 0-.353ZM1.545 6.01l.483.13a.25.25 0 1 1-.13.483l-.483-.13a.25.25 0 1 1 .13-.482Zm12.557 3.365.483.13a.25.25 0 1 1-.13.483l-.483-.13a.25.25 0 1 1 .13-.483Zm-12.863.436a.25.25 0 0 1 .176-.306l.483-.13a.25.25 0 1 1 .13.483l-.483.13a.25.25 0 0 1-.306-.177Zm12.557-3.365a.25.25 0 0 1 .176-.306l.483-.13a.25.25 0 1 1 .13.483l-.483.13a.25.25 0 0 1-.306-.177ZM3.045 12.944a.299.299 0 0 1-.029-.376l3.898-5.592a.25.25 0 0 1 .062-.062l5.602-3.884a.278.278 0 0 1 .392.392L9.086 9.024a.25.25 0 0 1-.062.062l-5.592 3.898a.299.299 0 0 1-.382-.034l-.005-.006Zm3.143 1.817a.25.25 0 0 1-.176-.306l.129-.483a.25.25 0 0 1 .483.13l-.13.483a.25.25 0 0 1-.306.176ZM9.553 2.204a.25.25 0 0 1-.177-.306l.13-.483a.25.25 0 1 1 .483.13l-.13.483a.25.25 0 0 1-.306.176Z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="fw-normal ms-3 mb-0">Web</h3>
                                </div>
                                <p class="mb-lg-0 text-balance">
                                    Build the API to your React, Vue.js and Angular web apps.
                                </p>
                            </div>
                            <div class="feature col mb-3 mb-lg-0">

                                <div class="d-flex align-items-center mb-3">
                                    <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"></path>
                                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="fw-normal ms-3 mb-0">Mobile</h3>
                                </div>
                                <p class="mb-lg-0 text-balance">
                                    Communication from your native Android and iOS apps.
                                </p>
                            </div>
                            <div class="feature col">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 rounded-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                            <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="fw-normal ms-3 mb-0">IoT</h3>
                                </div>
                                <p class="mb-lg-0 text-balance">Something electronic on Rust, Go, C, Java? No problem at all. </p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="px-4 py-md-5 my-5">
            <div class="col-lg-9 mx-auto text-start">
                <section class="row g-md-5 mb-4">
                    <div class="col-lg-7 main order-last order-md-first">
                        <p class="text-muted small text-center mb-1"></p>
                        @php
                        echo \Str::of('
```php
namespace App\Http\Procedures;

use App\Models\User;
use Sajya\Server\Procedure;

class UserProcedure extends Procedure
{
    public function update(User $user)
    {
        // ...
    }
}
```
                        ')->trim()->markdown(extensions: [new \Laravelsu\Highlight\CommonMark\HighlightExtension()])
                        @endphp
                    </div>
                    <div class="col-lg-5 order-first order-md-last">
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                 class="bi bi-book" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
                            </svg>
                        </div>

                        <h3 class="display-5 mb-3">Binding</h3>
                        <p class="fw-normal text-balance">
                            Bind values of query parameters to various objects such as <code>Eloquent</code> models, <code>Enums</code> and others, which allows you to work with data in your project quickly and conveniently.
                        </p>

                        <p class="fw-normal small text-muted">Learn more about <a href="/docs/binding">Binding</a>.</p>
                    </div>
                </section>
                <section class="row g-3 g-md-5 justify-content-center">
                    <div class="col-lg-6 py-lg-4">
                        <div class="d-flex align-items-center">
                            <div
                                class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                     class="bi bi-book" viewBox="0 0 16 16">
                                    <path d="M12 3H4a1 1 0 0 0-1 1v2.5H2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2.5h-1V4a1 1 0 0 0-1-1zM2 9.5h1V12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V9.5h1V12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.5zm-1.5-2a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z"/>
                                </svg>
                            </div>
                            <h3 class="fw-normal ms-3">Validation</h3>
                        </div>
                        <p class="pe-lg-5 text-balance">
                            Automatically validates incoming requests to ensure they meet your specifications. You can also customize the error messages that are returned if the validation fails.
                        </p>
                        <p class="fw-normal small text-muted">Learn more about <a href="/docs/requests">request validation</a>.</p>

                    </div>
                    <div class="col-lg-6 py-lg-4 border-lg-start">
                        <div class="d-flex align-items-center">
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                 class="bi bi-book" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                             </svg>
                        </div>
                        <h3 class="fw-normal ms-3">Tests</h3>
                        </div>
                        <p class="pe-lg-5 text-balance">
                            Add tests with ease using our developer friendly API testing tool.
                        </p>

                        <p class="fw-normal small text-muted">Learn more about <a href="/docs/testing">testing</a>.</p>
                    </div>
                </section>
            </div>
        </div>
    </div>




    <div class="bg-gray">
        <div class="py-5 bg-body-tertiary2 footer-secondary">
            <div class="container">
                <div class="py-md-3 px-4">
                    <div class="row g-4 py-md-5 py-3 row-cols-1 row-cols-lg-3">
                        <div class="feature col mb-5 mb-md-0">

                            <div class="d-flex align-items-center">
                                <div
                                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                         class="bi bi-book" viewBox="0 0 16 16">
                                        <path
                                            d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                    </svg>
                                </div>
                                <h3 class="fs-2 fw-normal ms-3">Handbook</h3>
                            </div>
                            <p class="text-balance">
                                Documentation and examples for a quick and successful implementation.
                            </p>
                            <a href="/docs" class="icon-link d-flex align-items-center text-body-secondary">
                                <span>Read The Docs</span>

                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                     class="bi bi-arrow-right-short ms-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </a>
                        </div>

                        <div class="feature col">
                           <div class="d-flex align-items-center">
                              <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" role="img" width="1em" height="1en" viewBox="0 0 100 100">
                                    <path d="M86.55 30.73c-11.33 10.72-27.5 12.65-42.3 14.43-10.94 1.5-23.3 3.78-30.48 13.04-6.2 8.3-4.25 20.3 2.25 27.8 1.35 2.03 5.7 5.7 6.38 5.3-5.96-8.42-5.88-21.6 2.6-28.4 8.97-7.52 21.2-7.1 32.03-9.7 6.47-1.23 13.3-3.5 19.2-5.34-8.3 7.44-19.38 10.36-29.7 13.75-8.7 3.08-17.22 10.23-17.45 20.1-.17 6.8 3.1 14.9 10.06 17.07 18.56 4.34 39.14-3.16 50.56-18.4 12.7-16.12 13.75-40.2 2.43-57.33-1.33 2.9-3.28 5.5-5.58 7.7z"></path>
                                    <path d="M0 49.97c-.14 4.35 1.24 13.9 2.63 14.64 1.2-11.48 10.2-20.74 20.83-24.47 17.9-7.06 38.75-3.1 55.66-13.18 5.16-2.3 9.28-9.48 4.36-14.1-2.16-1.76-5.9-5.75-3.7-.72.83 6.22-5.47 10.06-10.63 11.65-10.9 3.34-22.46 3-33.62 4.93-1.9.32-5.9 1.2-2.07-.6 10.52-5.02 23.57-4.38 32.6-12.5 4.8-3.75 2.77-11.16-2.4-13.4C57.4-.35 50.3-.35 43.63.35c-19.85 2.3-37.3 17.7-42.05 37.1C.52 41.57 0 45.77 0 49.97z"></path>
                                 </svg>
                              </div>
                              <h3 class="fs-2 fw-normal ms-3">UI Mastery</h3>
                           </div>
                           <p class="text-balance">Harness Orchid, the user-friendly Laravel admin panel, to control your APIs effortlessly.</p>
                           <a href="https://orchid.software/" class="icon-link d-flex align-items-center text-body-secondary" target="_blank">
                              <span>Get Orchid</span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-arrow-right-short ms-1" viewBox="0 0 16 16">
                                 <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                              </svg>
                           </a>
                        </div>

                        <div class="feature col">
                            <div class="d-flex align-items-center">
                                <div
                                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                         class="bi bi-github" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                    </svg>
                                </div>
                                <h3 class="fs-2 fw-normal ms-3">Source</h3>
                            </div>
                            <p class="text-balance">Head over to GitHub for code, bug reports, and pull requests.</p>
                            <a href="https://github.com/sajya"
                               class="icon-link d-flex align-items-center text-body-secondary" target="_blank">
                                <span>Source Code</span>

                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                     class="bi bi-arrow-right-short ms-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-gray">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-4 px-4">
                <p class="col-md-4 mb-0 text-body-secondary">
                    <small class="text-muted">Package and documentation licensed <a href="https://github.com/sajya/server/blob/master/LICENSE.md" class="text-body-secondary">MIT</a>.</small>
                </p>

                <ul class="nav col-md-4 justify-content-end d-none d-md-flex">
                    <li class="nav-item"><a href="https://www.jsonrpc.org/specification" class="nav-link px-2 text-body-secondary" target="_blank">Specification</a></li>
                    <li class="nav-item"><a href="http://www.json.org" class="nav-link px-2 text-body-secondary" target="_blank"> What is JSON?</a></li>
                    <li class="nav-item"><a href="http://en.wikipedia.org/wiki/Remote_procedure_call" class="nav-link px-2 text-body-secondary" target="_blank"> What is RPC?</a></li>
                </ul>
            </footer>
        </div>
    </div>

{{--
    <div class="bg-gray">
        <div class="py-5 bg-body-tertiary2 footer-secondary">
            <div class="container py-md-3 px-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 mx-auto lead">
                        <div class="d-flex mb-3 w-100 align-items-center">
                            <img class="d-block me-3" src="https://sajya.github.io/assets/img/logo.svg" alt="" height="57">
                            <p class="display-6 text-body-emphasis mb-0">Sajya</p>
                        </div>

                        <p class="small">
                            Made with ❤️ by the Sajya Contributors.
                        </p>
                    </div>
                    <div class="col-lg-6 mx-auto lead">
                        <p class="mb-1">Sajya is a free and open-source project. <a href="#" class="text-body-secondary">Learn here</a> how to get involved.</p>
                        <p class="small">
                            Every component and piece of software is free and open source.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    --}}
@endsection
