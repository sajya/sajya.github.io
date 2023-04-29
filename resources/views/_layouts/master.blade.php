<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <x-meta
        title="{{ View::getSection('title') ?  View::getSection('title') . ' | ' : '' }}{{ config('site.name') }}"
        description="{{ View::getSection('description', config('site.description')) }}"
        image="https://github.com/orchidsoftware/art/raw/master/orchid-share.jpg"
    />

    <meta name="google-site-verification" content="CezCm3VnIMolzHC65_TaI0DMhs4fJv2A7fWTPJrnp9s" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#8ea8af">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">

    @stack('meta')

    <link rel="home" href="{{config('app.url')}}">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>

    <div class="p-2 bg-body-tertiary2 footer-secondary">
        <div class="container">
            <ul class="nav col-12 ms-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-3 text-secondary">Home</a></li>
                <li><a href="/docs" class="nav-link px-3 text-secondary">Docs</a></li>
                <li><a href="#" class="nav-link px-3 text-secondary">GitHub</a></li>
            </ul>
        </div>
    </div>

@yield('body')

    <div class="bg-gray">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-4 border-top">
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

<script src="{{ mix('js/app.js') }}"></script>

<!-- Insert analytics code here -->
@env('production')
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
@endenv

</body>
</html>
