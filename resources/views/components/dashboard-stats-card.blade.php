@props([
    'title' => '',
    'value' => '0',
    'icon' => 'ki-chart-line-up',
    'color' => 'primary',
    'trend' => null,
    'trendValue' => null,
    'description' => null
])

@php
    $colorClasses = [
        'primary' => ['bg' => 'bg-primary', 'text' => 'text-primary', 'light' => 'bg-light-primary'],
        'success' => ['bg' => 'bg-success', 'text' => 'text-success', 'light' => 'bg-light-success'],
        'warning' => ['bg' => 'bg-warning', 'text' => 'text-warning', 'light' => 'bg-light-warning'],
        'danger' => ['bg' => 'bg-danger', 'text' => 'text-danger', 'light' => 'bg-light-danger'],
        'info' => ['bg' => 'bg-info', 'text' => 'text-info', 'light' => 'bg-light-info'],
    ];

    $currentColor = $colorClasses[$color] ?? $colorClasses['primary'];
@endphp

<div class="card card-flush h-xl-100">
    <div class="card-body d-flex flex-column justify-content-between pb-5">
        <!-- Header -->
        <div class="d-flex align-items-center mb-5">
            <div class="symbol symbol-40px me-5">
                <div class="symbol-label {{ $currentColor['light'] }}">
                    <i class="ki-duotone {{ $icon }} fs-1 {{ $currentColor['text'] }}">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </div>
            </div>
            <div class="d-flex flex-column flex-grow-1">
                <span class="text-gray-800 text-hover-primary fs-6 fw-bold">{{ $title }}</span>
                @if($description)
                    <span class="text-gray-500 fw-semibold fs-7">{{ $description }}</span>
                @endif
            </div>
        </div>

        <!-- Value -->
        <div class="d-flex align-items-center">
            <span class="text-gray-900 fw-bolder fs-2hx lh-1 ls-n2">{{ $value }}</span>

            @if($trend && $trendValue)
                <div class="m-0">
                    @if($trend === 'up')
                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <span class="text-success fw-semibold fs-6">{{ $trendValue }}</span>
                    @elseif($trend === 'down')
                        <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <span class="text-danger fw-semibold fs-6">{{ $trendValue }}</span>
                    @else
                        <i class="ki-duotone ki-arrow-right fs-5 text-gray-500 ms-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <span class="text-gray-500 fw-semibold fs-6">{{ $trendValue }}</span>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
