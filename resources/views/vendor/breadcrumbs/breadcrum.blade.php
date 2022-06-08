@if (count($breadcrumbs))
    <ol class="breadcrumb py-2 pl-6 bg-slate-200 flex flex-row">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                <span class="px-2"> / </span>
            @else
                <li class="breadcrumb-item active"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @endif
        @endforeach
    </ol>
@endif
