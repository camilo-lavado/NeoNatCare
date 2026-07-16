@props(['variant' => 'default', 'icon'])

@php
    $variants = [
        'default' => 'bg-celeste-tint text-celeste',
        'sec' => 'bg-menta-100 text-menta-600',
    ];
    $classes = $variants[$variant] ?? $variants['default'];
@endphp

<span {{ $attributes->merge(['class' => 'ms w-9 h-9 rounded-xl flex-none flex items-center justify-center text-[19px] ' . $classes]) }}>{{ $icon }}</span>
