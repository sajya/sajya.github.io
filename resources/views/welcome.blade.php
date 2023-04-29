@extends('_layouts.master')

@section('body')

    <div class="bg-gray">
        <div class="container">

            <div class="d-md-flex flex-md-equal w-100">
                <div class="bg-body-tertiary2 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden w-100">
                    <div class="my-3 p-3">
                        <h1 class="display-5 mb-4">
                            <span class="text-primary">{</span> JSON-RPC <span class="text-primary">}</span>
                            <small class="d-block">The simplest way to create API</small>
                        </h1>


                        <p class="lead text-muted">A remote procedure call protocol that is designed to be simple and easy to use!</p>
                    </div>
                    <div class="bg-body shadow-sm mx-auto p-3"
                         style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                        <div class="terminal text-start px-3">
                            <pre>
                            <code class="language-json" id="console"></code>
                            </pre>
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

                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 p-3 rounded-4">
                                <img class="d-block" src="https://sajya.github.io/assets/img/logo.svg" alt="" height="50">
                            </div>
                            <h2 class="display-6 text-body-emphasis mb-0 ms-3">Sajya</h2>
                        </div>

                        <p class="lead mb-4">Sajya is an open-source project that makes it easy to implement the JSON-RPC 2.0 server specification for Laravel. With Sajya, you can quickly and easily set up a JSON-RPC server that supports all of the features of the JSON-RPC 2.0 specification, including validation of parameters, support for batch and notification requests, and more.</p>

                        <a href="#" class="btn btn-primary btn-lg">Read The Docs</a>
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
        <div class="px-4 py-md-5 my-5 text-center">
            <div class="col-lg-8 mx-auto text-start">

                <!--
                <div class="d-flex mb-5 w-100 align-items-center">
                    <img class="d-block ms-auto me-3" src="https://sajya.github.io/assets/img/logo.svg" alt="" height="57">
                    <h1 class="display-5 text-body-emphasis me-auto mb-0">Sajya</h1>
                </div>
                -->

                <p class="lead mb-4">Sajya is an open-source project that makes it easy to implement the JSON-RPC 2.0 server specification for Laravel. With Sajya, you can quickly and easily set up a JSON-RPC server that supports all of the features of the JSON-RPC 2.0 specification, including validation of parameters, support for batch and notification requests, and more.</p>

                <p class="mb-4 text-muted">Features:</p>

                <ul>
                    <li class="mb-3"><strong>Easy to use:</strong> Sajya is designed to be simple to install and use, so you can get your server up and running quickly.</li>
                    <li class="mb-3"><strong>Customizable:</strong> Customize many aspects of your server, including the routes, parameter validation, and error messages.</li>
                    <li class="mb-3"><strong>Well-documented:</strong> Comes with complete documentation that includes detailed instructions and a reference guide for all of its features.</li>
                    <li class="mb-3"><strong>Model Binding:</strong> Quickly and easily define parameters binding for your models.</li>
                    <li class="mb-3"><strong>Validation:</strong> Automatically validates incoming requests to ensure they meet your specifications. You can also customize the error messages that are returned if the validation fails.</li>
                    <li class=""><strong>Batch & Notification:</strong> Supports both batch requests, where multiple requests are combined into a single HTTP request, and notification requests, where the server does not generate a response.</li>
                </ul>


            </div>
        </div>
    </div>


    <div class="container">
        <div class="px-4 py-md-5 my-5 text-center">
            <div class="col-lg-8 mx-auto text-start">
                <div class="pt-2" id="featured-3">

                    <div class="row">
                        <div class="col-md-8 col-12">
                            <h5 class="fw-bold">
                                Agnostic of the client-side technology.
                            </h5>
                        </div>
                    </div>

                    <div class="row g-4 py-md-5 py-3 row-cols-1 row-cols-lg-3">
                        <div class="feature col">

                            <div class="d-flex align-items-center">
                                <div
                                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                         class="bi bi-book" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm.25-14.75v1.5a.25.25 0 0 1-.5 0v-1.5a.25.25 0 0 1 .5 0Zm0 12v1.5a.25.25 0 1 1-.5 0v-1.5a.25.25 0 1 1 .5 0ZM4.5 1.938a.25.25 0 0 1 .342.091l.75 1.3a.25.25 0 0 1-.434.25l-.75-1.3a.25.25 0 0 1 .092-.341Zm6 10.392a.25.25 0 0 1 .341.092l.75 1.299a.25.25 0 1 1-.432.25l-.75-1.3a.25.25 0 0 1 .091-.34ZM2.28 4.408l1.298.75a.25.25 0 0 1-.25.434l-1.299-.75a.25.25 0 0 1 .25-.434Zm10.392 6 1.299.75a.25.25 0 1 1-.25.434l-1.3-.75a.25.25 0 0 1 .25-.434ZM1 8a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 0 .5h-1.5A.25.25 0 0 1 1 8Zm12 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 1 1 0 .5h-1.5A.25.25 0 0 1 13 8ZM2.03 11.159l1.298-.75a.25.25 0 0 1 .25.432l-1.299.75a.25.25 0 0 1-.25-.432Zm10.392-6 1.299-.75a.25.25 0 1 1 .25.433l-1.3.75a.25.25 0 0 1-.25-.434ZM4.5 14.061a.25.25 0 0 1-.092-.341l.75-1.3a.25.25 0 0 1 .434.25l-.75 1.3a.25.25 0 0 1-.342.091Zm6-10.392a.25.25 0 0 1-.091-.342l.75-1.299a.25.25 0 1 1 .432.25l-.75 1.3a.25.25 0 0 1-.341.09ZM6.494 1.415l.13.483a.25.25 0 1 1-.483.13l-.13-.483a.25.25 0 0 1 .483-.13ZM9.86 13.972l.13.483a.25.25 0 1 1-.483.13l-.13-.483a.25.25 0 0 1 .483-.13ZM3.05 3.05a.25.25 0 0 1 .354 0l.353.354a.25.25 0 0 1-.353.353l-.354-.353a.25.25 0 0 1 0-.354Zm9.193 9.193a.25.25 0 0 1 .353 0l.354.353a.25.25 0 1 1-.354.354l-.353-.354a.25.25 0 0 1 0-.353ZM1.545 6.01l.483.13a.25.25 0 1 1-.13.483l-.483-.13a.25.25 0 1 1 .13-.482Zm12.557 3.365.483.13a.25.25 0 1 1-.13.483l-.483-.13a.25.25 0 1 1 .13-.483Zm-12.863.436a.25.25 0 0 1 .176-.306l.483-.13a.25.25 0 1 1 .13.483l-.483.13a.25.25 0 0 1-.306-.177Zm12.557-3.365a.25.25 0 0 1 .176-.306l.483-.13a.25.25 0 1 1 .13.483l-.483.13a.25.25 0 0 1-.306-.177ZM3.045 12.944a.299.299 0 0 1-.029-.376l3.898-5.592a.25.25 0 0 1 .062-.062l5.602-3.884a.278.278 0 0 1 .392.392L9.086 9.024a.25.25 0 0 1-.062.062l-5.592 3.898a.299.299 0 0 1-.382-.034l-.005-.006Zm3.143 1.817a.25.25 0 0 1-.176-.306l.129-.483a.25.25 0 0 1 .483.13l-.13.483a.25.25 0 0 1-.306.176ZM9.553 2.204a.25.25 0 0 1-.177-.306l.13-.483a.25.25 0 1 1 .483.13l-.13.483a.25.25 0 0 1-.306.176Z"/>
                                    </svg>
                                </div>
                                <h3 class="fs-2 fw-normal ms-3">Web</h3>
                            </div>
                            <p>
                                Build the API to your React, Vue.js and Angular web apps.
                            </p>
                        </div>
                        <div class="feature col">

                            <div class="d-flex align-items-center">
                                <div
                                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                         class="bi bi-book" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    </svg>
                                </div>
                                <h3 class="fs-2 fw-normal ms-3">Mobile</h3>
                            </div>
                            <p>
                                Receive and send information from your native Android and iOS apps.
                            </p>
                        </div>
                        <div class="feature col">
                            <div class="d-flex align-items-center">
                                <div
                                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                         class="bi bi-github" viewBox="0 0 16 16">
                                        <path
                                            d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                                    </svg>
                                </div>
                                <h3 class="fs-2 fw-normal ms-3">IoT</h3>
                            </div>
                            <p>Something serious in Rust, Go, C, Java? No problem at all. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="bg-gray">
        <div class="py-5 bg-body-tertiary2 footer-secondary">
            <div class="container py-md-3 px-5">
                <div class="row g-4 py-md-5 py-3 row-cols-1 row-cols-lg-2">
                    <div class="feature col mb-5 mb-md-0">

                        <div class="d-flex align-items-center">
                            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                    <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                </svg>
                            </div>
                            <h3 class="fs-2 fw-normal ms-3">Handbook</h3>
                        </div>
                        <p>
                            Documentation and examples for a quick and successful implementation.
                        </p>
                        <a href="#" class="icon-link d-flex align-items-center text-body-secondary">
                            <span>Read The Docs</span>

                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-arrow-right-short ms-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="feature col">
                        <div class="d-flex align-items-center">
                            <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                </svg>
                            </div>
                            <h3 class="fs-2 fw-normal ms-3">Source</h3>
                        </div>
                        <p>Head over to GitHub for code, bug reports, and pull requests.</p>
                        <a href="#" class="icon-link d-flex align-items-center text-body-secondary">
                            <span>Source Code</span>

                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-arrow-right-short ms-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
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
