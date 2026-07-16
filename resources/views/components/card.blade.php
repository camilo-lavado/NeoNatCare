@props(['variant' => 'default', 'href' => null])

@php
    $variants = [
        'default' => 'bg-card border border-celeste-border rounded-card p-4',
        'hero' => 'bg-card border border-celeste-border rounded-hero p-5',
        'tint' => 'bg-celeste-tint rounded-card p-4',
        'tint-hero' => 'bg-celeste-tint rounded-hero p-5',
        'sec-tint' => 'bg-menta-100 rounded-card p-4',
        'sec-tint-hero' => 'bg-menta-100 rounded-hero p-5',
    ];
    $classes = $variants[$variant] ?? $variants['default'];
    $tag = $href ? 'a' : 'div';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@else
    <div {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</div>
@endif
