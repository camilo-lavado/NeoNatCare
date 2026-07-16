@props(['variant' => 'primary', 'href' => null, 'type' => 'button'])

@php
    $base = 'flex items-center justify-center gap-[9px] rounded-[18px] p-4 font-bold text-base leading-none';
    $variants = [
        'primary' => 'w-full text-white bg-celeste shadow-[0_10px_22px_rgba(59,159,180,.35)]',
        'primary-sec' => 'w-full text-white bg-menta shadow-[0_10px_22px_rgba(127,203,176,.4)]',
        'primary-coral' => 'w-full text-white bg-coral shadow-[0_10px_22px_rgba(232,121,94,.4)]',
        'secondary' => 'w-full bg-transparent border-[1.5px] border-celeste-border text-ink',
        'link' => 'block w-full text-center font-bold text-[15px] text-celeste p-2',
        'text' => 'block w-full text-center font-bold text-sm text-ink-2 p-2',
    ];
    $classes = ($variant === 'link' || $variant === 'text')
        ? $variants[$variant]
        : $base . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
@endif
