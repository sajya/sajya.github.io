<nav class="nav-docs px-md-5 py-2 px-3 ms-auto mt-md-4">


    <a href="/" class="link-body-emphasis d-none d-lg-flex my-4 gap-3 text-decoration-none align-items-center">
        <img src="/img/logo.svg" alt="Laravel Sajya" width="50px" class="img-fluid">
        <span class="h2 fw-light">Sajya</span>
    </a>

    @foreach($menu as $title => $values)
        <h5 class="font-weight-normal my-md-3 my-2 me-2 me-md-0 d-none d-md-inline-block text-secondary">{{ $title }}</h5>

        <ul>
            @foreach($values as $title => $link)
                <li class="border-start border-3 px-2 px-md-3 py-1 {{ active('*'.$link, 'border-secondary active-doc-menu') }}">
                    <a href="{{$link}}" class="{{ is_active('*'.$link) ? 'text-secondary' : 'text-decoration-none'}}">
                        {!! $title !!}
                    </a>
                </li>
            @endforeach
        </ul>
    @endforeach
</nav>
