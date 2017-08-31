@if ($paginator->hasPages())
    <nav class="pagenation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())

        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i></a>
            <a href="{{ $paginator->url(1) }}">{{ 1}}</a>
        @endif

        {{-- Pagination Elements --}}
        {{--@foreach ($elements as $element)--}}
            {{-- "Three Dots" Separator --}}
            {{--@if (is_string($element))--}}
                {{--<span>{{ $element }}</span>--}}
            {{--@endif--}}

            {{-- Array Of Links --}}
            {{--@if (is_array($element))--}}
                {{--@foreach ($element as $page => $url)--}}
                    {{--@if ($page == $paginator->currentPage())--}}
                        {{--<span class="page_active">{{ $page }}</span>--}}
                    {{--@else--}}
                        {{--<a href="{{ $url }}">{{ $page }}</a>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
            {{--@endif--}}
        {{--@endforeach--}}
        @if($paginator->currentPage()>3)
            <span>...</span>
        @endif
        @if($paginator->currentPage()>2)
        <a href="{{ $paginator->previousPageUrl() }}">{{ $paginator->currentPage()-1}}</a>
        @endif
        <span class="page_active">{{ $paginator->currentPage() }}</span>
        @if($paginator->currentPage()+1<$paginator->lastPage())
        <a href="{{ $paginator->nextPageUrl() }}">{{ $paginator->currentPage()+1}}</a>
        @endif
        @if($paginator->currentPage()<$paginator->lastPage()-2 )
           <span>...</span>
        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage()}}</a>
            <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a>
        @else

        @endif
    </nav>
@endif
