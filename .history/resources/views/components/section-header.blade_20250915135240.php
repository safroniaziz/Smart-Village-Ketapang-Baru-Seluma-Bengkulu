@props([
    'badge' => '',
    'badgeIcon' => 'fas fa-star',
    'title' => '',
    'description' => '',
    'highlight' => '',
    'colorScheme' => 'blue', // blue, emerald, purple, slate
    'aos' => true,
    'aosDelay' => '300'
])

<!-- Section Header Component -->
@props([
    'badge' => '',
    'title' => '',
    'description' => '',
    'colorScheme' => 'blue',
    'icon' => '',
    'aos' => true,
    'aosDelay' => '300',
    'textAlign' => 'center'
])

@php
    $alignClass = $textAlign === 'left' ? 'text-left' : 'text-center';
    $titleSizeClass = $textAlign === 'left' ? 'text-4xl lg:text-5xl' : 'text-5xl lg:text-6xl';
@endphp

<div class="section-header {{ $alignClass }} mb-16" 
     @if($aos) data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $aosDelay }}" @endif>
    
    <!-- Badge -->
    @if($badge)
        <div class="section-badge section-badge-{{ $colorScheme }} {{ $textAlign === 'left' ? '' : 'mx-auto' }}">
            @if($icon)
                <i class="{{ $icon }} mr-2"></i>
            @endif
            {{ $badge }}
        </div>
    @endif

    <!-- Title -->
    @if($title)
        <div class="mb-8">
            <h2 class="{{ $titleSizeClass }} font-black mb-4">
                <span class="section-title-{{ $colorScheme }}">
                    {{ $title }}
                </span>
            </h2>
            <div class="w-16 lg:w-24 h-1 section-divider-{{ $colorScheme }} {{ $textAlign === 'left' ? '' : 'mx-auto' }} rounded-full"></div>
        </div>
    @endif

    <!-- Description -->
    @if($description)
        <div class="{{ $textAlign === 'left' ? 'max-w-4xl' : 'max-w-4xl mx-auto' }}">
            <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                {{ $description }}
            </p>
        </div>
    @endif
</div>
