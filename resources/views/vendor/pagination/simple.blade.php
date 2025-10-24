@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">
        {{-- Bouton Précédent --}}
        @if ($paginator->onFirstPage())
            <span class="btn btn-secondary" style="opacity: 0.5; cursor: not-allowed;">
                &laquo; Précédent
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary" rel="prev">
                &laquo; Précédent
            </a>
        @endif

        {{-- Bouton Suivant --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary" rel="next">
                Suivant &raquo;
            </a>
        @else
            <span class="btn btn-secondary" style="opacity: 0.5; cursor: not-allowed;">
                Suivant &raquo;
            </span>
        @endif
    </nav>
@endif
