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
    
    <meta name="google-site-verification" content="CezCm3VnIMolzHC65_TaI0DMhs4fJv2A7fWTPJrnp9s" />

    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <meta name="generator" content="tighten_jigsaw_doc">
    @endif

    <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

    <link rel="home" href="{{ $page->baseUrl }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#8ea8af">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">

    @stack('meta')

    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

    @if ($page->docsearchApiKey && $page->docsearchIndexName)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css"/>
    @endif
</head>


<body class='page'>
<div class="wrapper">
    <div class='header'>
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img src="/assets/img/logo.svg" alt="{{ $page->siteName }}"/>
                </a>
            </div>
            <div class="logo-mobile">
                <a href="/"><img alt="Logo" src="/assets/img/logo.svg"/></a>
            </div>
            <div id="main-menu" class="main-menu">
                <ul>


                    <li class="menu-item-home {{ $page->isActive('/') ? 'active' : '' }}">
                        <a href="/">
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="menu-item-docs {{ $page->isContains('/docs') ? 'active' : '' }}">
                        <a href="/docs/" title="Read the Sajya documentation">
                            <span>Docs</span>
                        </a>
                    </li>

                    <li class="menu-item-docs">
                        <a href="https://github.com/sajya" target="_blank" title="Contribute to Sajya on GitHub">
                            <span>GitHub</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    @yield('body')


</div>

<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12 order-2 order-sm-1">
                <div class="sub-footer-inner justify-content-start mt-2 mt-sm-0">
                    <small class="text-muted">Package and documentation licensed <a
                                href="https://github.com/sajya/server/blob/master/LICENSE.md">MIT</a>.</small>
                </div>
            </div>
            <div class="col-sm-6 col-12 order-1 order-sm-2">
                <div class="sub-footer-inner">
                    <ul>
                        <li><a href="https://www.jsonrpc.org/specification" target="_blank">Specification</a></li>
                        <li><a href="https://github.com/sajya" target="_blank">GitHub</a></li>
                        <li><a href="https://jigsaw.tighten.co/" target="_blank">Built with Jigsaw</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ mix('js/main.js', 'assets/build') }}"></script>

<!-- Insert analytics code here -->
@if ($page->production)
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js", "ym");

        ym(61197199, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/61197199" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-39757298-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-39757298-6');
   </script>
@endif

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
