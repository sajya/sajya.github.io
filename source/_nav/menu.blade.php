@php $level = $level ?? 0 @endphp

<ul class="pl-1">
    @foreach ($items as $label => $item)
        @include('_nav.menu-item')
    @endforeach
</ul>
