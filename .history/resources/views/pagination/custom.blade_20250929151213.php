@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="d-flex align-items-center justify-content-between w-100">
        <div class="d-flex justify-content-between flex-grow-1 d-sm-none gap-2">
            @if ($paginator->onFirstPage())
                <span class="btn btn-sm btn-light disabled">
                    <i class="ki-duotone ki-left fs-6 me-2"><span class="path1"></span><span class="path2"></span></i>
                    Sebelumnya
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-sm btn-light-primary">
                    <i class="ki-duotone ki-left fs-6 me-2"><span class="path1"></span><span class="path2"></span></i>
                    Sebelumnya
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-sm btn-primary">
                    Selanjutnya
                    <i class="ki-duotone ki-right fs-6 ms-2"><span class="path1"></span><span class="path2"></span></i>
                </a>
            @else
                <span class="btn btn-sm btn-light disabled">
                    Selanjutnya
                    <i class="ki-duotone ki-right fs-6 ms-2"><span class="path1"></span><span class="path2"></span></i>
                </span>
            @endif
        </div>

        <div class="d-none d-sm-flex align-items-center justify-content-between w-100">
            <div class="me-3 flex-shrink-0 text-muted small">
                Menampilkan
                @if ($paginator->firstItem())
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    -
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                dari <span class="fw-semibold">{{ $paginator->total() }}</span> data
            </div>

            <div class="flex-shrink-0">
                <div class="btn-group" role="group" aria-label="Pagination Buttons">
                    @if ($paginator->onFirstPage())
                        <button type="button" class="btn btn-sm btn-light" disabled aria-label="Halaman sebelumnya">
                            <i class="ki-duotone ki-left fs-6"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-sm btn-light" aria-label="Halaman sebelumnya">
                            <i class="ki-duotone ki-left fs-6"><span class="path1"></span><span class="path2"></span></i>
                        </a>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <button type="button" class="btn btn-sm btn-light" disabled>{{ $element }}</button>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <button type="button" class="btn btn-sm btn-primary">{{ $page }}</button>
                                @else
                                    <a href="{{ $url }}" class="btn btn-sm btn-light">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-sm btn-light" aria-label="Halaman selanjutnya">
                            <i class="ki-duotone ki-right fs-6"><span class="path1"></span><span class="path2"></span></i>
                        </a>
                    @else
                        <button type="button" class="btn btn-sm btn-light" disabled aria-label="Halaman selanjutnya">
                            <i class="ki-duotone ki-right fs-6"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </nav>
@endif
