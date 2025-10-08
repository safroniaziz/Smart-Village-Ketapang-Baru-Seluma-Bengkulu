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
<div class="section-header section-{{ $colorScheme }}" @if($aos) data-aos="fade-up" data-aos-delay="{{ $aosDelay }}" @endif>
    <!-- Modern Badge with Gradient -->
    <div class="section-badge" @if($aos) data-aos="zoom-in" data-aos-delay="{{ $aosDelay }}" @endif>
        <div class="badge-blur"></div>
        <div class="badge-content">
            <i class="{{ $badgeIcon }} mr-2"></i>
            {{ $badge }}
        </div>
    </div>

    <!-- Enhanced Title with Gradient Text -->
    <div class="section-title-wrapper" @if($aos) data-aos="fade-up" data-aos-delay="{{ $aosDelay }}" @endif>
        <h2 class="section-title">
            <span class="section-title-gradient">
                {{ $title }}
            </span>
        </h2>
        <div class="section-title-underline"></div>
    </div>

    <!-- Modern Description with Highlight -->
    @if($description)
    <div class="section-description" @if($aos) data-aos="fade-up" data-aos-delay="{{ $aosDelay }}" @endif>
        <p>
            {{ $description }}
            @if($highlight)
            <span class="highlight-text">
                <span class="relative z-10 font-semibold text-{{ $colorScheme }}-700">{{ $highlight }}</span>
                <span class="highlight-underline"></span>
            </span>
            @endif
        </p>
    </div>
    @endif
</div>
