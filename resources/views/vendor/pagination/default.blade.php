@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" style="display: flex; justify-content: center; align-items: center; gap: 5px; margin-top: 20px;">
        {{-- Bouton Précédent --}}
        @if ($paginator->onFirstPage())
            <span class="btn btn-secondary" style="opacity: 0.5; cursor: not-allowed; padding: 8px 15px;">
                &laquo;
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary" rel="prev" style="padding: 8px 15px;">
                &laquo;
            </a>
        @endif

        {{-- Numéros de page --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="btn btn-secondary" style="opacity: 0.5; cursor: default; padding: 8px 15px;">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="btn btn-primary" aria-current="page" style="padding: 8px 15px;">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="btn btn-secondary" style="padding: 8px 15px;">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Bouton Suivant --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary" rel="next" style="padding: 8px 15px;">
                &raquo;
            </a>
        @else
            <span class="btn btn-secondary" style="opacity: 0.5; cursor: not-allowed; padding: 8px 15px;">
                &raquo;
            </span>
        @endif
    </nav>
@endif
