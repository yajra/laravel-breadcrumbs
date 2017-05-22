<nav class="breadcrumb">
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!$breadcrumb->last)
            <a class="breadcrumb-item" href="{{ $breadcrumb->url }}">
                @if ( isset($breadcrumb->icon) )
                    <i class="fa {{ $breadcrumb->icon }}"></i>
                @endif
                {{ $breadcrumb->title }}
            </a>
        @else
            <span class="breadcrumb-item active">
                @if ( isset($breadcrumb->icon) )
                    <i class="fa {{ $breadcrumb->icon }}"></i>
                @endif
                {{ $breadcrumb->title }}
            </span>
        @endif
    @endforeach
</nav>