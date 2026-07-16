@props(['variant' => 'amber', 'icon' => 'info', 'href' => null])

@php
    $variants = [
        'amber' => 'bg-amber-bg border border-[#F0DCB3] text-ink [&_.ms]:text-amber',
        'celeste' => 'bg-celeste-accent border border-celeste-accent-border text-ink [&_.ms]:text-celeste',
        'sec' => 'bg-menta-50 border border-menta-100 text-ink-2 [&_.ms]:text-menta-600',
    ];
    $classes = $variants[$variant] ?? $variants['amber'];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'flex items-center gap-3 rounded-[18px] px-[14px] py-3 text-[13.5px] leading-snug ' . $classes]) }}>
        <span class="ms">{{ $icon }}</span>
        <div class="flex-1">{{ $slot }}</div>
        <span class="ms">chevron_right</span>
    </a>
@else
    <div {{ $attributes->merge(['class' => 'flex items-center gap-3 rounded-[18px] px-[14px] py-3 text-[13.5px] leading-snug ' . $classes]) }}>
        <span class="ms">{{ $icon }}</span>
        <div class="flex-1">{{ $slot }}</div>
    </div>
@endif
