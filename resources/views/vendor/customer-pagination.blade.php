<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li><a class="disabled" href="#"><span><i class="far fa-angle-double-left"></i></span></a></li>
    @else
        <li><a class="disabled" href="{{ $paginator->previousPageUrl() }}"><span><i class="far fa-angle-double-left"></i></span></a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li><a href="#"><span>{{ $element }}</span></a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li><a href="#"><span class="current">{{ $page }}</span></a></li>
                @else
                    <li><a href="{{ $url }}"><span>{{ $page }}</span></a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}"><span><i class="far fa-angle-double-right"></i></span></a></li>
    @else
        <li><a class="disabled" href=""><span><i class="far fa-angle-double-right"></i></span></a></li>
    @endif
</ul>
