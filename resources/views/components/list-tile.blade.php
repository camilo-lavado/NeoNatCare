@props(['icon' => null, 'iconVariant' => 'default', 'title', 'subtitle' => null, 'href' => null])

@php
    $classes = 'flex items-center gap-3 px-[15px] py-[13px]';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
@else
    <div {{ $attributes->merge(['class' => $classes]) }}>
@endif

    @if ($icon)
        <x-icon-tile :icon="$icon" :variant="$iconVariant" />
    @endif

    <div class="flex-1">
        <div class="text-[14.5px] font-bold text-ink">{{ $title }}</div>
        @if ($subtitle)
            <div class="text-[12.5px] text-ink-2 mt-[2px]">{{ $subtitle }}</div>
        @endif
    </div>

    {{ $slot }}

@if ($href)
    </a>
@else
    </div>
@endif
