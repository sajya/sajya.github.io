<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

    <meta property="og:site_name" content="{{ $page->siteName }}"/>
    <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
    <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}"/>
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:image" content="/assets/img/logo.png"/>
    <meta property="og:type" content="website"/>

    <meta name="twitter:image:alt" content="{{ $page->siteName }}">
    <meta name="twitter:card" content="summary_large_image">

    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <meta name="generator" content="tighten_jigsaw_doc">
    @endif

    <title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

    <link rel="home" href="{{ $page->baseUrl }}">
    <link rel="icon" href="/favicon.ico">

    @stack('meta')

    @if ($page->production)
    <!-- Insert analytics code here -->
    @endif

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css"/>
    @endif
</head>


<body class='page'>
<div id="main-menu-mobile" class="main-menu-mobile">
    <ul>


        <li class="menu-item-home active">
            <a href="/">
                <span>Home</span>
            </a>
        </li>

        <li class="menu-item-docs">
            <a href="/docs/">
                <span>Docs</span>
            </a>
        </li>

    </ul>
</div>
<div class="wrapper">
    <div class='header'>
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img src="/assets/img/logo.svg" alt="{{ $page->siteName }}"/>
                </a>
            </div>
            <div class="logo-mobile">
                <a href="/"><img alt="Logo" src="/images/logo-mobile.svg"/></a>
            </div>
            <div id="main-menu" class="main-menu">
                <ul>


                    <li class="menu-item-home active">
                        <a href="/">
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="menu-item-docs">
                        <a href="/docs/">
                            <span>Docs</span>
                        </a>
                    </li>

                    <li class="menu-item-docs">
                        <a href="https://github.com/sajya" target="_blank">
                            <span>GitHub</span>
                        </a>
                    </li>

                </ul>
            </div>
            <button id="toggle-main-menu-mobile" class="hamburger hamburger--slider" type="button">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
            </button>
        </div>
    </div>


    @yield('body')


</div>

<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sub-footer-inner">
                    <ul>
                        <li class="zerostatic"><a href="https://example.com">example.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ mix('js/main.js', 'assets/build') }}"></script>
</body>


{{--
<body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-800 leading-normal font-sans">
    <header class="flex items-center shadow bg-white border-b h-24 mb-8 py-4" role="banner">
        <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
            <div class="flex items-center">
                <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                    <img class="h-8 md:h-10 mr-3" src="/assets/img/logo.svg" alt="{{ $page->siteName }} logo" />

                    <h1 class="text-lg md:text-2xl text-blue-900 font-semibold hover:text-blue-600 my-0 pr-4">{{ $page->siteName }}</h1>
                </a>
            </div>

            <div class="flex flex-1 justify-end items-center text-right md:pl-10">
                @if ($page->docsearchApiKey && $page->docsearchIndexName)
                    @include('_nav.search-input')
                @endif
            </div>
        </div>

        @yield('nav-toggle')
    </header>

    <main role="main" class="w-full flex-auto">
        @yield('body')
    </main>

    <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

    @stack('scripts')

    <footer class="bg-white text-center text-sm mt-12 py-4" role="contentinfo">
        <ul class="flex flex-col md:flex-row justify-center">
            <li class="md:mr-2">
                &copy; <a href="https://tighten.co" title="Tighten website">Tighten</a> {{ date('Y') }}.
            </li>

            <li>
                Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
            </li>
        </ul>
    </footer>
</body>
--}}
</html>
