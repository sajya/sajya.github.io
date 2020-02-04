@extends('_layouts.master')

@section('nav-toggle')
    @include('_nav.menu-toggle')
@endsection

@section('body')




<div class="page-default-list">
    <div class="container pt-2 pt-md-6 pb-3 pb-md-6">
        <div class="row">
            <div class="col-12 col-md-3 mb-3">
                <div class="sidebar">

                    <div class="docs-menu">
                        <nav id="js-nav-menu" class="nav-menu hidden lg:block">
                            @include('_nav.menu', ['items' => $page->navigation])
                        </nav>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-9">

                <main class="content">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</div>




@endsection
